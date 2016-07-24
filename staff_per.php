<?php
session_start();
 
if (!empty($_POST["username1"])  && !empty($_POST["password1"])) {
	include_once("dbconnect.php");
	$usname = strip_tags($_POST['username1']);
	$paswd = strip_tags($_POST['password1']);
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	$sql = "SELECT id, username, password FROM staff WHERE username = '$usname' AND password='$paswd'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dbUsname = $row[1];
	$dbPassword = $row[2];
	if ($usname == $dbUsname && $paswd == $dbPassword) {
		$_SESSION['username1'] = $usname;
		$_SESSION['id1'] = $uid;
		header("Location: register.php");
	} 
	else {
		echo "<h2>Oops that username or password combination was incorrect.
		<br /> Please try again.</h2>";
	}
	
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
<h3><center><br>TO REGISTER YOU NEED PERMISSION FROM ANY REGISTERED STAFF<BR><BR> </center></h3>
<form id="form" action="staff_per.php" method="POST" enctype="multipart/form-data" name="login_form">
<div id="found"></div><br />
<center><input id="textbox1" type="text" name="username1" placeholder="Username" onblur="user1(document.getElementById('textbox1').value)"/>
<center><br>
<center><input id ="textbox" type="password" name="password1" placeholder="Password"/></center> <br />
<center><input type="submit" value="PROCEED" name="Submit" /></center>

</form>

<script>
function staff_per() {
    window.location.assign("staff_per.php")
}

function user1(username){
if (window.XMLHttpRequest)
{
 xmlhttp=new XMLHttpRequest();
 }
else
 {
 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 if (username == null || username == "") 
    {
    document.getElementById("found").innerHTML=" ";
    }
    else{
        var url="usercheck.php";
url=url+"?id="+username;
xmlhttp.open("get",url,false);
xmlhttp.send(null);
if(xmlhttp.responseText=="found")
    document.getElementById("found").innerHTML=" ";
else
{
    document.getElementById("found").innerHTML="<h6>*This username is not registered</h6>";
}
    }
}




</script>
</body>
</html>

