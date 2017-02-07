<?php
session_start();
if (isset($_SESSION['id'])  && $_SESSION['role']=="ap") {
include_once("dbconnect.php");
$fn=$_GET['name'];
$sql = "SELECT sno,date,periodid,venue,code,year,section FROM booking where remarks='Not Updated' and staffid='$fn' ";
$query = mysqli_query($dbCon, $sql);
$jsonData = array();
while ($array = mysqli_fetch_row($query)) {
    $jsonData[] = $array;
}
echo json_encode($jsonData);
}
else {
      header("Location: index.php");
}
?>
