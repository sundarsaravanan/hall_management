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
    include_once("dbconnect.php");
  	$query = "INSERT INTO staff"."(id,full_name,username,password,reference)"."VALUES (NULL,'$fullname','$username2','$pass2','$usname')";
  	$result = mysqli_query($dbCon, $query)
  	or die('Error querying database.');
  	mysqli_close($dbCon);
  	session_destroy();
    header("Location: index.php");


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
    <div class="row" style="height:100px;"><button id="log_out"  class="btn btn-primary" onclick="window.location='logout.php'">
        <i class="fa fa-btn fa-sign-in"></i> Logout
    </button>
</div>
		<div class="container">


			<div class="row"><center><h1>LCD PORTAL</h1></center></div>
			<hr>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">Register</div>
		               		<div class="panel-body">
		                        <form  action="register.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="login_form" role="form" >
                              <div id="hid"></div><br />
									              <div class="form-group">
		                         	 	<label for="username" class="col-md-offset-1 col-md-4 control-label">Full Name</label>
		                         	 	<div class="col-md-6">
											                       <input id="textbox5" type="text" class="form-control" name="name1" onblur="user1(document.getElementById('textbox1').value)">
		                          		</div>
		                         	 </div>

                               <div class="form-group">
		                         	 	<label for="password" class="col-md-offset-1 col-md-4 control-label">Username</label>
		                         	 	<div class="col-md-6">
											                       <input id="textbox2" type="text" class="form-control" name="username2" onBlur="check(document.getElementById('textbox2').value)">
		                          		</div>
		                         	 </div>

                               <div class="form-group">
                               <label for="password" class="col-md-offset-1 col-md-4 control-label">Password</label>
                               <div class="col-md-6">
                                            <input id="textbox3" type="password" class="form-control" name="password2">
                                 </div>
                              </div>

                              <div class="form-group">
                               <label for="password" class=" col-md-offset-1 col-md-4 control-label">Confirm Password</label>
                               <div class="col-md-6">
                                            <input id="textbox4" type="password" class="form-control" name="password3">
                                 </div>
                              </div>


                               <div class="form-group">
                                 <div class="col-md-6 col-md-offset-5">

		                                	<button type="submit" class="btn btn-primary" onclick="success_reg();">
		                                    	<i class="fa fa-btn fa-sign-in"></i> Register
		                                	</button>
                                    </div>

		                        	</div>
								</form>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

	    <script src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/in_body.js"></script>
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
            if(x == y)
                document.getElementById("hid").innerHTML=" ";
               else
                       document.getElementById("hid").innerHTML="<h6>*Passwords do not match</h6>";
        }
        function log_out() {
        window.location.assign("logout.php")
    }
    function success_reg(){
      alert("Registered Successfully");


    }
    </script>
	</body>
</html>
