<?php
session_start();
if (empty($_SESSION['id1']) && empty($_SESSION['username2']) && empty($_SESSION['pass2']) ) {
    			header("Location: staff_per.php");
}
else{

	 $uid=$_SESSION['id1'];
	$uspass = $_SESSION['pass2'];
    $usname = $_SESSION['username2'];
    $reference=$_SESSION['username1'];
        $fullname=$_SESSION['fullname'];
	include_once("dbconnect.php");
	$query = "INSERT INTO staff"."(id,full_name,username,password,reference)"."VALUES (NULL,'$fullname','$usname','$uspass','$reference')";
	$result = mysqli_query($dbCon, $query)
	or die('Error querying database.');
	mysqli_close($dbCon);
	session_destroy();
  header("Location: index.php");

}

?>
