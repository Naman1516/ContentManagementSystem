<?php
include_once 'db_conn.php';
$name = $_GET["repo_video"];
$code = $_GET['repo_id'];
$sql = "DELETE FROM repository_video WHERE repo_video='" . $name . "'";
unlink('video/'. $name);
if (mysqli_query($conn, $sql)) {
    echo "File deleted successfully";
    header("Location: view_repository.php?repo_id=$code");
} else {
    echo "Error deleting file: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
