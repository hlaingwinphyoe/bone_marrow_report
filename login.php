<?php

require_once "core/base.php";
require_once "core/functions.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="Daily General Workers Tasks">
    <meta name="description" content="Daily Task for General Workers">

    <link rel="icon" href="<?php echo $url; ?>/assets/img/logo.png">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="manifest" href="<?php echo $url; ?>/manifest.json">
</head>
<body style="background: var(--bs-light)">

<script>
    if("serviceWorker in navigator"){
        navigator.serviceWorker.register("sw.js").then(registration =>{
            console.log("SW Registered!");
            console.log(registration);
        }).catch(error => {
            console.log("SW Registration Failed!");
            console.log(error);
        })
    }
</script>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12">
            <div class="card shadow p-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7 d-none d-lg-block">
                            <img src="<?php echo $url; ?>/assets/img/login.svg" style="width: 75%" alt="">
                        </div>
                        <div class="col-12 col-lg-5">
                            <h4 class="text-center text-primary">
                                <i class="fa fa-user"></i>
                                Log In
                            </h4>
                            <?php

                            if(isset($_POST['login-btn'])){
                                login();
                            }
                            ?>
                            <form method="post">
                                <div class="mb-3">
                                    <label><i class="text-primary fa fa-envelope me-2"></i>Email</label>
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="<?php echo old('email') ?>">
                                        <label for="email">Email address</label>
                                    </div>
                                    <?php if (getError('email')){ ?>
                                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('email'); ?></small>
                                    <?php }; ?>
                                </div>
                                <div class="mb-3">
                                    <label><i class="text-primary fa fa-lock me-2"></i>Password</label>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="admin" value="<?php echo old('password') ?>">
                                        <label for="password">Password</label>
                                    </div>
                                    <?php if (getError('password')){ ?>
                                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('password'); ?></small>
                                    <?php }; ?>
                                </div>

                                <div class="form-group mb-0 mt-3">
                                    <button class="btn btn-primary text-uppercase" name="login-btn"><i class='bx bx-log-in me-2'></i>LogIn</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php clearError(); ?>

<script src="<?php echo $url; ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
