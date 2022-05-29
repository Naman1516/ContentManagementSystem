<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "capstone_presentable";
$conn = mysqli_connect($sname, $uname, $password, $db_name);
if (!$conn) {
	echo "Connection Failed!";
	exit();
}
