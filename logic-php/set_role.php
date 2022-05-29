<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $s_id = $_SESSION['id'];
    $sql = "SELECT role FROM users where users.id = $s_id";
    $res = mysqli_query($conn, $sql);
    $_SESSION['role'] = $res->fetch_assoc()['role'];
} else {
    header("Location: index.php");
}
