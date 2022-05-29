<?php
include_once 'db_conn.php';
echo $_GET["repo_id"];
$sql = "DELETE FROM repository_details WHERE repo_id='" . $_GET["repo_id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: my_repositories.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>