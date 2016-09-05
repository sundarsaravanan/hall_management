<?php
  session_start();
  if (isset($_SESSION['id'])) {
      	include_once("dbconnect.php");
        $pass=$_POST["pass"];
        $sql = "update staff set password='$pass' where id=$_SESSION[id]";
      	$query = mysqli_query($dbCon, $sql) or die(error);
        echo $sql;
  }
  else {
        header("Location: index.php");
  }
?>
