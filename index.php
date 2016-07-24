<?php
session_start();
if (isset($_SESSION['id'])) {

    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
    header("Location: date.php"); 
}
	elseif (isset($_POST['username'])) {
        

	include_once("dbconnect.php");
	

        $usname = strip_tags($_POST['username']);
	$paswd = strip_tags($_POST['password']);
	
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	

	
	$sql = "SELECT id, username, password FROM staff WHERE username = '$usname' AND password='$paswd'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dbUsname = $row[1];
	$dbPassword = $row[2];
	

	if ($usname == $dbUsname && $paswd == $dbPassword) {

		$_SESSION['username'] = $usname;
		$_SESSION['id'] = $uid;

		header("Location: user.php");
	} else {
		$asgh= "<h2>Oops that username or password combination was incorrect.
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
</head>
 
<body id="full">
<div id="wrapper">
    <img src="logo.png"  width="100%"/>
<h2><center><br>MINI PROJECT<bR><br>TITLE : LCD PROJECTOR MANAGEMENT SYSTEM<BR><br>LOGIN<BR><center></h2>
<form id="form" action="index.php" method="POST" enctype="multipart/form-data" name="login_form">
<div id="found"></div><br />
<center><input id="textbox1" type="text" name="username" placeholder="Username" onblur="user1(document.getElementById('textbox1').value)"/>
<center><br>
<center><input id ="textbox" type="password" name="password" placeholder="Password"/></center> <br />
<center><input type="submit" value="Login" name="Submit" />
<input type="button" value="Register" onclick="staff_per()" /></center>
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

function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;height:200px;width:800px;");
 el.innerHTML = msg;

 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);

 document.body.appendChild(el);

}


</script>
</body>
</html>



