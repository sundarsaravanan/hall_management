<?php
  session_start();
  if (isset($_SESSION['id'])) {
      	include_once("dbconnect.php");
        $periodid=$_POST["period"];
        $day=$_POST["dayn"];
        $hall=$_SESSION["hall"];
        $sql = "update lab set $periodid=2 where day='$day' and hall='$hall'";
      	$query = mysqli_query($dbCon, $sql);
        echo $sql;
  }
  else {
        header("Location: index.php");
  }
?>
