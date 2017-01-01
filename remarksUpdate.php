<?php
  session_start();
  if (isset($_SESSION['id'])) {
      	include_once("dbconnect.php");
        $remarks=$_GET['remarks'];
        $id=$_GET['id'];
        $sql = "update booking set remarks='$remarks' where sno='$id'";
      	$query = mysqli_query($dbCon, $sql) or die(error);
        echo $sql;
  }
  else {
        header("Location: index.php");
  }
?>
