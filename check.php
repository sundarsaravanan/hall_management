<?php
session_start();
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
  	$date=$_SESSION['date'];
  	include_once("dbconnect.php");
  	$result = "SELECT date FROM log";
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
    date_default_timezone_set('Asia/Calcutta');
        $timestamp = strtotime($date);
    $day_ref=array("sunday","monday","tuesday","wednesday","thursday","friday","saturday");
$day = date('w', $timestamp);
 if($flag==0){
  	    	header("Location: table1.php");
  	}
  	else{
      $hall=array("d1hall","oldcse","newcse","movable");
      for ($i=0;$i<4;$i++){

        $sql="select * from lab where day='$day_ref[$day]' and hall='$hall[$i]'";
      	$query = mysqli_query($dbCon, $sql);
      	$row= mysqli_fetch_row($query);
$sql="insert into log values ('$date','$hall[$i]',$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10])";
  	       $query = mysqli_query($dbCon, $sql);
        }
  	header("Location: table1.php");
  }
	}
	else {
    header("Location: index.php");
}
?>
