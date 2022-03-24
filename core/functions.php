<?php

// common start
function old($inputName){
    if (isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "";
    }
}

function alert($data,$icon="fa-exclamation-triangle",$color="danger"){
    return "<div class='alert alert-$color d-flex align-items-center' role='alert'>
  <i class='fa $icon me-2'></i>
  <div>
    $data
  </div>
</div>";
}

function redirect($l){
    echo "<script>location.href = '$l'</script>";
}

function textFilter($text){
    $text = strip_tags($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripslashes($text);

    return $text;
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName] = $message;
}


function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}

function clearError(){
    $_SESSION['error']= [];
}

function runQuery($sql){
    $con = con();
    if(mysqli_query($con,$sql)){
        return true;
    }else{
        die("Query Fail : ".mysqli_error($con));
    }
}

function fetch($sql){
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function showTime($timestamp,$format = "j M, Y"){
    return date($format,strtotime($timestamp));
}

function countTotal($table,$condition = 1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);

    return $total["COUNT(id)"];
}

// common end

// auth start

function register(){

    $errorStatus = 0;
    $name = "";
    $email = "";

    if(empty($_POST['name'])){
        setError("name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['name']) < 5){
            setError("name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['name']) > 20){
                setError("name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['name'])) {
                    setError('name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if (empty($_POST['password'])){
        setError("password","Password is required!");
        $errorStatus=1;
    }else{
        $sPass = textFilter(strip_tags(password_hash($_POST['password'],PASSWORD_DEFAULT)));
    }

    $supportFileType = ['image/jpeg','image/png'];

    if($_FILES['sg_photo']['name']){
        $tempFile = $_FILES['sg_photo']['tmp_name'];
        $fileName = $_FILES['sg_photo']['name'];
        if(in_array($_FILES['sg_photo']['type'],$supportFileType)){
            $saveFolder = "store/";
            $newName = $saveFolder.uniqid()."_".$fileName;
            move_uploaded_file($tempFile,$newName);

        }else{
            setError("sg_photo","File Incorrect");
            $errorStatus=1;
        }

    }else{
        setError("sg_photo","File is required");
        $errorStatus=1;
    }

    if (!$errorStatus){
        $sql = "INSERT INTO users (name,email,password,sg_photo) VALUES ('$name','$email','$sPass','$newName')";
        if (runQuery($sql)){
            $_SESSION['status'] = "
            <div class='alert alert-success alert-dismissible fade show'>
            <i class='fa fa-check me-2'></i>
            New User Added
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            redirect("users");
        }
    }

}

function login(){
    $errorStatus =0;
    $email = "";

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if (empty($_POST['password'])){
        setError("password","Password is required!");
        $errorStatus=1;
    }else {
        $password = textFilter($_POST['password']);
    }

    if (!$errorStatus){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = mysqli_query(con(),$sql);
        $row = mysqli_fetch_assoc($query);

        if (!$row){
            echo alert("Email or Password don't match");
        }else{
            if(!password_verify($password,$row['password'])){

                echo alert("Email or Password don't match");

            }else{
                session_start();
                $_SESSION['user'] = $row;
                redirect("aspirate_report");
            }
        }
    }

}

// auth end

// user start

function user($id){
    $sql = "SELECT * FROM users WHERE id = $id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}

function userDelete($id){
    $sql = "DELETE FROM users WHERE id=$id";
    return runQuery($sql);
}

// user end


// profile start

function profile_update($id){
    $name = "";
    $email = "";

    if(empty($_POST['name'])){
        setError("name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['name']) < 5){
            setError("name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['name']) > 20){
                setError("name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['name'])) {
                    setError('name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if (!$errorStatus){
        $sql = "UPDATE users SET name='$name',email='$email' WHERE id=$id";
        if (runQuery($sql)){
            $_SESSION['info_status'] = "
            <div class='alert alert-success alert-dismissible fade show'>
            <i class='fa fa-check me-2'></i>
            Your Information is Updated.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            redirect("profile");
        }else{
            echo alert("Report Failed!");
        }
    }
}

//function change(){
//    $op = textFilter($_POST['old_password']);
//    $np = textFilter($_POST['new_password']);
//    $cp = textFilter($_POST['cpassword']);
//    $id = $_POST['id'];
//
//    $query = mysqli_query(con(),"SELECT password FROM users WHERE id=$id AND password = $op");
//    $num = mysqli_fetch_array($query);
//    if ($num > 0){
//        $sql = mysqli_query(con(),"UPDATE users SET password = '$np' WHERE id=$id");
//        session_start();
//        $_SESSION['msg1'] = "Password has changed.";
//    }else{
//        $_SESSION['msg1'] = "Password does not match";
//    }
//}


// profile end

// aspirate report start

function aspirate_report_create(){
    $errorStatus = 0;
    $due_date = "";
    $institute_name = "";
    $lab_access = "";
    $patient_name = "";
    $age = "";
    $gender = "";
    $contact_detail = "";
    $physician_name = "";
    $doctor = "";
    $clinical_history = "";
    $bmexamination = "";
    $pro_perform = "";
    $anatomic_site_aspirate = "";
    $ease_diff_aspirate = "";
    $blood_count = "";
    $blood_smear = "";
    $cellular_particles = "";
    $nucleated_differential = "";
    $total_cell_count = "";
    $myeloid = "";
    $erythropoiesis = "";
    $myelopoiesis = "";
    $megakaryocytes = "";
    $lymphocytes = "";
    $plasma_cell = "";
    $haemopoietic_cell = "";
    $abnormal_cell = "";
    $iron_stain = "";
    $cytochemistry = "";
    $investigation = "";
    $flow_cytometry = "";
    $conclusion = "";
    $classification = "";
    $disease_code = "";
    $signature = "";


    // due date validation
    if (empty($_POST['due_date'])){
        setError("due_date","Date is Required!");
        $errorStatus = 1;
    }else{
        $due_date = textFilter(strip_tags($_POST['due_date']));
    }

    // institute_name validation
    if(empty($_POST['institute_name'])){
        setError("institute_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['institute_name']) < 5){
            setError("institute_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['institute_name']) > 40){
                setError("institute_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['institute_name'])) {
                    setError('institute_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $institute_name = textFilter($_POST['institute_name']);
                }
            }
        }
    }

    // lab_access validation
    if (empty($_POST['lab_access'])){
        setError("lab_access","Lab Access Number is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['lab_access'])){
            setError("lab_access","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            $lab_access = textFilter(strip_tags($_POST['lab_access']));
        }
    }

    // patient_name validation
    if(empty($_POST['patient_name'])){
        setError("patient_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['patient_name']) < 5){
            setError("patient_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['patient_name']) > 40){
                setError("patient_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['patient_name'])) {
                    setError('patient_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $patient_name = textFilter($_POST['patient_name']);
                }
            }
        }
    }


    // age validation
    if (empty($_POST['age'])){
        setError("age","Age is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['age'])){
            setError("age","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            if (!$_POST['age'] > 100){
                setError("age","Invalid Age!");
                $errorStatus = 1;
            }else{
                $age = textFilter(strip_tags($_POST['age']));
            }
        }
    }

    // gender validation
    if (empty($_POST['gender'])){
        setError("gender","Gender is Required!");
        $errorStatus = 1;
    }else{
        $gender = textFilter(strip_tags($_POST['gender']));
    }

    // contact_detail validation
    $contact_detail = textFilter(strip_tags($_POST['contact_detail']));

    // physician_name validation
    if(empty($_POST['physician_name'])){
        setError("physician_name","Physician Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['physician_name']) < 5){
            setError("physician_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['physician_name']) > 40){
                setError("physician_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['physician_name'])) {
                    setError('physician_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $physician_name = textFilter($_POST['physician_name']);
                }
            }
        }
    }

    // doctor_name validation
    if(empty($_POST['doctor'])){
        setError("doctor","Doctor Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['doctor']) < 5){
            setError("doctor","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['doctor']) > 40){
                setError("doctor","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['doctor'])) {
                    setError('doctor',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $doctor = textFilter($_POST['doctor']);
                }
            }
        }
    }

    // clinical_history validation
    $clinical_history = textFilter(strip_tags($_POST['clinical_history']));

    // bmexamination validation
    $bmexamination = textFilter(strip_tags($_POST['bmexamination']));

    // pro_perform validation
    if (empty($_POST['pro_perform'])){
        setError("pro_perform","Procedure Perform is Required!");
        $errorStatus = 1;
    }else{
        $pro_perform = textFilter(strip_tags($_POST['pro_perform']));
    }

    // anatomic_site_aspirate validation
    $anatomic_site_aspirate = textFilter(strip_tags($_POST['anatomic_site_aspirate']));

    // ease_diff_aspirate validation
    $ease_diff_aspirate = textFilter(strip_tags($_POST['ease_diff_aspirate']));

    // blood_count validation
    $blood_count = textFilter(strip_tags($_POST['blood_count']));

    // blood_smear validation
    $blood_smear = textFilter(strip_tags($_POST['blood_smear']));

    // cellular_particles validation
    $cellular_particles = textFilter(strip_tags($_POST['cellular_particles']));

    // nucleated_differential validation
    $nucleated_differential = textFilter(strip_tags($_POST['nucleated_differential']));

    // total_cell_count validation
    $total_cell_count = textFilter(strip_tags($_POST['total_cell_count']));

    // myeloid validation
    $myeloid = textFilter(strip_tags($_POST['myeloid']));

    // erythropoiesis validation
    $erythropoiesis = textFilter(strip_tags($_POST['erythropoiesis']));

    // myelopoiesis validation
    $myelopoiesis = textFilter(strip_tags($_POST['myelopoiesis']));

    // megakaryocytes validation
    $megakaryocytes = textFilter(strip_tags($_POST['megakaryocytes']));

    // lymphocytes validation
    $lymphocytes = textFilter(strip_tags($_POST['lymphocytes']));

    // plasma_cell validation
    $plasma_cell = textFilter(strip_tags($_POST['plasma_cell']));

    // haemopoietic_cell validation
    $haemopoietic_cell = textFilter(strip_tags($_POST['haemopoietic_cell']));

    // abnormal_cell validation
    $abnormal_cell = textFilter(strip_tags($_POST['abnormal_cell']));

    // iron_stain validation
    $iron_stain = textFilter(strip_tags($_POST['iron_stain']));

    // cytochemistry validation
    $cytochemistry = textFilter(strip_tags($_POST['cytochemistry']));

    // investigation validation
    $investigation = textFilter(strip_tags($_POST['investigation']));

    // flow_cytometry validation
    $flow_cytometry = textFilter(strip_tags($_POST['flow_cytometry']));

    // conclusion validation
    $conclusion = textFilter(strip_tags($_POST['conclusion']));

    // classification validation
    $classification = textFilter(strip_tags($_POST['classification']));

    // disease_code validation
    $disease_code = textFilter(strip_tags($_POST['disease_code']));

    if (!$errorStatus){
        $sql = "INSERT INTO aspirate_reports (sc_date,institute_name,lab_no,patient_name,age,gender,address,physician_name,doctor,cli_history,bmexamination,pro_perform,anato_aspirate,ease_diff_aspirate,blood_count,blood_smear,cellularity,nucleated_differential,total_cell,myeloid,erythro,myelopoiesis,megaka,lympho,plasma_cell,haemopoietic,abnormal_cell,iron_stain,cytochemistry,investigation,flow_cyto,conclusion,classification,disease_code) 
                VALUES ('$due_date','$institute_name','$lab_access','$patient_name','$age','$gender','$contact_detail','$physician_name','$doctor','$clinical_history','$bmexamination','$pro_perform','$anatomic_site_aspirate','$ease_diff_aspirate','$blood_count','$blood_smear','$cellular_particles','$nucleated_differential','$total_cell_count','$myeloid','$erythropoiesis','$myelopoiesis','$megakaryocytes','$lymphocytes','$plasma_cell','$haemopoietic_cell','$abnormal_cell','$iron_stain','$cytochemistry','$investigation','$flow_cytometry','$conclusion','$classification','$disease_code')";
        if (runQuery($sql)){
            $_SESSION['aspirate_report_status'] = "
            <div class='alert alert-success alert-dismissible fade show'>
            <i class='fa fa-check me-2'></i>
            Aspirate Report Submitted
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            redirect("aspirate_report_create");
        }else{
            echo alert("Report Failed!");
        }
    }



}

function aspirate_report($id){
    $sql = "SELECT * FROM aspirate_reports WHERE id=$id";
    return fetch($sql);
}

function aspirate_reports(){
    $sql = "SELECT * FROM aspirate_reports";
    return fetchAll($sql);
}

function aspirate_report_delete($id){
    $sql = "DELETE FROM aspirate_reports WHERE id=$id";
    return runQuery($sql);
}

function aspirate_report_edit(){
    $errorStatus = 0;
    $due_date = "";
    $institute_name = "";
    $lab_access = "";
    $patient_name = "";
    $age = "";
    $gender = "";
    $contact_detail = "";
    $physician_name = "";
    $doctor = "";
    $clinical_history = "";
    $bmexamination = "";
    $pro_perform = "";
    $anatomic_site_aspirate = "";
    $ease_diff_aspirate = "";
    $blood_count = "";
    $blood_smear = "";
    $cellular_particles = "";
    $nucleated_differential = "";
    $total_cell_count = "";
    $myeloid = "";
    $erythropoiesis = "";
    $myelopoiesis = "";
    $megakaryocytes = "";
    $lymphocytes = "";
    $plasma_cell = "";
    $haemopoietic_cell = "";
    $abnormal_cell = "";
    $iron_stain = "";
    $cytochemistry = "";
    $investigation = "";
    $flow_cytometry = "";
    $conclusion = "";
    $classification = "";
    $disease_code = "";
    $signature = "";


    // due date validation
    if (empty($_POST['due_date'])){
        setError("due_date","Date is Required!");
        $errorStatus = 1;
    }else{
        $due_date = textFilter(strip_tags($_POST['due_date']));
    }

    // institute_name validation
    if(empty($_POST['institute_name'])){
        setError("institute_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['institute_name']) < 5){
            setError("institute_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['institute_name']) > 40){
                setError("institute_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['institute_name'])) {
                    setError('institute_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $institute_name = textFilter($_POST['institute_name']);
                }
            }
        }
    }

    // lab_access validation
    if (empty($_POST['lab_access'])){
        setError("lab_access","Lab Access Number is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['lab_access'])){
            setError("lab_access","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            $lab_access = textFilter(strip_tags($_POST['lab_access']));
        }
    }

    // patient_name validation
    if(empty($_POST['patient_name'])){
        setError("patient_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['patient_name']) < 5){
            setError("patient_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['patient_name']) > 40){
                setError("patient_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['patient_name'])) {
                    setError('patient_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $patient_name = textFilter($_POST['patient_name']);
                }
            }
        }
    }


    // age validation
    if (empty($_POST['age'])){
        setError("age","Age is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['age'])){
            setError("age","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            if (!$_POST['age'] > 100){
                setError("age","Invalid Age!");
                $errorStatus = 1;
            }else{
                $age = textFilter(strip_tags($_POST['age']));
            }
        }
    }

    // gender validation
    if (empty($_POST['gender'])){
        setError("gender","Gender is Required!");
        $errorStatus = 1;
    }else{
        $gender = textFilter(strip_tags($_POST['gender']));
    }

    // contact_detail validation
    $contact_detail = textFilter(strip_tags($_POST['contact_detail']));

    // physician_name validation
    if(empty($_POST['physician_name'])){
        setError("physician_name","Physician Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['physician_name']) < 5){
            setError("physician_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['physician_name']) > 40){
                setError("physician_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['physician_name'])) {
                    setError('physician_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $physician_name = textFilter($_POST['physician_name']);
                }
            }
        }
    }

    // doctor_name validation
    if(empty($_POST['doctor'])){
        setError("doctor","Doctor Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['doctor']) < 5){
            setError("doctor","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['doctor']) > 40){
                setError("doctor","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['doctor'])) {
                    setError('doctor',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $doctor = textFilter($_POST['doctor']);
                }
            }
        }
    }

    // clinical_history validation
    $clinical_history = textFilter(strip_tags($_POST['clinical_history']));

    // bmexamination validation
    $bmexamination = textFilter(strip_tags($_POST['bmexamination']));

    // pro_perform validation
    if (empty($_POST['pro_perform'])){
        setError("pro_perform","Procedure Perform is Required!");
        $errorStatus = 1;
    }else{
        $pro_perform = textFilter(strip_tags($_POST['pro_perform']));
    }

    // anatomic_site_aspirate validation
    $anatomic_site_aspirate = textFilter(strip_tags($_POST['anatomic_site_aspirate']));

    // ease_diff_aspirate validation
    $ease_diff_aspirate = textFilter(strip_tags($_POST['ease_diff_aspirate']));

    // blood_count validation
    $blood_count = textFilter(strip_tags($_POST['blood_count']));

    // blood_smear validation
    $blood_smear = textFilter(strip_tags($_POST['blood_smear']));

    // cellular_particles validation
    $cellular_particles = textFilter(strip_tags($_POST['cellular_particles']));

    // nucleated_differential validation
    $nucleated_differential = textFilter(strip_tags($_POST['nucleated_differential']));

    // total_cell_count validation
    $total_cell_count = textFilter(strip_tags($_POST['total_cell_count']));

    // myeloid validation
    $myeloid = textFilter(strip_tags($_POST['myeloid']));

    // erythropoiesis validation
    $erythropoiesis = textFilter(strip_tags($_POST['erythropoiesis']));

    // myelopoiesis validation
    $myelopoiesis = textFilter(strip_tags($_POST['myelopoiesis']));

    // megakaryocytes validation
    $megakaryocytes = textFilter(strip_tags($_POST['megakaryocytes']));

    // lymphocytes validation
    $lymphocytes = textFilter(strip_tags($_POST['lymphocytes']));

    // plasma_cell validation
    $plasma_cell = textFilter(strip_tags($_POST['plasma_cell']));

    // haemopoietic_cell validation
    $haemopoietic_cell = textFilter(strip_tags($_POST['haemopoietic_cell']));

    // abnormal_cell validation
    $abnormal_cell = textFilter(strip_tags($_POST['abnormal_cell']));

    // iron_stain validation
    $iron_stain = textFilter(strip_tags($_POST['iron_stain']));

    // cytochemistry validation
    $cytochemistry = textFilter(strip_tags($_POST['cytochemistry']));

    // investigation validation
    $investigation = textFilter(strip_tags($_POST['investigation']));

    // flow_cytometry validation
    $flow_cytometry = textFilter(strip_tags($_POST['flow_cytometry']));

    // conclusion validation
    $conclusion = textFilter(strip_tags($_POST['conclusion']));

    // classification validation
    $classification = textFilter(strip_tags($_POST['classification']));

    // disease_code validation
    $disease_code = textFilter(strip_tags($_POST['disease_code']));

    if (!$errorStatus){
        $id = $_POST['id'];
        $sql = "UPDATE aspirate_reports SET sc_date='$due_date',institute_name='$institute_name',lab_no='$lab_access',patient_name='$patient_name',age='$age',gender='$gender',address='$contact_detail',physician_name='$physician_name',doctor='$doctor',cli_history='$clinical_history',bmexamination='$bmexamination',pro_perform='$pro_perform',anato_aspirate='$anatomic_site_aspirate',ease_diff_aspirate='$ease_diff_aspirate',blood_count='$blood_count',blood_smear='$blood_smear',cellularity='$cellular_particles',nucleated_differential='$nucleated_differential',total_cell='$total_cell_count',myeloid='$myeloid',erythro='$erythropoiesis',myelopoiesis='$myelopoiesis',megaka='$megakaryocytes',lympho='$lymphocytes',plasma_cell='$plasma_cell',haemopoietic='$haemopoietic_cell',abnormal_cell='$abnormal_cell',iron_stain='$iron_stain',cytochemistry='$cytochemistry',investigation='$investigation',flow_cyto='$flow_cytometry',conclusion='$conclusion',classification='$classification',disease_code='$disease_code'
                WHERE id=$id";
        if (runQuery($sql)){
            $_SESSION['aspirate_report_status'] = "
            <div class='alert alert-success alert-dismissible fade show'>
            <i class='fa fa-check me-2'></i>
            Aspirate Report Information Updated
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            redirect("aspirate_report");
        }else{
            echo alert("Report Failed!");
        }
    }

}


// aspirate report end

// Trephine report end
function trephine_report_create(){
    $errorStatus = 0;

    $due_date = "";
    $institute_name = "";
    $lab_access = "";
    $patient_name = "";
    $age = "";
    $gender = "";
    $contact_detail = "";
    $physician_name = "";
    $doctor = "";
    $clinical_history = "";
    $bmexamination = "";
    $pro_perform = "";
    $anatomic_site_trephine = "";
    $biopsy_core = "";
    $ade_macro_appearance = "";
    $percentage_cellularity = "";
    $bone_architecture = "";
    $path = "";
    $tre_number = "";
    $erythroid = "";
    $myeloid = "";
    $megaka = "";
    $lymphoid = "";
    $plasma_cell = "";
    $macrophages = "";
    $abnormal_cell = "";
    $reticulin_stain = "";
    $immunohistochemistry = "";
    $histochemistry = "";
    $investigation = "";
    $conclusion = "";
    $disease_code = "";

    // due date validation
    if (empty($_POST['due_date'])){
        setError("due_date","Date is Required!");
        $errorStatus = 1;
    }else{
        $due_date = textFilter(strip_tags($_POST['due_date']));
    }

    // institute_name validation
    if(empty($_POST['institute_name'])){
        setError("institute_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['institute_name']) < 5){
            setError("institute_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['institute_name']) > 40){
                setError("institute_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['institute_name'])) {
                    setError('institute_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $institute_name = textFilter($_POST['institute_name']);
                }
            }
        }
    }

    // lab_access validation
    if (empty($_POST['lab_access'])){
        setError("lab_access","Lab Access Number is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['lab_access'])){
            setError("lab_access","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            $lab_access = textFilter(strip_tags($_POST['lab_access']));
        }
    }

    // patient_name validation
    if(empty($_POST['patient_name'])){
        setError("patient_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['patient_name']) < 5){
            setError("patient_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['patient_name']) > 40){
                setError("patient_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['patient_name'])) {
                    setError('patient_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $patient_name = textFilter($_POST['patient_name']);
                }
            }
        }
    }


    // age validation
    if (empty($_POST['age'])){
        setError("age","Age is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['age'])){
            setError("age","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            if (!$_POST['age'] > 100){
                setError("age","Invalid Age!");
                $errorStatus = 1;
            }else{
                $age = textFilter(strip_tags($_POST['age']));
            }
        }
    }

    // gender validation
    if (empty($_POST['gender'])){
        setError("gender","Gender is Required!");
        $errorStatus = 1;
    }else{
        $gender = textFilter(strip_tags($_POST['gender']));
    }

    // contact_detail validation
    $contact_detail = textFilter(strip_tags($_POST['contact_detail']));

    // physician_name validation
    if(empty($_POST['physician_name'])){
        setError("physician_name","Physician Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['physician_name']) < 5){
            setError("physician_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['physician_name']) > 40){
                setError("physician_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['physician_name'])) {
                    setError('physician_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $physician_name = textFilter($_POST['physician_name']);
                }
            }
        }
    }

    // doctor_name validation
    if(empty($_POST['doctor'])){
        setError("doctor","Doctor Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['doctor']) < 5){
            setError("doctor","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['doctor']) > 40){
                setError("doctor","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['doctor'])) {
                    setError('doctor',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $doctor = textFilter($_POST['doctor']);
                }
            }
        }
    }

    // clinical_history validation
    $clinical_history = textFilter(strip_tags($_POST['clinical_history']));

    // bmexamination validation
    $bmexamination = textFilter(strip_tags($_POST['bmexamination']));

    // pro_perform validation
    if (empty($_POST['pro_perform'])){
        setError("pro_perform","Procedure Perform is Required!");
        $errorStatus = 1;
    }else{
        $pro_perform = textFilter(strip_tags($_POST['pro_perform']));
    }

    // anatomic_site_trephine validation
    $anatomic_site_trephine = textFilter(strip_tags($_POST['anatomic_site_trephine']));

    // biopsy_core validation
    $biopsy_core = textFilter(strip_tags($_POST['biopsy_core']));

    // ade_macro_appearance validation
    $ade_macro_appearance = textFilter(strip_tags($_POST['ade_macro_appearance']));

    // percentage_cellularity validation
    $percentage_cellularity = textFilter(strip_tags($_POST['percentage_cellularity']));

    // bone_architecture validation
    $bone_architecture = textFilter(strip_tags($_POST['bone_architecture']));

    // path validation
    $path = textFilter(strip_tags($_POST['path']));

    // tre_number validation
    $tre_number = textFilter(strip_tags($_POST['tre_number']));

    // erythroid validation
    $erythroid = textFilter(strip_tags($_POST['erythroid']));

    // myeloid validation
    $myeloid = textFilter(strip_tags($_POST['myeloid']));

    // megaka validation
    $megaka = textFilter(strip_tags($_POST['megaka']));

    // lymphoid validation
    $lymphoid = textFilter(strip_tags($_POST['lymphoid']));

    // plasma_cell validation
    $plasma_cell = textFilter(strip_tags($_POST['plasma_cell']));

    // macrophages validation
    $macrophages = textFilter(strip_tags($_POST['macrophages']));

    // abnormal_cell validation
    $abnormal_cell = textFilter(strip_tags($_POST['abnormal_cell']));

    // reticulin_stain validation
    $reticulin_stain = textFilter(strip_tags($_POST['reticulin_stain']));

    // immunohistochemistry validation
    $immunohistochemistry = textFilter(strip_tags($_POST['immunohistochemistry']));

    // histochemistry validation
    $histochemistry = textFilter(strip_tags($_POST['histochemistry']));

    // investigation validation
    $investigation = textFilter(strip_tags($_POST['investigation']));

    // conclusion validation
    $conclusion = textFilter(strip_tags($_POST['conclusion']));

    // disease_code validation
    $disease_code = textFilter(strip_tags($_POST['disease_code']));

    if (!$errorStatus){
        $sql = "INSERT INTO trephine_report (sc_date,institute_name,lab_no,patient_name,age,gender,address,physician_name,doctor,cli_history,bmexamination,pro_perform,anato_trephine,biopsy_core,ade_macro_appearance,percentage_cellularity,bone_architecture,location_from,tre_number,erythroid,myeloid,megaka,lymphoid,plasma_cell,macrophages,abnormal_cell,reticulin_stain,immu_histo,histochemistry,investigation,conclusion,disease_code)
                VALUES ('$due_date','$institute_name','$lab_access','$patient_name','$age','$gender','$contact_detail','$physician_name','$doctor','$clinical_history','$bmexamination','$pro_perform','$anatomic_site_trephine','$biopsy_core','$ade_macro_appearance','$percentage_cellularity','$bone_architecture','$path','$tre_number','$erythroid','$myeloid','$megaka','$lymphoid','$plasma_cell','$macrophages','$abnormal_cell','$reticulin_stain','$immunohistochemistry','$histochemistry','$investigation','$conclusion','$disease_code')";
        if (runQuery($sql)){
            $_SESSION['tre_report_status'] = "
            <div class='alert alert-success alert-dismissible fade show'>
            <i class='fa fa-check me-2'></i>
            Trephine Report Submitted
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            redirect("trephine_report_create");
        }else{
            echo alert("Report Failed!");
        }
    }

}

function trephine_report($id){
    $sql = "SELECT * FROM trephine_reports WHERE id=$id";
    return fetch($sql);
}

function trephine_reports(){
    $sql = "SELECT * FROM trephine_reports";
    return fetchAll($sql);
}

function trephine_report_delete($id){
    $sql = "DELETE FROM trephine_reports WHERE id=$id";
    return runQuery($sql);
}


function trephine_report_edit(){
    $errorStatus = 0;

    $due_date = "";
    $institute_name = "";
    $lab_access = "";
    $patient_name = "";
    $age = "";
    $gender = "";
    $contact_detail = "";
    $physician_name = "";
    $doctor = "";
    $clinical_history = "";
    $bmexamination = "";
    $pro_perform = "";
    $anatomic_site_trephine = "";
    $biopsy_core = "";
    $ade_macro_appearance = "";
    $percentage_cellularity = "";
    $bone_architecture = "";
    $path = "";
    $tre_number = "";
    $erythroid = "";
    $myeloid = "";
    $megaka = "";
    $lymphoid = "";
    $plasma_cell = "";
    $macrophages = "";
    $abnormal_cell = "";
    $reticulin_stain = "";
    $immunohistochemistry = "";
    $histochemistry = "";
    $investigation = "";
    $conclusion = "";
    $disease_code = "";

    // due date validation
    if (empty($_POST['due_date'])){
        setError("due_date","Date is Required!");
        $errorStatus = 1;
    }else{
        $due_date = textFilter(strip_tags($_POST['due_date']));
    }

    // institute_name validation
    if(empty($_POST['institute_name'])){
        setError("institute_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['institute_name']) < 5){
            setError("institute_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['institute_name']) > 40){
                setError("institute_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['institute_name'])) {
                    setError('institute_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $institute_name = textFilter($_POST['institute_name']);
                }
            }
        }
    }

    // lab_access validation
    if (empty($_POST['lab_access'])){
        setError("lab_access","Lab Access Number is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['lab_access'])){
            setError("lab_access","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            $lab_access = textFilter(strip_tags($_POST['lab_access']));
        }
    }

    // patient_name validation
    if(empty($_POST['patient_name'])){
        setError("patient_name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['patient_name']) < 5){
            setError("patient_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['patient_name']) > 40){
                setError("patient_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['patient_name'])) {
                    setError('patient_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $patient_name = textFilter($_POST['patient_name']);
                }
            }
        }
    }


    // age validation
    if (empty($_POST['age'])){
        setError("age","Age is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match('/^[0-9]*$/',$_POST['age'])){
            setError("age","Only Number Format Allow!");
            $errorStatus = 1;
        }else{
            if (!$_POST['age'] > 100){
                setError("age","Invalid Age!");
                $errorStatus = 1;
            }else{
                $age = textFilter(strip_tags($_POST['age']));
            }
        }
    }

    // gender validation
    if (empty($_POST['gender'])){
        setError("gender","Gender is Required!");
        $errorStatus = 1;
    }else{
        $gender = textFilter(strip_tags($_POST['gender']));
    }

    // contact_detail validation
    $contact_detail = textFilter(strip_tags($_POST['contact_detail']));

    // physician_name validation
    if(empty($_POST['physician_name'])){
        setError("physician_name","Physician Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['physician_name']) < 5){
            setError("physician_name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['physician_name']) > 40){
                setError("physician_name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['physician_name'])) {
                    setError('physician_name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $physician_name = textFilter($_POST['physician_name']);
                }
            }
        }
    }

    // doctor_name validation
    if(empty($_POST['doctor'])){
        setError("doctor","Doctor Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['doctor']) < 5){
            setError("doctor","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['doctor']) > 40){
                setError("doctor","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['doctor'])) {
                    setError('doctor',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $doctor = textFilter($_POST['doctor']);
                }
            }
        }
    }

    // clinical_history validation
    $clinical_history = textFilter(strip_tags($_POST['clinical_history']));

    // bmexamination validation
    $bmexamination = textFilter(strip_tags($_POST['bmexamination']));

    // pro_perform validation
    if (empty($_POST['pro_perform'])){
        setError("pro_perform","Procedure Perform is Required!");
        $errorStatus = 1;
    }else{
        $pro_perform = textFilter(strip_tags($_POST['pro_perform']));
    }

    // anatomic_site_trephine validation
    $anatomic_site_trephine = textFilter(strip_tags($_POST['anatomic_site_trephine']));

    // biopsy_core validation
    $biopsy_core = textFilter(strip_tags($_POST['biopsy_core']));

    // ade_macro_appearance validation
    $ade_macro_appearance = textFilter(strip_tags($_POST['ade_macro_appearance']));

    // percentage_cellularity validation
    $percentage_cellularity = textFilter(strip_tags($_POST['percentage_cellularity']));

    // bone_architecture validation
    $bone_architecture = textFilter(strip_tags($_POST['bone_architecture']));

    // path validation
    $path = textFilter(strip_tags($_POST['path']));

    // tre_number validation
    $tre_number = textFilter(strip_tags($_POST['tre_number']));

    // erythroid validation
    $erythroid = textFilter(strip_tags($_POST['erythroid']));

    // myeloid validation
    $myeloid = textFilter(strip_tags($_POST['myeloid']));

    // megaka validation
    $megaka = textFilter(strip_tags($_POST['megaka']));

    // lymphoid validation
    $lymphoid = textFilter(strip_tags($_POST['lymphoid']));

    // plasma_cell validation
    $plasma_cell = textFilter(strip_tags($_POST['plasma_cell']));

    // macrophages validation
    $macrophages = textFilter(strip_tags($_POST['macrophages']));

    // abnormal_cell validation
    $abnormal_cell = textFilter(strip_tags($_POST['abnormal_cell']));

    // reticulin_stain validation
    $reticulin_stain = textFilter(strip_tags($_POST['reticulin_stain']));

    // immunohistochemistry validation
    $immunohistochemistry = textFilter(strip_tags($_POST['immunohistochemistry']));

    // histochemistry validation
    $histochemistry = textFilter(strip_tags($_POST['histochemistry']));

    // investigation validation
    $investigation = textFilter(strip_tags($_POST['investigation']));

    // conclusion validation
    $conclusion = textFilter(strip_tags($_POST['conclusion']));

    // disease_code validation
    $disease_code = textFilter(strip_tags($_POST['disease_code']));

    if (!$errorStatus){
        $id = $_POST['id'];
        $sql = "UPDATE trephine_reports SET sc_date='$due_date',institute_name='$institute_name',lab_no='$lab_access',patient_name='$patient_name',age='$age',gender='$gender',address='$contact_detail',physician_name='$physician_name',doctor='$doctor',cli_history='$clinical_history',bmexamination='$bmexamination',pro_perform='$pro_perform',anato_trephine='$anatomic_site_trephine',biopsy_core='$biopsy_core',ade_macro_appearance='$ade_macro_appearance',percentage_cellularity='$percentage_cellularity',bone_architecture='$bone_architecture',location_from='$path',tre_number='$tre_number',erythroid='$erythroid',myeloid='$myeloid',megaka='$megaka',lymphoid='$lymphoid',plasma_cell='$plasma_cell',macrophages='$macrophages',abnormal_cell='$abnormal_cell',reticulin_stain='$reticulin_stain',immu_histo='$immunohistochemistry',histochemistry='$histochemistry',investigation='$investigation',conclusion='$conclusion',disease_code='$disease_code'
                WHERE id = $id";
        if (runQuery($sql)){
            $_SESSION['tre_report_edit_status'] = "
            <div class='alert alert-success alert-dismissible fade show'>
            <i class='fa fa-check me-2'></i>
            Trephine Report Updated.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            redirect("trephine_report");
        }else{
            echo alert("Report Failed!");
        }
    }

}

// Trephine report end


