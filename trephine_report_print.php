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
                            <h5 class="text-center text-uppercase">ICSH Guidelines</h5>
                            <div class="ms-5 mt-4">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td class="fw-bold text-capitalize text-nowrap">Date of procedure</td>
                                        <td><?php echo $currentReport['sc_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize text-nowrap">Name of institution</td>
                                        <td><?php echo $currentReport['institute_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Laboratory Accession Number</td>
                                        <td><?php echo $currentReport['lab_no'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Patient's Name</td>
                                        <td><?php echo $currentReport['patient_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">age</td>
                                        <td><?php echo $currentReport['age'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">gender</td>
                                        <td><?php echo $currentReport['gender'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">address</td>
                                        <td><?php echo $currentReport['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">physician name</td>
                                        <td><?php echo $currentReport['physician_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">requested doctor</td>
                                        <td><?php echo $currentReport['doctor'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Significant clinical history</td>
                                        <td><?php echo $currentReport['cli_history'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class="fw-bold text-capitalize">Indication for bone marrow examination</td>
                                        <td><?php echo $currentReport['bmexamination'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Procedure performed</td>
                                        <td><?php echo $currentReport['pro_perform'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Anatomic site of aspirate/trephine biopsy</td>
                                        <td><?php echo $currentReport['anato_trephine'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Aggregate length of biopsy core</td>
                                        <td><?php echo $currentReport['biopsy_core'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Adequacy and macroscopic appearance of core</td>
                                        <td><?php echo $currentReport['ade_macro_appearance'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Percentage and pattern of cellularity</td>
                                        <td><?php echo $currentReport['percentage_cellularity'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Bone architecture</td>
                                        <td><?php echo $currentReport['bone_architecture'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Location</td>
                                        <td><?php echo $currentReport['location_from'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Number</td>
                                        <td><?php echo $currentReport['tre_number'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">morphology and pattern of differentiation for erythroid</td>
                                        <td><?php echo $currentReport['erythroid'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">myeloid lineages</td>
                                        <td><?php echo $currentReport['myeloid'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">megakaryocytic lineages</td>
                                        <td><?php echo $currentReport['megaka'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">lymphoid cells</td>
                                        <td><?php echo $currentReport['lymphoid'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">macrophages</td>
                                        <td><?php echo $currentReport['macrophages'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">plasma cells</td>
                                        <td><?php echo $currentReport['plasma_cell'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize  ">Abnormal cells and/or infiltrates</td>
                                        <td><?php echo $currentReport['abnormal_cell'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Reticulin stain</td>
                                        <td><?php echo $currentReport['reticulin_stain'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Immunohistochemistry</td>
                                        <td><?php echo $currentReport['immu_histo'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Histochemistry</td>
                                        <td><?php echo $currentReport['histochemistry'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Other investigations (e.g. FISH, PCR</td>
                                        <td><?php echo $currentReport['investigation'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Conclusion</td>
                                        <td><?php echo $currentReport['conclusion'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-capitalize">Disease code</td>
                                        <td><?php echo $currentReport['disease_code'] ?></td>
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
