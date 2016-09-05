
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	<script type="text/javascript" src="js/custom.js"></script>
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
			<div class="col-lg-4 col-lg-offset-4" style="margin-top:30px;padding-bottom:20px;padding-top:10px;padding-left:60px;padding-right:60px;border: 1px solid black;border-radius: 20px;		box-shadow: 5px 5px 20px 4px #9C9C9C;background-color:#f5cc85">
        <div class="form-group">
                      <div class="col-lg-12">
          <center><h3 style="letter-spacing:5px;font-family:serif;font-size:25px;">Settings</h3><hr></center>
                        </div>
                     </div>
							


	                         	 <div class="form-group">
                  	 	<div class="col-lg-12">
									<center><br>	<input type="password" class="form-control" placeholder="New Password" name="pass" id="pass_t"></center>
	                          		</div>
	                         	 </div>

	                         	 <div class="form-group">
	                         	 	<div class="col-lg-12">
									<center>	<br><input type="password" class="form-control" name="cpass" placeholder="Confirm Password" id="conpass_t"></center>
	                          		</div>
	                         	 </div>

	                         	 <div class="form-group">

		                            	<div class="col-lg-4 col-lg-offset-2">
		                              <br>  	<button type="button" class="btn btn-primary" onclick="update();">
		                                    	<i class="fa fa-btn fa-sign-in"></i> Update
		                                	</button>
		                            	</div>
	                            		<div class="col-lg-4">
		                                <br>	<button type="button" class="btn btn-danger" onclick="window.location='home.php';">
		                                    	<i class="fa fa-btn fa-sign-in"></i> Cancel
		                                	</button>

						</div>
					</div>
				</div>
			</div>


</div>
 	<script src="js/bootstrap.min.js"></script>
 	 	<script type="text/javascript" src="js/in_body.js"></script>

</body>
</html>
