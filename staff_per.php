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
	

}
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Kcet-Login</title>
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link rel="stylesheet" type="text/css" href="for_index.css">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

		<script type="text/javascript" src="in_head.js"></script>
	</head>
	<body>
		<div class="container">

			<div class="row" style="height:100px;"></div>
			<div class="row"><center><h1>LCD PORTAL</h1></center></div>
			<hr>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">Authentication</div>
		               		<div class="panel-body">
		                        <form id="form" action="staff_per.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="login_form" role="form" >
                              <div id="found"></div><br />
									              <div class="form-group">
		                         	 	<label for="username" class="col-md-4 control-label">Username</label>
		                         	 	<div class="col-md-6">
											<input id="textbox1" type="text" class="form-control" name="username1" onblur="user1(document.getElementById('textbox1').value)">
		                          		</div>
		                         	 </div>
		                         	 <div class="form-group">
		                         	 	<label for="password" class="col-md-4 control-label">Password</label>
		                         	 	<div class="col-md-6">
											<input id="textbox" type="password" class="form-control" name="password1">
		                          		</div>
		                         	 </div>

		                         	 <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">

		                                	<button type="submit" class="btn btn-primary">
		                                    	<i class="fa fa-btn fa-sign-in"></i> Proceed
		                                	</button>
                                    </div>

		                        	</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

	    <script src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/in_body.js"></script>
    <script>
  /*  function staff_per() {
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

*/


    </script>
	</body>
</html>
