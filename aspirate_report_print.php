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
                        <div class="row mt-5">
                            <div class="col-12 col-lg-6">
                                <h6 class="text-uppercase">Patient's Particulars</h6>
                                <div class="ms-5 mt-4">
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Date of procedure</span>
                                        <span><?php echo $currentReport['sc_date'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Name of institution</span>
                                        <span><?php echo $currentReport['institute_name'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Laboratory Accession Number</span>
                                        <span><?php echo $currentReport['lab_no'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Patient's Name</span>
                                        <span><?php echo $currentReport['patient_name'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">age</span>
                                        <span><?php echo $currentReport['age'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">gender</span>
                                        <span><?php echo $currentReport['gender'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">address</span>
                                        <span><?php echo $currentReport['address'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">physician name</span>
                                        <span><?php echo $currentReport['physician_name'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">requested doctor</span>
                                        <span><?php echo $currentReport['doctor'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Significant clinical history</span>
                                        <span><?php echo $currentReport['cli_history'] ?></span>
                                    </small>

                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Indication for bone marrow examination</span>
                                        <span><?php echo $currentReport['bmexamination'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Procedure performed</span>
                                        <span><?php echo $currentReport['pro_perform'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Anatomic site of aspirate/biopsy</span>
                                        <span><?php echo $currentReport['anato_aspirate'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Ease/difficulty of aspiration</span>
                                        <span><?php echo $currentReport['ease_diff_aspirate'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Blood count</span>
                                        <span><?php echo $currentReport['blood_count'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Blood smear description and diagnostic conclusion</span>
                                        <span><?php echo $currentReport['blood_smear'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Cellularity of particles and cell trails</span>
                                        <span><?php echo $currentReport['cellularity'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Nucleated differential cell count</span>
                                        <span><?php echo $currentReport['nucleated_differential'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Total number of cells counted</span>
                                        <span><?php echo $currentReport['total_cell'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Myeloid:erythroid ratio</span>
                                        <span><?php echo $currentReport['myeloid'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Erythropoiesis</span>
                                        <span><?php echo $currentReport['erythro'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Myelopoiesis</span>
                                        <span><?php echo $currentReport['myelopoiesis'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Megakaryocytes</span>
                                        <span><?php echo $currentReport['megaka'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Lymphocytes</span>
                                        <span><?php echo $currentReport['lympho'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Plasma cells</span>
                                        <span><?php echo $currentReport['plasma_cell'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Other haemopoietic cells</span>
                                        <span><?php echo $currentReport['haemopoietic'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Abnormal cells</span>
                                        <span><?php echo $currentReport['abnormal_cell'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Iron Stain</span>
                                        <span><?php echo $currentReport['iron_stain'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Cytochemistry</span>
                                        <span><?php echo $currentReport['cytochemistry'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Other investigations</span>
                                        <span><?php echo $currentReport['investigation'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Summary of flow cytometry findings</span>
                                        <span><?php echo $currentReport['flow_cyto'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Conclusion</span>
                                        <span><?php echo $currentReport['conclusion'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">WHO classification</span>
                                        <span><?php echo $currentReport['classification'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Disease code</span>
                                        <span><?php echo $currentReport['disease_code'] ?></span>
                                    </small>
                                    <small class="mb-3 d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-capitalize">Doctor's Signature</span>
                                        <span><img src="<?php echo user($_SESSION['user']['id'])['sg_photo'] ?>" style="width: 100px;" alt=""></span>
                                    </small>

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
