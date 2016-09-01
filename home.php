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
	<link rel="stylesheet" type="text/css" href="for_index.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="in_head.js"></script>
</head>
<body>
	<div class="container-fluid">
    <div class="row" >

    <div class="col-lg-2" style="margin-top:70px;">
      <button type="button" class="btn btn-danger " style="float:left;" onclick="window.location='logout.php'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"
          style="font-size: 20px;"></span>Logout
      </button>
    </div>
		<div class="col-lg-8" style="height:130px;margin-top:30px;"><center><img src="logo.png" style="border:2px solid black;"/></center></div>
    <div class="col-lg-2" style="margin-top:70px;">
      <button type="button" class="btn btn-info " style="float:right;" onclick="window.location='settings.php'">  <span class="glyphicon glyphicon-cog" aria-hidden="true"
          style="font-size: 20px;"></span>
      </button>
    </div>
  </div>
  <hr>
		<div class="row" >

			<div class="col-lg-12" style="margin-top:0px;"><center><h2>LCD Portal</h2></center></div>

		</div>

		<div class="row">
			<div class="col-lg-6" style="padding-right: 80px;padding-left: 80px;margin-top:20px;">
        <div class="row">
        				<div class="col-lg-8 col-lg-offset-4" style="padding-top:20px;padding-left:30px;padding-right:30px;border: 1px solid black;border-radius: 20px;		box-shadow: 4px 4px 20px 0px #9C9C9C;
    ">

        	                        <div class="form-horizontal">
                                    <div class="form-group">
                                     <div class="col-lg-12">
<h2>Details</h2>                                       </div>

                                    </div>
                                    <hr>
        								<div class="form-group">
        	                         	 	<div class="col-lg-12">
        										<input type="text" class="form-control" name="pass" placeholder="Subject Code" >
        	                          		</div>
        	                         	 </div>



        	                         	 <div class="form-group">
        	                         	 	<div class="col-lg-12">
        										<input type="text" class="form-control" name="pass" placeholder="Subject Name">
        	                          		</div>
        	                         	 </div>

                                     <div class="form-group">
        	                         	 	<div class="col-lg-12">
        										<input type="text" class="form-control" name="pass" placeholder="Hall Number  (  incase of movable  )">
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
        		                                	<button type="button" class="btn btn-primary" onclick="window.location='table1.php'">
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
						<div class="col-lg-5 col-lg-offset-1" style="border: 1px solid black;border-radius: 20px;		box-shadow: 4px 4px 20px 0px #9C9C9C;
">
							<div class="row" style="padding-top: 10px;padding-bottom: 10px;background-color: #0699FB;border-top-left-radius: 20px;border-top-right-radius: 20px;">
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
						<div class="col-lg-5 col-lg-offset-1" style="border: 1px solid black;border-radius: 20px;		box-shadow: 4px 4px 20px 0px #9C9C9C;
">
							<div class="row" style="padding-top: 10px;padding-bottom: 10px;background-color: #0699FB;border-top-left-radius: 20px;border-top-right-radius: 20px;">
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
