<?php require_once "template/header.php"; ?>
<title>Bone Marrow Report / Trephine Report</title>
<?php require_once "template/sidebar.php"; ?>

<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/trephine_report">Trephine Reports</a></li>
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
                        <i class="fas fa-plus text-primary"></i> bone marrow trephine report
                    </h4>
                    <a href="#" class="btn btn-outline-primary full-screen-btn" title="maximize">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
                <hr>

                <?php

                if (isset($_POST['tre_save'])){
                    trephine_report_create();
                }
                ?>

                <?php

                if (isset($_SESSION['tre_report_status'])){
                    echo $_SESSION['tre_report_status'];
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
                                <?php foreach ($tre_pro_performArr as $g){ ?>
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
                                <label for="anatomic_site_trephine" class="form-label">Anatomic site of Aspirate / Trephine biopsy</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="anatomic_site_trephine" id="anatomic_site_trephine" placeholder="Enter Anatomic site of Aspirate / Trephine biopsy" style="height: 130px"><?php echo old('anatomic_site_trephine')?></textarea>
                                    <label for="floatingTextarea2">Enter Anatomic site of Aspirate / Trephine biopsy</label>
                                </div>
                                <?php if (getError('anatomic_site_trephine')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('anatomic_site_trephine'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="biopsy_core" class="form-label">Aggregate Length Of Biopsy Core</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="biopsy_core" id="biopsy_core" placeholder="Enter Aggregate length of biopsy core" style="height: 130px"><?php echo old('biopsy_core')?></textarea>
                                    <label for="floatingTextarea2">Enter Aggregate Length Of Biopsy Core</label>
                                </div>
                                <?php if (getError('biopsy_core')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('biopsy_core'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="ade_macro_appearance" class="form-label">Adequacy And Macroscopic Appearance Of Core</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="ade_macro_appearance" id="ade_macro_appearance" placeholder="Enter Adequacy And Macroscopic Appearance Of Core" style="height: 130px"><?php echo old('ade_macro_appearance')?></textarea>
                                    <label for="floatingTextarea2">Enter Adequacy And Macroscopic Appearance Of Core</label>
                                </div>
                                <?php if (getError('ade_macro_appearance')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('ade_macro_appearance'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="percentage_cellularity" class="form-label">Percentage And Pattern Of Cellularity</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="percentage_cellularity" id="percentage_cellularity" placeholder="Enter Percentage And Pattern Of Cellularity" style="height: 130px"><?php echo old('percentage_cellularity')?></textarea>
                                    <label for="floatingTextarea2">Enter Percentage And Pattern Of Cellularity</label>
                                </div>
                                <?php if (getError('percentage_cellularity')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('percentage_cellularity'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="bone_architecture" class="form-label">Bone Architecture</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="bone_architecture" id="bone_architecture" placeholder="Enter Bone Architecture" style="height: 130px"><?php echo old('bone_architecture')?></textarea>
                                    <label for="floatingTextarea2">Enter Bone Architecture</label>
                                </div>
                                <?php if (getError('bone_architecture')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('bone_architecture'); ?></small>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="path" class="form-label">Location</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="path" id="path" placeholder="Enter Location" style="height: 130px"><?php echo old('path')?></textarea>
                                    <label for="floatingTextarea2">Enter Location</label>
                                </div>
                                <?php if (getError('path')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('path'); ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md">


                            <div class="mb-3">
                                <label for="tre_number" class="form-label">Number</label>
                                <div class="form-floating">
                                    <input type="number" name="tre_number" class="form-control" id="tre_number" placeholder="tre_number" value="<?php echo old('tre_number') ?>">
                                    <label for="tre_number">Enter Number</label>
                                </div>
                                <?php if (getError('tre_number')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('tre_number'); ?></small>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="erythroid" class="form-label">Morphology And Pattern of Differentiation For Erythroid</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="erythroid" id="erythroid" placeholder="Enter Morphology And Pattern of Differentiation For Erythroid" style="height: 130px"><?php echo old('erythroid')?></textarea>
                                    <label for="floatingTextarea2">Enter Morphology And Pattern of Differentiation For Erythroid</label>
                                </div>
                                <?php if (getError('erythroid')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('erythroid'); ?></small>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="myeloid" class="form-label">Myeloid Lineages</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="myeloid" id="myeloid" placeholder="Enter Myeloid Lineages" style="height: 130px"><?php echo old('myeloid')?></textarea>
                                    <label for="floatingTextarea2">Enter Myeloid Lineages</label>
                                </div>
                                <?php if (getError('myeloid')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('myeloid'); ?></small>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="megaka" class="form-label">Megakaryocytic Lineages</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="megaka" id="megaka" placeholder="Enter Megakaryocytic Lineages" style="height: 130px"><?php echo old('megaka')?></textarea>
                                    <label for="floatingTextarea2">Enter Megakaryocytic Lineages</label>
                                </div>
                                <?php if (getError('megaka')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('megaka'); ?></small>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="lymphoid" class="form-label">Lymphoid Cells</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="lymphoid" id="lymphoid" placeholder="Enter Lymphoid Cells" style="height: 130px"><?php echo old('lymphoid')?></textarea>
                                    <label for="floatingTextarea2">Enter Lymphoid Cells</label>
                                </div>
                                <?php if (getError('lymphoid')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('lymphoid'); ?></small>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="plasma_cell" class="form-label">Plasma Cell</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="plasma_cell" id="plasma_cell" placeholder="Enter Plasma Cell" style="height: 130px"><?php echo old('plasma_cell')?></textarea>
                                    <label for="floatingTextarea2">Enter Plasma Cell</label>
                                </div>
                                <?php if (getError('plasma_cell')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('plasma_cell'); ?></small>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="macrophages" class="form-label">Macrophages</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="macrophages" id="macrophages" placeholder="Enter Macrophages" style="height: 130px"><?php echo old('macrophages')?></textarea>
                                    <label for="floatingTextarea2">Enter Macrophages</label>
                                </div>
                                <?php if (getError('macrophages')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('macrophages'); ?></small>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="abnormal_cell" class="form-label">Abnormal cells and/or infiltrates</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="abnormal_cell" id="abnormal_cell" placeholder="Enter Abnormal cells and/or infiltrates" style="height: 130px"><?php echo old('abnormal_cell')?></textarea>
                                    <label for="floatingTextarea2">Enter Abnormal cells and/or infiltrates</label>
                                </div>
                                <?php if (getError('abnormal_cell')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('abnormal_cell'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="reticulin_stain" class="form-label">Reticulin Stain</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="reticulin_stain" id="reticulin_stain" placeholder="Enter Reticulin Stain" style="height: 130px"><?php echo old('reticulin_stain')?></textarea>
                                    <label for="floatingTextarea2">Enter Reticulin Stain</label>
                                </div>
                                <?php if (getError('reticulin_stain')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('reticulin_stain'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="immunohistochemistry" class="form-label">Immunohistochemistry</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="immunohistochemistry" id="immunohistochemistry" placeholder="Enter Immunohistochemistry" style="height: 130px"><?php echo old('immunohistochemistry')?></textarea>
                                    <label for="floatingTextarea2">Enter Immunohistochemistry</label>
                                </div>
                                <?php if (getError('immunohistochemistry')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('immunohistochemistry'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="histochemistry" class="form-label">Histochemistry</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="histochemistry" id="histochemistry" placeholder="Enter Histochemistry" style="height: 130px"><?php echo old('histochemistry')?></textarea>
                                    <label for="floatingTextarea2">Enter Histochemistry</label>
                                </div>
                                <?php if (getError('histochemistry')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('histochemistry'); ?></small>
                                <?php }; ?>
                            </div>
                            <div class="mb-3">
                                <label for="investigation" class="form-label">Other Investigations</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="investigation" id="investigation" placeholder="Enter Other Investigations" style="height: 130px"><?php echo old('myelopoiesis')?></textarea>
                                    <label for="floatingTextarea2">Enter Other Investigations</label>
                                </div>
                                <?php if (getError('investigation')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('investigation'); ?></small>
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
                                <label for="disease_code" class="form-label">Disease Code</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="disease_code" id="disease_code" placeholder="Enter Disease Code" style="height: 130px"><?php echo old('disease_code')?></textarea>
                                    <label for="floatingTextarea2">Enter Disease Code</label>
                                </div>
                                <?php if (getError('disease_code')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('disease_code'); ?></small>
                                <?php }; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary text-uppercase" name="tre_save"><i class="fa fa-save me-2"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php clearError(); ?>

<?php require_once "template/footer.php"; ?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
