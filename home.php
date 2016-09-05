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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/for_index.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="js/custom.js"></script>



</head>
<body style="background-color:#ffffff">
	<div class="container-fluid">
    <div class="row" style="background-color:#433498;">

    <div class="col-lg-2" style="margin-top:70px;">
      <button type="button" class="btn btn-info " style="float:left;font-size:18px;" onclick="window.location='logout.php'">Logout
      </button>
    </div>

		<div class="col-lg-8" style="height:180px;padding-top:30px;"><center><img src="logo.png" height="140px"width="800px"/></center></div>
    <div class="col-lg-2" style="margin-top:70px;">
      <button type="button" class="btn btn-info " style="float:right;" onclick="window.location='settings.php'">  <span class="glyphicon glyphicon-cog" aria-hidden="true"
          style="font-size: 20px;"></span>
      </button>
      <?php
      if($_SESSION['role']=="admin"){
        echo '<button type="button" class="btn btn-info " style="float:right;margin-top:0px;margin-right:40px;font-size:18px;" onclick="call_home();"> Edit
        </button>';
      }

       ?>
    </div>
  </div>
		<div class="row" >

			<div class="col-lg-12" style="margin-top:0px;"><center><h2 style="letter-spacing:8px;font-family:serif;font-size:30px;">LCD Portal</h2></center></div>

		</div>

		<div class="row">
			<div class="col-lg-6" style="padding-right: 80px;padding-left: 80px;margin-top:20px;">
        <div class="row">
        				<div class="col-lg-8 col-lg-offset-4" style="padding-top:10px;padding-left:30px;padding-right:30px;border: 1px solid black;border-radius: 20px;		box-shadow: 5px 5px 25px 4px #9C9C9C;background-color:#f5cc85;"
    >

        	                        <div class="form-horizontal">
                                    <div class="form-group">
                                     <div class="col-lg-12">
                                       <h3 style="letter-spacing:5px;font-family:serif;font-size:30px;">Details</h3>                                       </div>

                                    </div>
                                    <hr>
        								<div class="form-group">
        	                         	 	<div class="col-lg-12">
        										<input type="text" id="code" class="form-control"  placeholder="Subject Code" >
        	                          		</div>
        	                         	 </div>



        	                         	 <div class="form-group">
        	                         	 	<div class="col-lg-12">
        										<input type="text" id="subname" class="form-control"  placeholder="Subject Name">
        	                          		</div>
        	                         	 </div>

                                     <div class="form-group">
        	                         	 	<div class="col-lg-12">
        										<input type="text" class="form-control" id="movable" placeholder="Hall Number ">
        	                          		</div>
        	                         	 </div>

                                     <div class="form-group">
                                       <label for="type_m" class="col-lg-4 control-label"><h4>Year</h4></label>
                                       <div class="col-lg-8" style="padding-top:10px;">
                                           <label class="radio-inline">
                                             <input type="radio" name="year" id="type1" value="I"> I
                                           </label>
                                           <label class="radio-inline">
                                             <input type="radio" name="year" id="type2" value="II"> II
                                           </label>
                                           <label class="radio-inline">
                                             <input type="radio" name="year" id="type3" value="II"> III
                                           </label>
                                           <label class="radio-inline">
                                             <input type="radio" name="year" id="type3" value="IV"> IV
                                           </label>

                                       </div>
                                      </div>

                            <div class="form-group">
                              <label for="type_m" class="col-lg-4 control-label"><h4>Section</h4></label>
                              <div class="col-lg-6 " style="padding-top:10px;">
                                  <label class="radio-inline" >
                                    <input type="radio" name="section" id="sec1" value="A"> A
                                  </label>
                                  <label class="radio-inline">
                                    <input type="radio" name="section" id="sec2" value="B"> B
                                  </label>

                              </div>
                             </div>
<hr>
        	                         	 <div class="form-group">
        	                            	<div class="col-lg-12 ">
        		                            	<div class="col-lg-4 col-lg-offset-4">
        		                                	<button type="button" class="btn btn-primary" onclick="home_form()">
        		                                    	<i class="fa fa-btn fa-sign-in"></i> Book
        		                                	</button>
        		                            	</div>

        	                            	</div>
        	                        	</div>
        							</div>

        				</div>
        			</div>



			</div>

			<div class="col-lg-6">
				<div class="row" style="margin-bottom: 50px;margin-top:100px;">
					<a href="perlog.php" style="text-decoration: none;">
						<div class="col-lg-5 col-lg-offset-1" style="border: 1px solid black;border-radius: 20px;		box-shadow: 4px 4px 20px 0px #9C9C9C;background-color:#ffffff;
">
							<div class="row" style="padding-top: 10px;padding-bottom: 10px;background-color: #433498;border-top-left-radius: 20px;border-top-right-radius: 20px;">
								<div class="col-lg-4">
		       						<span class="glyphicon glyphicon-list-alt" style="color:#000000; float:right; font-size:25px; vertical-align: middle;" aria-hidden="true">
		       						</span>
		       						<br>
								</div>
								<div class="col-lg-8">
									<a1 style="font-size: 22px;color:white;">Personal Log</a1>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12" style="padding-right: 15px;padding-left: 15px;">

									<h4 style="line-height: 35px;padding-top: 10px;padding-bottom:10px;color:black;">
									<center>View your LCD usage</center>
									</h4>
								</div>
							</div>
						</div>
					</a>




				</div>

				<div class="row">
					<a href="log.php" style="text-decoration: none;">
						<div class="col-lg-5 col-lg-offset-1" style="border: 1px solid black;border-radius: 20px;		box-shadow: 4px 4px 20px 0px #9C9C9C;background-color:#ffffff;
">
							<div class="row" style="padding-top: 10px;padding-bottom: 10px;background-color: #433498;border-top-left-radius: 20px;border-top-right-radius: 20px;">
								<div class="col-lg-4">
		       						<span class="glyphicon glyphicon-list-alt" style="color:#000000; float:right; font-size:25px; vertical-align: middle;" aria-hidden="true">
		       						</span>
		       						<br>
								</div>
								<div class="col-lg-8">
									<a1 style="font-size: 22px;color:white;">Overall Log</a1>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12" style="padding-right: 15px;padding-left: 15px;">
									<h4 style="line-height: 35px;padding-top: 10px;padding-bottom:10px;color:black;"><center>View the overall LCD usage </center></h4>

								</div>
							</div>
						</div>
					</a>

				</div>

			</div>
		</div>
	</div>





	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
