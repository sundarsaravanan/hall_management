<?php
session_start();
if (isset($_SESSION['id'])) {
include_once("dbconnect.php");
$hall=$_GET['q'];
$date=$_SESSION['date'];
if(empty($date)){
echo "-1";
}
else{
$sql = "SELECT * FROM log WHERE date='$date' and hall='$hall'";
$query = mysqli_query($dbCon, $sql);
$row = mysqli_fetch_row($query);
echo json_encode($row);
}
}
else {
      header("Location: index.php");
}
?>
