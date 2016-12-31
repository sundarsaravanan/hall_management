<?php
  session_start();
  if (isset($_SESSION['id'])) {
      	include_once("dbconnect.php");
        $pass=$_POST["pass"];
        $p=md5(md5($pass));
        $sql = "update staff set password='$p' where id=$_SESSION[id]";
      	$query = mysqli_query($dbCon, $sql) or die(error);
        echo $sql;
  }
  else {
        header("Location: index.php");
  }
?>
