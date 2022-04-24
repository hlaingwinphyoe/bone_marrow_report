<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$currentId = $_GET['patient_id'];
$currentReport = aspirate_report($currentId);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $currentReport['patient_name'] ?> - Aspirate Print Report</title>

    <link rel="icon" href="<?php echo $url; ?>/assets/img/logo.png">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/print.css" media="print">
    <link rel="manifest" href="<?php echo $url; ?>/manifest.json">
</head>
<body onload="print()">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-capitalize text-center">
                            bone marrow aspirate report
                        </h3>
                        <h5 class="text-center text-uppercase">ICSH Guidelines</h5>
                        <div class="row mt-5">
                            <div class="col-12">
                                <h6 class="text-uppercase">Patient's Particulars</h6>
                                <div class="ms-5 mt-4">
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <td class="fw-bold text-capitalize text-nowrap">Date of procedure:</td>
                                            <td class="result"><?php echo $currentReport['sc_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize text-nowrap">Name of institution</td>
                                            <td class="result"><?php echo $currentReport['institute_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Laboratory Accession Number</td>
                                            <td class="result"><?php echo $currentReport['lab_no'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Patient's Name</td>
                                            <td class="result"><?php echo $currentReport['patient_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">age</td>
                                            <td class="result"><?php echo $currentReport['age'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">gender</td>
                                            <td class="result"><?php echo $currentReport['gender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">address</td>
                                            <td class="result"><?php echo $currentReport['address'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">physician name</td>
                                            <td class="result"><?php echo $currentReport['physician_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">requested doctor</td>
                                            <td class="result"><?php echo $currentReport['doctor'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Significant clinical history</td>
                                            <td class="result"><?php echo $currentReport['cli_history'] ?></td>
                                        </tr>

                                        <tr>
                                            <td class="fw-bold text-capitalize">Indication for bone marrow examination</td>
                                            <td class="result"><?php echo $currentReport['bmexamination'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Procedure performed</td>
                                            <td class="result"><?php echo $currentReport['pro_perform'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Anatomic site of aspirate/biopsy</td>
                                            <td class="result"><?php echo $currentReport['anato_aspirate'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Ease/difficulty of aspiration</td>
                                            <td class="result"><?php echo $currentReport['ease_diff_aspirate'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Blood count</td>
                                            <td class="result"><?php echo $currentReport['blood_count'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Blood smear description and diagnostic conclusion</td>
                                            <td class="result"><?php echo $currentReport['blood_smear'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Cellularity of particles and cell trails</td>
                                            <td class="result"><?php echo $currentReport['cellularity'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Nucleated differential cell count</td>
                                            <td class="result"><?php echo $currentReport['nucleated_differential'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Total number of cells counted</td>
                                            <td class="result"><?php echo $currentReport['total_cell'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Myeloid:erythroid ratio</td>
                                            <td class="result"><?php echo $currentReport['myeloid'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Erythropoiesis</td>
                                            <td class="result"><?php echo $currentReport['erythro'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Myelopoiesis</td>
                                            <td class="result"><?php echo $currentReport['myelopoiesis'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Megakaryocytes</td>
                                            <td class="result"><?php echo $currentReport['megaka'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Lymphocytes</td>
                                            <td class="result"><?php echo $currentReport['lympho'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Plasma cells</td>
                                            <td class="result"><?php echo $currentReport['plasma_cell'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Other haemopoietic cells</td>
                                            <td class="result"><?php echo $currentReport['haemopoietic'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Abnormal cells</td>
                                            <td class="result"><?php echo $currentReport['abnormal_cell'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Iron Stain</td>
                                            <td class="result"><?php echo $currentReport['iron_stain'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Cytochemistry</td>
                                            <td class="result"><?php echo $currentReport['cytochemistry'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Other investigations</td>
                                            <td class="result"><?php echo $currentReport['investigation'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Summary of flow cytometry findings</td>
                                            <td class="result"><?php echo $currentReport['flow_cyto'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Conclusion</td>
                                            <td class="result"><?php echo $currentReport['conclusion'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">WHO classification</td>
                                            <td class="result"><?php echo $currentReport['classification'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Disease code</td>
                                            <td class="result"><?php echo $currentReport['disease_code'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-capitalize">Doctor's Signature</td>
                                            <td><img src="<?php echo user($_SESSION['user']['id'])['sg_photo'] ?>" style="width: 100px;" alt=""></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo $url; ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
