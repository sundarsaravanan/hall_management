<?php
session_start();

if (!empty($_POST["username1"])  && !empty($_POST["password1"])) {
	include_once("dbconnect.php");
	$usname = strip_tags($_POST['username1']);
	$paswd = strip_tags($_POST['password1']);
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	$sql = "SELECT id, username, password FROM staff WHERE username = '$usname'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$p=md5(md5($paswd));
	$dbUsname = $row[1];
	$dbPassword = $row[2];
	if ($usname == $dbUsname && $p == $dbPassword) {
		$_SESSION['username1'] = $usname;
		$_SESSION['id1'] = $uid;
		header("Location: register.php");
	}


}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="for_index.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	<script type="text/javascript" src="in_head.js"></script>
</head>
<body>
	<div class="container-fluid">

		<div class="row" style="height:180px;padding-top:30px;background-color:#433498;"><center><img src="logo.png" height="140px"width="800px"/></center></div>


		<div class="row"><center><br><h3 style="letter-spacing:5px;font-family:serif;font-size:25px;">Department   of  Computer Science and Engineering<br><br>LCD Portal</h3></center></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" style="margin-top:30px;padding-bottom:20px;padding-top:10px;padding-left:60px;padding-right:60px;border: 1px solid black;border-radius: 20px;		box-shadow: 5px 5px 20px 4px #9C9C9C; background-color:#f5cc85">

		                        <form id="form" action="staff_per.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="login_form" role="form" >
															<div class="form-group">
															 <div class="col-sm-12">
															<h3 style="letter-spacing:5px;font-family:serif;font-size:25px;"><center>Authentication</center></h3>                                       </div>

															</div>
															<hr>
															  <div class="form-group">
		                         	 	<div class="col-sm-12">
										<center>	<input id="textbox1" type="text" class="form-control" placeholder="Name" name="username1" onblur="user1(document.getElementById('textbox1').value)"></center>
		                          		</div>
		                         	 </div>
		                         	 <div class="form-group">
		                         	 	<div class="col-sm-12">
											<center><input id="textbox" type="password" class="form-control" placeholder="Password" name="password1"></center>
		                          		</div>
		                         	 </div>
<hr>
		                         	 <div class="form-group">
                                 <div class="col-sm-4 col-sm-offset-4">

		                                <center>	<button type="submit" class="btn btn-primary">
		                                    	<i class="fa fa-btn fa-sign-in"></i> Proceed
		                                	</button></center>
                                    </div>

		                        	</div>
								</form>
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
