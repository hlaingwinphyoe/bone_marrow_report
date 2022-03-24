<?php require_once "template/header.php"; ?>
<title>Bone Marrow Report / Aspirate Report</title>
<?php require_once "template/sidebar.php"; ?>

<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/">Aspirate Reports</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-capitalize">
                        <i class="fas fa-file-upload text-primary"></i> bone marrow aspirate report
                    </h4>
                    <a href="#" class="btn btn-outline-primary full-screen-btn" title="maximize">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
                <hr>

                <?php

                if (isset($_POST['save'])){
                    aspirate_report_create();
                }
                ?>
                <?php

                if (isset($_SESSION['aspirate_report_status'])){
                    echo $_SESSION['aspirate_report_status'];
                }

                ?>

                <form action="" method="post">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="">Date of Procedure</label>
                                <div class="">
                                    <input type="date" class="form-control" name="due_date" value="<?php echo old('due_date') ?>">
                                    <?php if (getError('due_date')){ ?>
                                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('due_date'); ?></small>
                                    <?php }; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Name Of Institute</label>
                                <div class="form-floating">
                                    <input type="text" name="institute_name" class="form-control" id="institute_name" placeholder="institute_name" value="<?php echo old('institute_name') ?>">
                                    <label for="institute_name">Enter Institute Name</label>
                                </div>
                                <?php if (getError('institute_name')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('institute_name'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Laboratory Accession Number</label>
                                <div class="form-floating">
                                    <input type="number" name="lab_access" class="form-control" id="lab_access" placeholder="lab_access" value="<?php echo old('lab_access') ?>">
                                    <label for="lab_access">Enter....</label>
                                </div>
                                <?php if (getError('lab_access')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('lab_access'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Patient's Name</label>
                                <div class="form-floating">
                                    <input type="text" name="patient_name" class="form-control" id="patient_name" placeholder="patient_name" value="<?php echo old('patient_name') ?>">
                                    <label for="patient_name">Enter Patient's Name</label>
                                </div>
                                <?php if (getError('patient_name')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('patient_name'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Age</label>
                                <div class="form-floating">
                                    <input type="number" name="age" class="form-control" id="age" placeholder="age" value="<?php echo old('age') ?>">
                                    <label for="age">Enter Age</label>
                                </div>
                                <?php if (getError('age')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('age'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Gender</label><br>
                                <?php foreach ($genderArr as $g){ ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="<?php echo $g; ?>_id" name="gender" value="<?php echo $g; ?>" class="custom-control-input" <?php echo old('gender') == $g ? 'checked':''; ?>>
                                    <label class="form-check-label" for="<?php echo $g; ?>_id">
                                        <?php echo $g; ?>
                                    </label>
                                </div>
                                <?php } ?> <br>
                                <?php if (getError('gender')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('gender'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="contact_detail" class="form-label">Contact Details</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="contact_detail" id="contact_detail" placeholder="Enter Contact Details" style="height: 130px"><?php echo old('contact_detail')?></textarea>
                                    <label for="floatingTextarea2">Enter Contact Details</label>
                                </div>
                                <?php if (getError('contact_detail')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('contact_detail'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Physician</label>
                                <div class="form-floating">
                                    <input type="text" name="physician_name" class="form-control" id="physician_name" placeholder="physician_name" value="<?php echo old('physician_name') ?>">
                                    <label for="physician_name">Enter Responsible Physician</label>
                                </div>
                                <?php if (getError('physician_name')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('physician_name'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Doctors</label>
                                <div class="form-floating">
                                    <input type="text" name="doctor" class="form-control" id="doctor" placeholder="doctor" value="<?php echo old('doctor') ?>">
                                    <label for="doctor">Enter Requesting Doctors</label>
                                </div>
                                <?php if (getError('doctor')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('doctor'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="clinical_history" class="form-label">Clinical History</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="clinical_history" id="clinical_history" placeholder="Enter clinical history" style="height: 130px"><?php echo old('clinical_history')?></textarea>
                                    <label for="floatingTextarea2">Enter Clinical History</label>
                                </div>
                                <?php if (getError('clinical_history')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('clinical_history'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="bmexamination" class="form-label">Bone Marrow Examination</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="bmexamination" id="bmexamination" placeholder="Enter Indication for Bone Marrow Examination" style="height: 130px"><?php echo old('bmexamination')?></textarea>
                                    <label for="floatingTextarea2">Enter Indication for Bone Marrow Examination</label>
                                </div>
                                <?php if (getError('bmexamination')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('bmexamination'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Procedure Perform</label><br>
                                <?php foreach ($pro_performArr as $g){ ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="<?php echo $g; ?>_id" name="pro_perform" value="<?php echo $g; ?>" class="custom-control-input" <?php echo old('pro_perform') == $g ? 'checked':''; ?>>
                                        <label class="form-check-label" for="<?php echo $g; ?>_id">
                                            <?php echo $g; ?>
                                        </label>
                                    </div>
                                <?php } ?><br>
                                <?php if (getError('pro_perform')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('pro_perform'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="anatomic_site_aspirate" class="form-label">Anatomic site of aspirate/biopsy</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="anatomic_site_aspirate" id="anatomic_site_aspirate" placeholder="Enter Anatomic site of aspirate/biopsy" style="height: 130px"><?php echo old('anatomic_site_aspirate')?></textarea>
                                    <label for="floatingTextarea2">Enter Anatomic site of aspirate/biopsy</label>
                                </div>
                                <?php if (getError('anatomic_site_aspirate')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('anatomic_site_aspirate'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="ease_diff_aspirate" class="form-label">Ease/difficulty of aspiration</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="ease_diff_aspirate" id="ease_diff_aspirate" placeholder="Enter Ease/difficulty of aspiration" style="height: 130px"><?php echo old('ease_diff_aspirate')?></textarea>
                                    <label for="floatingTextarea2">Enter Ease/difficulty of aspiration</label>
                                </div>
                                <?php if (getError('ease_diff_aspirate')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('ease_diff_aspirate'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="blood_count" class="form-label">Blood Count</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="blood_count" id="blood_count" placeholder="Enter Blood Count" style="height: 130px"><?php echo old('blood_count')?></textarea>
                                    <label for="floatingTextarea2">Enter Blood Count</label>
                                </div>
                                <?php if (getError('blood_count')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('blood_count'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="blood_smear" class="form-label">Blood Smear</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="blood_smear" id="blood_smear" placeholder="Enter Blood smear description and diagnostic conclusion" style="height: 130px"><?php echo old('blood_smear')?></textarea>
                                    <label for="floatingTextarea2">Enter Blood smear description and diagnostic conclusion</label>
                                </div>
                                <?php if (getError('blood_smear')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('blood_smear'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="cellular_particles" class="form-label">Cellularity of particles and cell trails</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="cellular_particles" id="cellular_particles" placeholder="Enter Cellularity of particles and cell trails" style="height: 130px"><?php echo old('cellular_particles')?></textarea>
                                    <label for="floatingTextarea2">Enter Cellularity of particles and cell trails</label>
                                </div>
                                <?php if (getError('cellular_particles')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('cellular_particles'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="nucleated_differential" class="form-label">Nucleated differential cell count</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="nucleated_differential" id="nucleated_differential" placeholder="Enter Nucleated differential cell count" style="height: 130px"><?php echo old('nucleated_differential')?></textarea>
                                    <label for="floatingTextarea2">Enter Nucleated differential cell count</label>
                                </div>
                                <?php if (getError('nucleated_differential')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('nucleated_differential'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="total_cell_count" class="form-label">Total number of cells counted</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="total_cell_count" id="total_cell_count" placeholder="Enter Total number of cells counted" style="height: 130px"><?php echo old('total_cell_count')?></textarea>
                                    <label for="floatingTextarea2">Enter Total number of cells counted</label>
                                </div>
                                <?php if (getError('total_cell_count')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('total_cell_count'); ?></small>
                                <?php }; ?>
                            </div>

                        </div>

                        <div class="col-md">
                            <div class="mb-3">
                                <label for="myeloid" class="form-label">Myeloid:erythroid ratio</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="myeloid" id="myeloid" placeholder="Enter Myeloid:erythroid ratio" style="height: 130px"><?php echo old('myeloid')?></textarea>
                                    <label for="floatingTextarea2">Enter Myeloid:erythroid ratio</label>
                                </div>
                                <?php if (getError('myeloid')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('myeloid'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="erythropoiesis" class="form-label">Erythropoiesis</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="erythropoiesis" id="erythropoiesis" placeholder="Enter Erythropoiesis" style="height: 130px"><?php echo old('erythropoiesis')?></textarea>
                                    <label for="floatingTextarea2">Enter Erythropoiesis</label>
                                </div>
                                <?php if (getError('erythropoiesis')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('erythropoiesis'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="myelopoiesis" class="form-label">Myelopoiesis</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="myelopoiesis" id="myelopoiesis" placeholder="Enter Myelopoiesis" style="height: 130px"><?php echo old('myelopoiesis')?></textarea>
                                    <label for="floatingTextarea2">Enter Myelopoiesis</label>
                                </div>
                                <?php if (getError('myelopoiesis')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('myelopoiesis'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="megakaryocytes" class="form-label">Megakaryocytes</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="megakaryocytes" id="megakaryocytes" placeholder="Enter Megakaryocytes" style="height: 130px"><?php echo old('myelopoiesis')?></textarea>
                                    <label for="floatingTextarea2">Enter Megakaryocytes</label>
                                </div>
                                <?php if (getError('megakaryocytes')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('megakaryocytes'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="lymphocytes" class="form-label">Lymphocytes</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="lymphocytes" id="lymphocytes" placeholder="Enter Lymphocytes" style="height: 130px"><?php echo old('lymphocytes')?></textarea>
                                    <label for="floatingTextarea2">Enter Lymphocytes</label>
                                </div>
                                <?php if (getError('lymphocytes')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('lymphocytes'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="plasma_cell" class="form-label">Plasma cells</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="plasma_cell" id="plasma_cell" placeholder="Enter Plasma cells" style="height: 130px"><?php echo old('plasma_cell')?></textarea>
                                    <label for="floatingTextarea2">Enter Plasma cells</label>
                                </div>
                                <?php if (getError('plasma_cell')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('plasma_cell'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="haemopoietic_cell" class="form-label">Haemopoietic Cells</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="haemopoietic_cell" id="haemopoietic_cell" placeholder="Enter Haemopoietic Cells" style="height: 130px"><?php echo old('haemopoietic_cell')?></textarea>
                                    <label for="floatingTextarea2">Enter Haemopoietic Cells</label>
                                </div>
                                <?php if (getError('haemopoietic_cell')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('haemopoietic_cell'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="abnormal_cell" class="form-label">Abnormal Cells</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="abnormal_cell" id="abnormal_cell" placeholder="Enter Abnormal Cells" style="height: 130px"><?php echo old('abnormal_cell')?></textarea>
                                    <label for="floatingTextarea2">Enter Abnormal Cells</label>
                                </div>
                                <?php if (getError('abnormal_cell')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('abnormal_cell'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="iron_stain" class="form-label">Iron Stain</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="iron_stain" id="iron_stain" placeholder="Enter Iron Stain" style="height: 130px"><?php echo old('iron_stain')?></textarea>
                                    <label for="floatingTextarea2">Enter Iron Stain</label>
                                </div>
                                <?php if (getError('iron_stain')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('iron_stain'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="cytochemistry" class="form-label">Cytochemistry</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="cytochemistry" id="cytochemistry" placeholder="Enter Cytochemistry" style="height: 130px"><?php echo old('cytochemistry')?></textarea>
                                    <label for="floatingTextarea2">Enter Cytochemistry</label>
                                </div>
                                <?php if (getError('cytochemistry')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('cytochemistry'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="investigation" class="form-label">Other investigations</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="investigation" id="investigation" placeholder="Enter Other investigations" style="height: 130px"><?php echo old('investigation')?></textarea>
                                    <label for="floatingTextarea2">Enter Other investigations</label>
                                </div>
                                <?php if (getError('investigation')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('investigation'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="flow_cytometry" class="form-label">Summary of flow cytometry findings</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="flow_cytometry" id="flow_cytometry" placeholder="Enter Summary of flow cytometry findings" style="height: 130px"><?php echo old('flow_cytometry')?></textarea>
                                    <label for="floatingTextarea2">Enter Summary of flow cytometry findings</label>
                                </div>
                                <?php if (getError('flow_cytometry')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('flow_cytometry'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="conclusion" class="form-label">Conclusion</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="conclusion" id="conclusion" placeholder="Enter Conclusion" style="height: 130px"><?php echo old('conclusion')?></textarea>
                                    <label for="floatingTextarea2">Enter Conclusion</label>
                                </div>
                                <?php if (getError('conclusion')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('conclusion'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="classification" class="form-label">WHO classification</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="classification" id="classification" placeholder="Enter WHO classification" style="height: 130px"><?php echo old('classification')?></textarea>
                                    <label for="floatingTextarea2">Enter WHO classification</label>
                                </div>
                                <?php if (getError('classification')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('classification'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="disease_code" class="form-label">Disease Code</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="disease_code" id="disease_code" placeholder="Disease Code" style="height: 130px"><?php echo old('disease_code')?></textarea>
                                    <label for="floatingTextarea2">Enter Disease Code</label>
                                </div>
                                <?php if (getError('disease_code')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('disease_code'); ?></small>
                                <?php }; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary text-uppercase" name="save"><i class="fa fa-save me-2"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php clearError(); ?>

<?php require_once "template/footer.php"; ?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
