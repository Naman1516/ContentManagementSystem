<?php
session_start();
ob_start();
include "db_conn.php";
include "other_header.php";
include "index_footer.php";
if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == 'creator') { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Insert Pdf</title>
  </head>

  <body class="" style="background-image: url('./assets/img/background1.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <form class="border shadow p-3 rounded" method="post" enctype="multipart/form-data" style="background-color: white;">
        <h3 class="text-center">Insert Pdf</h3>
        <hr />
        <div class="form-group font-weight-bold">
          <label for="file">Select video</label>
          <input type="file" name="file" id="file" class="form-control my-2"  required autofocus>
        </div>
        <hr />
        <input type="submit" name="submit" value="Upload" class="btn btn-primary">
        <?php
        if (isset($_POST['submit'])) {
          $code = $_GET['repo_id'];
          $filename = $_FILES["file"]["name"];
          $tempname = $_FILES["file"]["tmp_name"];
          $folder = $filename;
          move_uploaded_file($tempname, "./pdf/" . $folder);

          $sql = "INSERT INTO repository_content(repo_id, repo_doc) VALUES('$code', '$folder')";
          $query = mysqli_query($conn, $sql);
          header("Location: view_repository.php?repo_id=$code");
        }
        ?>
      </form>
    </div>
  </body>

  </html>
<?php } else {
  header("Location: index.php");
}
?>

