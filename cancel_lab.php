<?php
session_start();
if (isset($_SESSION['id'])) {
	include_once("dbconnect.php");
	$periodid=$_POST["period"];
	$day=$_POST["dayn"];
	$hall=$_SESSION["hall"];
	$sql1 = "update lab set $periodid=0 where day='$day' and hall='$hall'";
	echo $sql1;
	$query1 = mysqli_query($dbCon, $sql1);
}
else {
	header("Location: index.php");
}
?>
