<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  </head>

  <body>
    <?php
    include "logic-php/set_role.php";
    include 'my_repositories.php';
    include "index_footer.php";
    ?>
  </body>

  </html>

<?php } else {
  header("Location: index.php");
} ?>

