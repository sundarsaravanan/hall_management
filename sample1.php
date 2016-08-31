<?php
session_start();
if (isset($_SESSION['id'])) {
include_once("dbconnect.php");
$day=$_GET['q'];
$hall=$_SESSION['hall'];
if(empty($hall)){
echo "-1";
}
else{
$sql = "SELECT * FROM lab WHERE day='$day' and hall='$hall'";
$query = mysqli_query($dbCon, $sql);
$row = mysqli_fetch_row($query);
echo json_encode($row);
}
}
else {
      header("Location: index.php");
}
?>
