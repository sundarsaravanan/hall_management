<?php
session_start();
if (isset($_SESSION['id'])) {

	$uid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	header("Location: table.php");
}
elseif (isset($_POST['username'])) {


	include_once("dbconnect.php");


	$usname = strip_tags($_POST['username']);
	$paswd = strip_tags($_POST['password']);

	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);

	$notmatch="<h4>*Username and Password do not match</h4>";

	$sql = "SELECT id, username, password,role FROM staff WHERE username = '$usname' AND password='$paswd'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dbUsname = $row[1];
	$dbPassword = $row[2];
	$role=$row[3];


	if ($usname == $dbUsname && $paswd == $dbPassword) {

		$_SESSION['username'] = $usname;
		$_SESSION['id'] = $uid;
		$_SESSION['role']=$role;

		header("Location: table1.php");
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
		<div class="row"><center><h3>CSE DEPARTMENT</h3><br><h3>LCD PORTAL</h3></center></div>
		<hr>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						<form id="form" action="index.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="login_form" role="form" >
							<div id="found"></div><br />
							<div class="form-group">
								<div class="col-lg-12">
									<input id="textbox1" type="text" class="form-control" placeholder="Name"name="username" onblur="user1(document.getElementById('textbox1').value)">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<input id="textbox" type="password" class="form-control" placeholder="Password" name="password">
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="col-lg-4 col-lg-offset-1 btn btn-primary">
									<i class="fa fa-btn fa-sign-in"></i> Login
								</button>
								<button type="button" class="col-lg-4 col-lg-offset-1 btn btn-primary" onclick="staff_per();">
									<i class="fa fa-btn fa-sign-in"></i> Register
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
