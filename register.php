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
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="for_index.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	<script type="text/javascript" src="in_head.js"></script>
</head>
<body>
	<div class="container-fluid">

		<div class="row" style="height:180px;padding-top:30px;background-color:#433498;">


      <div class="col-lg-8 col-lg-offset-2"><center><img src="logo.png" height="140px"width="800px"/></center></div>
      <div class="col-lg-2" style="margin-top:40px;"><button type="button" class="btn btn-info " style="float:left;font-size:18px;" onclick="window.location='logout.php'">Logout
      </button></div>
</div>

		<div class="row"><center><br><h3 style="letter-spacing:5px;font-family:serif;font-size:25px;">Department   of  Computer Science and Engineering<br><br>LCD Portal</h3></center></div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4" style="margin-top:30px;padding-bottom:20px;padding-top:10px;padding-left:60px;padding-right:60px;border: 1px solid black;border-radius: 20px;		box-shadow: 5px 5px 20px 4px #9C9C9C; background-color:#f5cc85">

		                        <form  action="register.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="login_form" role="form" >
                              <div class="form-group">
                               <div class="col-lg-12">
                              <h3 style="letter-spacing:5px;font-family:serif;font-size:25px;"><center>Registration</center></h3>                                       </div>

                              </div>
<hr>
                                <div class="form-group">
		                         	 	<div class="col-lg-12">
											                    <center>   <input id="textbox5" type="text" placeholder="Full Name" class="form-control" name="name1" onblur="user1(document.getElementById('textbox1').value)"></center>
		                          		</div>
		                         	 </div>

                               <div class="form-group">
		                         	 	<div class="col-lg-12">
											                      <center>  <input id="textbox2" type="text" placeholder="Username" class="form-control" name="username2" onBlur="check(document.getElementById('textbox2').value)"></center>
		                          		</div>
		                         	 </div>

                               <div class="form-group">
                               <div class="col-lg-12">
                                          <center>   <input id="textbox3" type="password" placeholder="Password" class="form-control" name="password2"></center>
                                 </div>
                              </div>

                              <div class="form-group">
                               <div class="col-lg-12">
                                          <center>   <input id="textbox4" type="password" class="form-control" placeholder="Confirm Password" name="password3"></center>
                                 </div>
                              </div>

<hr>
                               <div class="form-group">
                                 <div class="col-lg-4 col-lg-offset-4">

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
