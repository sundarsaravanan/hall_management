<?php
session_start();
if (isset($_SESSION['id'])) {

    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
	$date=$_SESSION['date'];
    header("Location: date.php");
	
	}
	else {
    header("Location: index.php");
}
?>