<?php
session_start();
$er=" ";
if (isset($_SESSION['id'])) {
	$uid = $_SESSION['id'];
	$usname = $_SESSION['usname'];
	header("Location: home.php");
}
elseif (isset($_POST['username'])) {
	include_once("dbconnect.php");
	$usname = strip_tags($_POST['username']);
	$paswd = strip_tags($_POST['password']);
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	$sql = "SELECT id, username, password,role,full_name FROM staff WHERE username = '$usname'";
	$query = mysqli_query($dbCon, $sql) or die("error");
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$p=md5(md5($paswd));
	$dbUsname = $row[1];
	$dbPassword = $row[2];
	$role=$row[3];
	if ($usname == $dbUsname && $p == $dbPassword) {
		$_SESSION['username'] = $usname;
		$_SESSION['id'] = $uid;
		$_SESSION['role']=$role;
		$_SESSION['usname']=$row[4];
		header("Location: home.php");
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
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="height:180px;padding-top:30px;background-color:#433498;"><center><img src="logo.png" height="140px"width="800px"/></center></div>
		<div class="row"><center><br><h3 style="letter-spacing:5px;font-family:serif;font-size:25px;">Department   of  Computer Science and Engineering<br><br>LCD Portal</h3></center></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" style="margin-top:30px;padding-bottom:20px;padding-top:10px;border: 1px solid black;border-radius: 20px;		box-shadow: 5px 5px 20px 4px #9C9C9C; background-color:#f5cc85">
				<form id="form" action="index.php" method="post" class="form-horizontal col-sm-8 col-sm-offset-2" enctype="multipart/form-data" name="login_form" role="form" >
					<div class="form-group">
					 	<div class="col-sm-12">
						 	<h3 style="letter-spacing:5px;font-family:serif;font-size:25px;"><center>Login</center></h3>
				   		</div>
					</div>
					<hr>
					<div class="form-group">
						<div class="col-sm-12">
							<center><input id="textbox1"  autocomplete="off" type="text"  class="form-control" placeholder="Staff id"name="username"  required></center>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<center><input id="textbox" type="password" class="form-control" placeholder="Password" name="password" required></center>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="submit" class="col-sm-4 col-sm-offset-1 btn btn-primary">
							<i class="fa fa-btn fa-sign-in"></i> Login
						</button>
						<button type="button" class="col-sm-4 col-sm-offset-1 btn btn-primary" onclick="staff_per();">
							<i class="fa fa-btn fa-sign-in"></i> Register
						</button>
					</div>
					<div class="alert">
		  				<strong><?php echo $er; ?></strong>
					</div>
				</form>
			</div>

		</div>
	</div>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
