<?php
$er=" ";
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
      if($_SESSION['role']=="admin"){
              $role=strip_tags($_POST['staffRole']);
      }
      else{
              $role="ap";
      }
if ($pass2==$pass3) {
        $p=md5(md5($pass2));
    include_once("dbconnect.php");
  	$query = "INSERT INTO staff"."(id,full_name,username,password,reference,role)"."VALUES (NULL,'$fullname','$username2','$p','$usname','$role')";
  	$result = mysqli_query($dbCon, $query)
  	or die('Error querying database.');
  	mysqli_close($dbCon);
  	session_destroy();
    header("Location: index.php");
	}
        else{
		$er="*Enter valid credentials";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/for_index.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="height:180px;padding-top:30px;background-color:#433498;">
                        <div class="col-sm-8 col-sm-offset-2"><center><img src="logo.png" height="140px"width="800px"/></center></div>
                                <div class="col-sm-2" style="margin-top:40px;">
                                        <button type="button" class="btn btn-info " style="float:left;font-size:18px;" onclick="window.location='logout.php'">Logout
                                        </button>
                                </div>
                </div>
		<div class="row">
                        <center><br>
                                <h3 style="letter-spacing:5px;font-family:serif;font-size:25px;">Department   of  Computer Science and Engineering<br><br>LCD Portal</h3>
                        </center></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" style="margin-top:30px;padding-bottom:20px;padding-top:10px;padding-left:60px;padding-right:60px;border: 1px solid black;border-radius: 20px;		box-shadow: 5px 5px 20px 4px #9C9C9C; background-color:#f5cc85">
		                <form  action="register.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="login_form" role="form" >
                                        <div class="form-group">
                                                <div class="col-sm-12">
                                                        <h3 style="letter-spacing:5px;font-family:serif;font-size:25px;"><center>Registration</center></h3>
                                                </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
		                         	<div class="col-sm-12">
							<center>
                                                                <input id="textbox5" type="text" placeholder="Name" class="form-control" name="name1" required>
                                                        </center>
		                          	</div>
		                         </div>
                                         <div class="form-group">
		                                <div class="col-sm-12">
							<center>
                                                                <input id="textbox2" type="text" placeholder="Staff id" class="form-control" name="username2" required>
                                                        </center>
		                          	</div>
		                         </div>
                                         <div class="form-group">
                                                 <div class="col-sm-12">
                                                         <center>
                                                                 <input id="textbox3" type="password" placeholder="Password" class="form-control" name="password2" required>
                                                         </center>
                                                 </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="col-sm-12">
                                                        <center>
                                                                <input id="textbox4" type="password" class="form-control" placeholder="Confirm Password" name="password3" required>
                                                        </center>
                                                </div>
                                        </div>
                                        <?php
                                        if($_SESSION['role']=="admin"){
                                        echo '<div class="form-group">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                        <center><select  class="form-control" name="staffRole" >
                                            <option value="ap">AP</option>
                                            <option value="admin">Admin</option>
                                            <option value="technician">Technician</option>
                          					      </select>
                                                                      </center>
                                                              </div>
                                                      </div>';
                                              }
                                        ?>
                                        <hr>
                                        <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-4">
                                                        <button type="submit" class="btn btn-primary">
		                                                              <i class="fa fa-btn fa-sign-in"></i> Register
		                                        </button>
                                                </div>
		                        </div>
                                        <div class="alert">
		  				<strong><?php echo $er; ?></strong>
					</div>
			        </form>
			</div>
		</div>
	</div>
	<script src="js/bootstrap.min.js"></script>
        <script>
        function log_out() {
        window.location.assign("logout.php")
    }
    </script>
	</body>
</html>
