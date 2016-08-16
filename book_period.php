<?php
session_start();
if (isset($_SESSION['id'])) {

  $uid = $_SESSION['id'];
  $usname = $_SESSION['username'];
	$date=$_SESSION['date'];
	include_once("dbconnect.php");
    //class 1 to 7
    //oldcse 8 to 14
    //newcse 15 to 21

   $i=$_POST['cell'];
   if($i<8){
         $table='class';
    }elseif($i>=8 & $i<15){
        $i=$i-7;
         $table='oldcse';
    }else{
        $i=$i-14;
         $table='newcse';
    }

    $sql = "update ".$table." set per".$i."='$usname' where date='$date'";
	$query = mysqli_query($dbCon, $sql);
	    header("Location: table.php");


   } else {
  header("Location: index.php");
}
?>
