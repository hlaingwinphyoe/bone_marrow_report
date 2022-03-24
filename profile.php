<?php require_once "template/header.php"; ?>
<title>Bone Marrow Reports / Profile</title>
<?php require_once "template/sidebar.php"; ?>

<?php

$id = $_SESSION['user']['id'];
$currentUser = user($id);

?>

<div class="row">
    <div class="col-12 col-lg-5">
        <div class="card mb-4 shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-info-circle text-primary"></i> Update Information
                    </h4>
                </div>

                <?php
                if (isset($_POST['info_btn'])){
                    profile_update($id);
                }

                ?>

                <?php

                if (isset($_SESSION['info_status'])){
                    echo $_SESSION['info_status'];
                }

                ?>

                <form action="" method="post">
                    <div style="    margin: 40px 0 !important;">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control profile_input" id="name" value="<?php echo $currentUser['name'] ?>">
                        <?php if (getError('name')){ ?>
                            <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('name'); ?></small>
                        <?php }; ?>
                    </div>
                    <div style="    margin-bottom: 40px !important;">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control profile_input" id="email" value="<?php echo $currentUser['email'] ?>">
                        <?php if (getError('email')){ ?>
                            <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('email'); ?></small>
                        <?php }; ?>
                    </div>
                    <div class="mb-0 mt-5">
                        <button class="btn btn-primary text-uppercase" name="info_btn"><i class='fa fa-save me-2'></i>Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!--    <div class="col-12 col-lg-5">-->
<!--        <div class="card mb-4 shadow">-->
<!--            <div class="card-body">-->
<!--                <div class="d-flex justify-content-between align-items-center">-->
<!--                    <h4 class="mb-0">-->
<!--                        <i class="fas fa-key text-primary"></i> Change Password-->
<!--                    </h4>-->
<!--                </div>-->
<!---->
<!--                --><?php
//
//                if (isset($_POST['change'])){
//                    change();
//                }
//
//                ?>
<!--                --><?php
//
//                if (isset($_SESSION['msg1'])){
//                    echo $_SESSION['msg1'];
//                }
//
//                ?>
<!--                <form action="" method="post">-->
<!---->
<!--                    <div style="    margin: 40px 0; !important;">-->
<!--                        <input type="hidden" name="id" value="--><?php //echo $id; ?><!--">-->
<!--                        <label>Current Password</label>-->
<!--                        <input type="password" name="old_password" class="form-control profile_input" id="old_password">-->
<!--                        --><?php //if (getError('old_password')){ ?>
<!--                            <small class="fw-bold text-danger" style="margin-left: 10px;">--><?php //echo getError('old_password'); ?><!--</small>-->
<!--                        --><?php //}; ?>
<!--                    </div>-->
<!---->
<!--                    <div style="    margin-bottom: 40px !important;">-->
<!--                        <label>New Password</label>-->
<!--                        <input type="password" name="new_password" class="form-control profile_input" id="new_password">-->
<!--                        --><?php //if (getError('new_password')){ ?>
<!--                            <small class="fw-bold text-danger" style="margin-left: 10px;">--><?php //echo getError('new_password'); ?><!--</small>-->
<!--                        --><?php //}; ?>
<!--                    </div>-->
<!---->
<!--                    <div style="    margin-bottom: 40px !important;">-->
<!--                        <label>Confirm Password</label>-->
<!--                        <input type="password" name="cpassword" class="form-control profile_input" id="cpassword">-->
<!--                        --><?php //if (getError('cpassword')){ ?>
<!--                            <small class="fw-bold text-danger" style="margin-left: 10px;">--><?php //echo getError('cpassword'); ?><!--</small>-->
<!--                        --><?php //}; ?>
<!--                    </div>-->
<!--                    <div class="mb-0 mt-5">-->
<!--                        <button class="btn btn-primary text-uppercase" name="change"><i class='fa fa-save me-2'></i>Change</button>-->
<!--                    </div>-->
<!--                </form>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>

<?php require_once "template/footer.php"; ?>
