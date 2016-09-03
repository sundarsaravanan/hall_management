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
$sql = "SELECT staffid FROM booking where lcd_type='$hall' and date='$date' ";
$query = mysqli_query($dbCon, $sql);
$jsonData = array();
while ($array = mysqli_fetch_row($query)) {
    $jsonData[] = $array;
}

echo json_encode($jsonData);
}
}
else {
      header("Location: index.php");
}
?>
