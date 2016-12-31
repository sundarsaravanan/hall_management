<?php
session_start();
if (isset($_SESSION['id'])) {
include_once("dbconnect.php");
$_SESSION['code']=$_GET['code'];
$_SESSION['year']=$_GET['year'];
$_SESSION['section']=$_GET['section'];

}
else {
      header("Location: index.php");
}
?>
