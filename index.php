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



	$sql = "SELECT id, username, password FROM staff WHERE username = '$usname' AND password='$paswd'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dbUsname = $row[1];
	$dbPassword = $row[2];


	if ($usname == $dbUsname && $paswd == $dbPassword) {

		$_SESSION['username'] = $usname;
		$_SESSION['id'] = $uid;

		header("Location: table.php");
	} else {

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
		                <div class="panel-heading">Login</div>
		               		<div class="panel-body">
		                        <form id="form" action="index.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="login_form" role="form" >
                              <div id="found"></div><br />
									              <div class="form-group">
		                         	 	<label for="username" class="col-md-4 control-label">Username</label>
		                         	 	<div class="col-md-6">
											<input id="textbox1" type="text" class="form-control" name="username" onblur="user1(document.getElementById('textbox1').value)">
		                          		</div>
		                         	 </div>
		                         	 <div class="form-group">
		                         	 	<label for="password" class="col-md-4 control-label">Password</label>
		                         	 	<div class="col-md-6">
											<input id="textbox" type="password" class="form-control" name="password">
		                          		</div>
		                         	 </div>

		                         	 <div class="form-group">
		                                	<button type="submit" class="col-md-4 btn btn-primary">
		                                    	<i class="fa fa-btn fa-sign-in"></i> Login
		                                	</button>
                                      <button type="button" class="col-md-4 col-md-offset-1 btn btn-primary" onclick="staff_per();">
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

		<script type="text/javascript" src="js/in_body.js"></script>
    <script>
    function staff_per() {
        window.location.assign("staff_per.php")
    }
    

    </script>
	</body>
</html>
