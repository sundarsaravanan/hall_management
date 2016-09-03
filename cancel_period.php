<?php
session_start();
if (isset($_SESSION['id'])) {

	$uid = $_SESSION['id'];
	$usname = $_SESSION['usname'];
	$date=$_SESSION['date'];
	include_once("dbconnect.php");

	$periodid=$_POST["period"];
	$hall=$_POST["hall"];

	$sql="select staffid from booking where date='$date' and lcd_type='$hall' and periodid='$periodid'";
	$query = mysqli_query($dbCon, $sql);
	$row= mysqli_fetch_row($query);
	$present = $row[0];
	if($present==$usname){
		$sql1 = "update booking set staffid='0', code='0',subname='0',year='0',section='0' where date='$date' and lcd_type='$hall' and periodid='$periodid'";
		$query1 = mysqli_query($dbCon, $sql1);
	header("Location: table.php");
	}

	else{
		header("Location: table1.php");
	}


} else {
	header("Location: index.php");
}
?>
