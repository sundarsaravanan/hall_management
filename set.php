<?php
session_start();
if (isset($_SESSION['id'])) {
include_once("dbconnect.php");
$_SESSION['code']=$_GET['code'];
$_SESSION['subname']=$_GET['subname'];
$_SESSION['year']=$_GET['year'];
$_SESSION['section']=$_GET['section'];
$_SESSION['movable']=$_GET['movable'];

}
else {
      header("Location: index.php");
}
?>
