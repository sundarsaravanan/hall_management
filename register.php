<?php
session_start();
if (isset($_SESSION['id1'])) {
    $uid = $_SESSION['id1'];
    $usname = $_SESSION['username1'];
}
else{
	 header("Location: staff_per.php"); 
}
if (!empty($_POST["username2"])  && !empty($_POST["password2"]) && !empty($_POST["password3"])) {
    $username2 = strip_tags($_POST['username2']);
	$pass2 = strip_tags($_POST['password2']);
	$pass3 = strip_tags($_POST['password3']);	
    $fullname=strip_tags($_POST['name1']);
	
	if ($pass2==$pass3) {
		$_SESSION['username2'] = $username2;
		$_SESSION['pass2'] = $pass2;
        $_SESSION['fullname']=$fullname;	
		header("Location: confirmation.php");
	} else {
		echo "<h2>The Password do not match</h2>
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

<input type="button" onclick="log_out()" value="LOGOUT" id="log_out"/><BR><BR>
</form>
<h3><center><bR> REGISTRATION FORM <BR><BR><center> </h3>
<form id="form" action="register.php" method="post" enctype="multipart/form-data">
<center><div id="hid"></div>
<center><input id="textbox5" type="text" name="name1" placeholder="Full Name" /> <br />
<input id="textbox2" type="text" name="username2" placeholder="Username" onBlur="check(document.getElementById('textbox2').value)"/> <br />
<input id="textbox3" type="password" name="password2" placeholder="New Password"/> <br />
<input id="textbox4" type="password" name="password3" placeholder="Confirm Password" onBlur="passcmp()"/> <br /><br>
<input type="submit" value="REGISTER" name="Submit" /></center>



</form>
<script>
    function check(username){


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
            document.getElementById("hid").innerHTML="<h6>*Enter the username</h6>";
            }
            else{
                var url="usercheck.php";
        url=url+"?id="+username;
        xmlhttp.open("get",url,false);
        xmlhttp.send(null);
        if(xmlhttp.responseText=="found")
            document.getElementById("hid").innerHTML="<h6>*This username is already used</h6>";
        else
        {
            document.getElementById("hid").innerHTML=" ";
        }
            }

        
    }
    function passcmp(){
        var x=document.getElementById("textbox3");
        var y=document.getElementById("textbox4");
        if(x==y)
            document.getElementById("hid").innerHTML=" ";
           else 
                   document.getElementById("hid").innerHTML="<h6>*Passwords do not match</h6>";
    }
    function log_out() {
    window.location.assign("logout.php")
}
</script>
</body>
</html>