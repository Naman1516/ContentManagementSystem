<?php
session_start();
include "db_conn.php";
include "index_footer.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    if (isset($_POST['create-repo'])) {
        $repo_id = rand(0, 10000);
        $repo_name = $_POST['name'];
        $u_id = $_SESSION['id'];
        $visible = $_POST['visibility'];
        $error = array();
        if (empty($repo_name)) {
            $error['error'] = "Repository Name is required";
        }
        if (isset($error['error'])) {
            $output .= $error['error'];
        } else {
            $output .= "";
        }
        if (count($error) < 1) {
            $query = "INSERT INTO repository_details(repo_id, repo_name, u_id, visibility) VALUES('$repo_id', '$repo_name', '$u_id', '$visible');";
            $res = mysqli_query($conn, $query);
            if ($res) {
                $output .= "Repository has been created!";
                header("Location:my_repositories.php");
            } else {
                $output .= "Failed to create a repository";
            }
        }
    }
?>
    <!DOCTYPE html>

    <head>
        <title>Create Repository</title>
        <style>
        input {border-top: none !important;border-left: none !important;border-right: none !important;border-radius: 0px !important;}
        input:focus {color: #5fcf80 !important;}
        .color {background-color: #5fcf80 !important;}
    </style>
    </head>

    <body style="background-image: url('./assets/img/background1.jpg'); background-repeat: no-repeat;  background-size: cover;">
        <?php
        include "other_header.php";
        include "logic-php/set_role.php";

        if ($_SESSION['role'] == 'creator') { ?>
            <!-- For Creator -->
            <p class="card-title font-weight-bold text-center"></p>
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 95vh;">
                <form class="shadow rounded p-3" method="post" style="width: 400px; background-color: white;">
                    <h3 class="text-center">Create Repository</h3>
                    <hr />
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Repository Name</label>
                        <input type="text" id="name" name="name" class="form-control my-2" placeholder="Enter repository name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="visibility" class="font-weight-bold">Visibility</label>
                        <select name="visibility" id="visibility">
                            <option value="true">Public</option>
                            <option value="false">Private</option>
                        </select>
                    </div>
                    <hr />
                    <input type="submit" name="create-repo" class="btn btn-success mt-1" value="Create Repository">
                </form>
            </div>
        <?php } ?>
    </body>

    </html>

<?php } else {
    header("Location: index.php");
} ?>