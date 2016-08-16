<?php
session_start();
if (empty($_SESSION['id1']) && empty($_SESSION['username2']) && empty($_SESSION['pass2']) ) {
    			header("Location: staff_per.php");
}
else{

	 $uid=$_SESSION['id1'];
	$uspass = $_SESSION['pass2'];
    $usname = $_SESSION['username2'];
	include_once("dbconnect.php");
	$query = "INSERT INTO staff"."(id,name,password)"."VALUES (NULL,'$usname','$uspass')";
	$result = mysqli_query($dbCon, $query)
	or die('Error querying database.');
	mysqli_close($dbCon);
	session_destroy();
  header("Location: index.php");

}

?>
