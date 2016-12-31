<?php
session_start();
if (isset($_SESSION['id'])) {

}
else{
	 header("Location: index.php");
}
?>
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
		<div class="row" style="border-bottom:1px solid black;padding-bottom:20px;margin-bottom:30px;background-color:#ffffff;">
		  <div class="col-sm-2">
		    <button type="button" class="btn btn-primary " style="float:left;margin-top:30px;font-size:18px;margin-left:40px;" onclick="window.location='logout.php'"> Logout
		    </button>
		  </div>
		  <div class="col-sm-8"style="margin-top:20px;"><center><h2 style="letter-spacing:5px;font-family:serif;font-size:25px;color:#000000;">LCD PORTAL</h2></center></div>
		  <div class="col-sm-2">

		    <button type="button" class="btn btn-primary " style="float:right;margin-top:30px;margin-right:20px;" onclick="window.location='settings.php'">  <span class="glyphicon glyphicon-cog" aria-hidden="true"
			style="font-size: 20px;"></span>
		    </button>
		    <button type="button" class="btn btn-primary " style="float:right;margin-top:30px;margin-right:20px;" onclick="window.location='home.php'">  <span class="glyphicon glyphicon-home" aria-hidden="true"
		      style="font-size: 20px;"></span>
		  </button>

		  </div>
		</div>

		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" style="margin-top:30px;padding-bottom:20px;padding-top:10px;padding-left:60px;padding-right:60px;border: 1px solid black;border-radius: 20px;		box-shadow: 5px 5px 20px 4px #9C9C9C;background-color:#f5cc85">
        <div class="form-group">
                      <div class="col-sm-12">
          <center><h3 style="letter-spacing:5px;font-family:serif;font-size:25px;">Settings</h3><hr></center>
                        </div>
                     </div>



	                         	 <div class="form-group">
                  	 	<div class="col-sm-12">
									<center><br>	<input type="password" class="form-control" placeholder="New Password" name="pass" id="pass_t"></center>
	                          		</div>
	                         	 </div>

	                         	 <div class="form-group">
	                         	 	<div class="col-sm-12">
									<center>	<br><input type="password" class="form-control" name="cpass" placeholder="Confirm Password" id="conpass_t"></center>
	                          		</div>
	                         	 </div>

	                         	 <div class="form-group">

		                            	<div class="col-sm-4 col-sm-offset-2">
		                              <br>  	<button type="button" class="btn btn-primary" onclick="update();">
		                                    	<i class="fa fa-btn fa-sign-in"></i> Update
		                                	</button>
		                            	</div>
	                            		<div class="col-sm-4">
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
