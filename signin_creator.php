<?php
session_start();
include "db_conn.php";
include "index_footer.php";
$output = "";
if (isset($_POST['register'])) {
    $role = 'creator';
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];
    $email = $_POST['email'];
    $error = array();
    if (empty($role)) {
        $error['error'] = "Role is required";
    } else if (empty($name)) {
        $error['error'] = "Name is required";
    } else if (empty($uname)) {
        $error['error'] = "Username is required";
    } else if (empty($pass)) {
        $error['error'] = "Enter Password";
    } else if (empty($con_pass)) {
        $error['error'] = "Confirm Password";
    } else if ($pass != $con_pass) {
        $error['error'] = "Both password do not match";
    } else if (empty($email)) {
        $error['error'] = "Email is required";
    }

    if (isset($error['error'])) {
        $output .= $error['error'];
    } else {
        $output .= "";
    }
    if (count($error) < 1) {
        $pass = md5($pass);
        $query = "INSERT INTO users(name,role,username,password, email) VALUES('$name','$role','$uname','$pass', '$email')";
        $res = mysqli_query($conn, $query);
        if ($res) {
            $output .= "User added successfully";
            header("Location:index.php");
        } else {
            $output .= "Failed to add user";
        }
    }
    echo ("<script>alert('$output');</script>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Creator</title>
    <style>
        input {
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            border-radius: 0px !important;
        }

        input:focus {
            color: #5fcf80 !important;
        }

        .color {
            background-color: #5fcf80 !important;
        }
    </style>
</head>
<?php include "index_header.php" ?>

<body class="" style="background-image: url('./assets/img/background1.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <form class="shadow rounded" method="post" style="background-color: white;">
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <div class="d-flex justify-content-center">
                <div class="shadow rounded">
                    <div>
                        <div class="form-group row ml-5 mr-5 mt-5">
                            <label for="name" class="col-sm-3 col-md-4 col-lg-4 col-form-label font-weight-bold">Name</label>
                            <div class="col-sm-9 col-md-8 col-lg-8">
                                <input type="text" class="form-control" name="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row ml-5 mr-5 mt-3">
                            <label for="uname" class="col-sm-3 col-md-4 col-lg-4 col-form-label font-weight-bold">Username</label>
                            <div class="col-sm-9 col-md-8 col-lg-8">
                                <input type="text" class="form-control" name="uname">
                            </div>
                        </div>
                        <div class="form-group row ml-5 mr-5 mt-3">
                            <label for="email" class="col-sm-3 col-md-4 col-lg-4 col-form-label font-weight-bold">Email</label>
                            <div class="col-sm-9 col-md-8 col-lg-8">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group row ml-5 mr-5 mt-3">
                            <label for="pass" class="col-sm-3 col-md-4 col-lg-4 mt-2 font-weight-bold">Password</label>
                            <div class="col-sm-9 col-md-8 col-lg-8">
                                <input type="password" class="form-control" name="pass">
                            </div>
                        </div>
                        <div class="form-group row mt-3 ml-5 mr-5 mb-4">
                            <label for="con_pass" class="col-sm-3 col-md-4 col-lg-4 col-form-label font-weight-bold">Confirm
                                Password</label>
                            <div class="col-sm-9 col-md-8 col-lg-8 mt-2">
                                <input type="password" class="form-control" name="con_pass">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center mb-5">
                                <input type="submit" name="register" class="btn btn-success color font-weight-bold" value="Register">
                            </div>
                        </div>
                    </div>
                </div>
</body>

</html>