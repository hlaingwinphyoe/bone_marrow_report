<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$currentId = $_GET['patient_id'];
$currentReport = trephine_report($currentId);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $currentReport['patient_name'] ?> - Trephine Print Report</title>

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
                        bone marrow trephine report
                    </h3>
                    <div class="row mt-5">
                        <div class="col-12 col-lg-7">
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
                                    <span class="fw-bold text-capitalize">Anatomic site of aspirate/trephine biopsy</span>
                                    <span><?php echo $currentReport['anato_trephine'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Aggregate length of biopsy core</span>
                                    <span><?php echo $currentReport['biopsy_core'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Adequacy and macroscopic appearance of core</span>
                                    <span><?php echo $currentReport['ade_macro_appearance'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Percentage and pattern of cellularity</span>
                                    <span><?php echo $currentReport['percentage_cellularity'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Bone architecture</span>
                                    <span><?php echo $currentReport['bone_architecture'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Location</span>
                                    <span><?php echo $currentReport['location_from'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Number</span>
                                    <span><?php echo $currentReport['tre_number'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">morphology and pattern of differentiation for erythroid</span>
                                    <span><?php echo $currentReport['erythroid'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">myeloid lineages</span>
                                    <span><?php echo $currentReport['myeloid'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">megakaryocytic lineages</span>
                                    <span><?php echo $currentReport['megaka'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">lymphoid cells</span>
                                    <span><?php echo $currentReport['lymphoid'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">macrophages</span>
                                    <span><?php echo $currentReport['macrophages'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">plasma cells</span>
                                    <span><?php echo $currentReport['plasma_cell'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Abnormal cells and/or infiltrates</span>
                                    <span><?php echo $currentReport['abnormal_cell'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Reticulin stain</span>
                                    <span><?php echo $currentReport['reticulin_stain'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Immunohistochemistry</span>
                                    <span><?php echo $currentReport['immu_histo'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Histochemistry</span>
                                    <span><?php echo $currentReport['histochemistry'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Other investigations (e.g. FISH, PCR</span>
                                    <span><?php echo $currentReport['investigation'] ?></span>
                                </small>
                                <small class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-capitalize">Conclusion</span>
                                    <span><?php echo $currentReport['conclusion'] ?></span>
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
