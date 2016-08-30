<?php
  session_start();
  if (isset($_SESSION['id'])) {
        $usname = $_SESSION['username'];
      	$date=$_SESSION['date'];
      	include_once("dbconnect.php");
        $periodid=$_POST["period"];
        $hall=$_POST["hall"];
        $sql = "update log set $periodid='$usname' where date='$date' and hall='$hall'";
      	$query = mysqli_query($dbCon, $sql);
  }
  else {
        header("Location: index.php");
  }
?>
