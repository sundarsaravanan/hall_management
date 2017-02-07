<?php
session_start();
if (isset($_SESSION['id'])) {
include_once("dbconnect.php");
$_SESSION['code'] = strip_tags($_POST['code']);
$_SESSION['year']=$_POST['year'];
$_SESSION['section']=$_POST['section'];
header("Location: table.php");
}
else {
      header("Location: index.php");
}
?>
