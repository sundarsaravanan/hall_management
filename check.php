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
  	if($flag==0){
  	    	header("Location: table.php");
  	}
  	else{
      $hall=array("d1hall","oldcse","newcse","movable");
      for ($i=0;$i<4;$i++){
  	       $sql="insert into log (date,hall) values ('$date','$hall[$i]')";
  	       $query = mysqli_query($dbCon, $sql);
        }
  	header("Location: table.php");
	 }
	}
	else {
    header("Location: index.php");
}
?>
