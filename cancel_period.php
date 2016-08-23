<?php
session_start();
if (isset($_SESSION['id'])) {

	$uid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	$date=$_SESSION['date'];
	include_once("dbconnect.php");

	$periodid=$_POST["period"];
	$hall=$_POST["hall"];

	$sql="select $periodid from log where date='$date' and hall='$hall'";
	$query = mysqli_query($dbCon, $sql);
	$row= mysqli_fetch_row($query);
	$present = $row[0];

	if($present==$usname){
		$per="AVAILABLE";
		$sql1 = "update log set $periodid='$per' where date='$date' and hall='$hall'";
		$query1 = mysqli_query($dbCon, $sql1);
		header("Location: table.php");
	}

	else{
		header("Location: table.php");
	}


} else {
	header("Location: index.php");
}
?>
