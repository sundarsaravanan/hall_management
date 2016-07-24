<?php
session_start();
if (isset($_SESSION['id'])) {

    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
	$date=$_SESSION['date'];
	include_once("dbconnect.php");
	
	$result = "SELECT date FROM class";
	$result = mysqli_query($dbCon,$result);
	$storeArray = Array();
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] =  $row['date'];  
	}
	$j=count($storeArray);
	for($i=0;$i<=$j;$i++)
	{
	if($storeArray[$i]==$date){
	$flag=0;
	break;
	}
	else{
		$flag=1;
	}	
	}
	
	if($flag==0){
	    	header("Location: table.php");
	}
	else{
	$sql1="insert into class values(null,'$date','available','available','available','available','available','available','available')";
	$sql2="insert into oldcse values(null,'$date','available','available','available','available','available','available','available')";
	$sql3="insert into newcse values(null,'$date','available','available','available','available','available','available','available')";
	$query = mysqli_query($dbCon, $sql1);
	$query = mysqli_query($dbCon, $sql2);
	$query = mysqli_query($dbCon, $sql3);
	header("Location: table.php");
	}	
	
	
	
	

	
	}
	else {
    header("Location: index.php");
}
?>