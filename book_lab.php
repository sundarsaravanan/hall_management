<?php
  session_start();
  if (isset($_SESSION['id'])) {
      	include_once("dbconnect.php");
        $periodid=$_POST["period"];
        $day=$_POST["row_name"];
        $hall=$_SESSION["hall"];
        $sql = "update lab set $periodid=1 where day='$day' and hall='$hall'";
      	$query = mysqli_query($dbCon, $sql);
  }
  else {
        header("Location: index.php");
  }
?>
