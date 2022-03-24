<?php require_once "template/header.php"; ?>
    <title>Bone Marrow Reports / Register</title>
<?php require_once "template/sidebar.php"; ?>

<div class="row">
    <div class="col-12 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-user-plus text-primary"></i> Create User
                    </h4>
                    <a href="<?php echo $url; ?>/users" class="btn btn-outline-primary">
                        <i class="fa fa-users"></i>
                    </a>
                </div>
                <hr>

                <?php

                if (isset($_POST['reg-btn'])){
                    register();
                }

                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control profile_input" id="name" placeholder="aa" value="<?php echo old('name') ?>">
                            <label for="name">Name</label>
                        </div>
                        <?php if (getError('name')){ ?>
                            <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('name'); ?></small>
                        <?php }; ?>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control profile_input" id="email" placeholder="name@example.com" value="<?php echo old('email') ?>">
                            <label for="email">Email address</label>
                        </div>
                        <?php if (getError('email')){ ?>
                            <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('email'); ?></small>
                        <?php }; ?>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control profile_input" id="password" placeholder="admin" value="<?php echo old('password') ?>">
                            <label for="password">Password</label>
                        </div>
                        <?php if (getError('password')){ ?>
                            <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('password'); ?></small>
                        <?php }; ?>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Photo</label>
                        <input class="form-control" name="sg_photo" type="file" id="formFile" value="<?php echo old('sg_photo') ?>">
                        <?php if (getError("sg_photo")){ ?>
                            <small class="text-danger"><?php echo getError("sg_photo") ?></small>
                        <?php } ?>
                    </div>
                    <hr>
                    <div class="mb-0 mt-3">
                        <button class="btn btn-primary text-uppercase" name="reg-btn"><i class='fa fa-registered me-2'></i>Register</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php require_once "template/footer.php"; ?>
