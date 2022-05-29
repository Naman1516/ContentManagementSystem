<?php
session_start();
include "db_conn.php";
include "other_header.php";
$file = $_GET['repo_doc'];
?>

<div class="mt-5 pt-2">

</div>
<div class="head-color">
    <h2 class="text-center p-5 text-light font-weight-bolder text-capitalize"><?php echo $file ?></h2>
</div>
<div class="container text-center p-5">
    <embed type="application/pdf" src="pdf/<?php echo $file ?>" width="600" height="400">
</div>

<?php
include "index_footer.php";
?>


