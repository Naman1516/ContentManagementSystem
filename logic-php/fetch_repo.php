<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $s_id = $_SESSION['id'];
    $sql = "SELECT repository_details.repo_id, repository_details.repo_name FROM repository_details INNER JOIN users ON repository_details.u_id = users.id AND users.role ='creator' AND $s_id = users.id";
    $res = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
