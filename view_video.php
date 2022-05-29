<?php
session_start();
include "db_conn.php";
include "other_header.php";
$video = $_GET['repo_video'];
?>

<div class="mt-5 pt-2">

</div>
<div class="head-color">
    <h2 class="text-center p-5 text-light font-weight-bolder text-capitalize"><?php echo $video ?></h2>
</div>
<div class="container text-center p-5">
    <video src="video/<?= $video ?>" width="600px;" controls></video>
</div>

<?php
include "index_footer.php";
?>

