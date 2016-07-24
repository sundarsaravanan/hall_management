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
}	

?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LOGIN</title>
<link href="custom.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Orbitron:900' rel='stylesheet' type='text/css'>
</head>
 
<body>
<div id="wrapper">
        <img src="logo.png"  width="100%"/>
<h3><center><br>SUCCESSFULLY REGISTERED!!!<BR><BR></center> </h3>
<form id="form" action="index.php" method="post" enctype="multipart/form-data">

<input type="submit" value="Home" name="Submit" />
</form>
</body>
</html>