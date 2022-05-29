<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $s_id = $_SESSION['id'];
    $sql = "SELECT repository_details.repo_id, repository_details.repo_name FROM repository_details WHERE repository_details.visibility = 'true'";
    $res = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
