<?php
include "index_header.php";
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
        <style>
            .top-img {position: relative;}
            .top-text {position: absolute;top: 50%;left: 50%;width: 100;}
            @media screen and (max-width: 769px) {.top-text {transform: translate(-50%, -250%);}}
            @media screen and (max-width: 480px) {.top-text {transform: translate(-50%, -270%);}}
            @media screen and (min-width: 769px) {.top-text {transform: translate(-50%, -245%);}}
            input {border-top: none !important;
                border-left: none !important;
                border-right: none !important;
                border-radius: 0px !important;}
            input:focus {color: #5fcf80 !important;}
            .color {background-color: #5fcf80;}
        </style>
    </head>
    <body class="" style="background-image: url('./assets/img/background1.jpg'); background-repeat: no-repeat;  background-size: cover;">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <form class="shadow rounded" action="logic-php/check-login.php" method="post" style="width: 450px; background-color:white;">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-center">
                    <div class="shadow rounded">
                        <div>
                            <img src="https://colorlib.com/etc/lf/Login_v15/images/bg-01.jpg" alt="" class="top-img card-img overlay-dark">
                            <div class="top-text font-weight-bold text-light display-4 shadow-lg p-1 card-header">
                                Log In
                            </div>
                            <form>
                                <div class="form-group row m-5">
                                    <label for="username" class="col-sm-3 col-form-label font-weight-bold">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                                <div class="form-group row m-5">
                                    <label for="password" class="col-sm-3 font-weight-bold">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" name="submit" class="btn color font-weight-bold mb-4 text-light">
                                            Log In
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </body>

    </html>
<?php
    include "index_footer.php";
} else {
    header("Location: home.php");
} ?>