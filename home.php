<?php
#error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	session_start();
	if (isset($_SESSION['id'])) {
		if($_SESSION['role']=="admin"){
			header("Location: lab.php");
		}
		if($_SESSION['role']=="technician"){
			header("Location: techlog.php");
		}
		$usname = $_SESSION['usname'];
		if (isset($_SESSION['date'])) {
			$date=$_SESSION['date'];
		}
		else {
			$date="Choose Date";
		}
	        include_once("dbconnect.php");
	}
	else{
		 header("Location: index.php");
	}

	if (!empty($_POST['date'])) {
		 $date = strip_tags($_POST['date']);
		 $_SESSION['date'] = $date;
		header("Location: check1.php");
	}
	date_default_timezone_set('Asia/Calcutta');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<link rel="stylesheet" type="text/css" href="css/for_index.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script>
        $(document).ready(function() {
          $("#datepicker").datepicker({ minDate: 0 ,
              beforeShowDay: noSunday ,maxDate: 7,
             dateFormat: 'dd-mm-yy'
      });
        });
        function noSunday(date){
                  var day = date.getDay();
                              return [(day > 0), ''];
              };
        </script>
	<script src="js/jquery-1.12.4.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script>
        $( function() {
          $( document ).tooltip();
        } );
        </script>
        <style>
        label {
          display: inline-block;
          width: 5em;
        }

	.radbut{
	        height:40px;
	        font-size: 15px;

	}
	.form-control:focus {
	  border-color: inherit;
	  -webkit-box-shadow: none;
	  box-shadow: none;
	}
	.btn:focus {
	  outline: none;
	}
        </style>

</head>
<body onload="loadAvailability('<?php echo $usname;?>');" style="background-color:#ffffff;">
	<div class="container-fluid">
		<div class="row" style="border-bottom:1px solid black;padding-bottom:20px;margin-bottom:30px;background-color:#ffffff;">
		  	<div class="col-sm-2">
		    		<button type="button" class="btn btn-primary " style="float:left;margin-top:30px;font-size:18px;margin-left:40px;" onclick="window.location='logout.php'"> Logout
		    		</button>
		  	</div>
		  	<div class="col-sm-8"style="margin-top:20px;"><center><h2 style="letter-spacing:5px;font-family:serif;font-size:25px;color:#000000;">DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING <br><br>LCD PORTAL</h2></center></div>
		  	<div class="col-sm-2">
		    		<button type="button" class="btn btn-primary " style="float:right;margin-top:30px;margin-right:20px;" onclick="window.location='settings.php'">  <span class="glyphicon glyphicon-cog" aria-hidden="true"
			style="font-size: 20px;"></span>
		    		</button>
		    		<button type="button" class="btn btn-primary " style="float:right;margin-top:30px;margin-right:20px;font-size:20px;" onclick="window.location='perlog.php'">  Log
		    		</button>
		  	</div>
			<div class="row">
			<div class="col-sm-4 col-sm-offset-8">
			<h3 style="letter-spacing:2px;font-family:serif;font-size:25px;color:#000000;"><i>USER NAME:<?php echo $usname;?></i></h3>
			</div>
			</div>

		</div>

		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="font-size:20px;" >
	                  Book
	                	</button>
				<button type="button" class="btn btn-primary" onclick="window.location='cancel.php'" style="font-size:20px;" >
	                  Cancel
	                	</button>
				<button type="button" class="btn btn-primary" onclick="remarks('<?php echo $usname;?>')" style="font-size:20px;" >
	                  Remarks
	                	</button>
			</div>
	          	<div class="col-sm-5 col-sm-offset-2">
	            		<form  action="home.php"  method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
		                	<div class="col-sm-5 col-sm-offset-2">
		                 		<input  autocomplete="off" id="datepicker" class="form-control" name="date" placeholder="Choose Date" value="<?php echo $date?>" readonly='true'>
		    			</div>
		    			<div class="col-sm-3 col-sm-offset-1">
		                		<button type="submit" class="btn btn-primary" style="font-size:20px;" onclick="datestore1();">
		                  		<i class="fa fa-btn fa-sign-in"></i> Check
		                		</button>
		              		</div>
	          		</form>
	        	</div>
	      	</div>
	      <br>
	      <div class="row"  >
	        <div class="col-sm-12" >
	          <br>
	          <center>
			  <h3 style="letter-spacing:5px;font-family:serif;font-size:25px;color:#000000;">AVAILABILITY</h3>
			  <table class="timetab">
	                    <tr>
	                      <td class="tab_col tab_row"><h3><center>Venue</center></h3></td>
	                      <td class="tab_col"><h3><center>0</center></h3></td>
	                      <td class="tab_col"><h3><center>I</center></h3></td>
	                      <td class="tab_col"><h3><center>II</center></h3></td>
	                      <td class="tab_col"><h3><center>III</center></h3></td>
	                      <td class="tab_col"><h3><center>IV</center></h3></td>
	                      <td class="tab_col"><h3><center>V</center></h3></td>
	                      <td class="tab_col"><h3><center>VI</center></h3></td>
	                      <td class="tab_col"><h3><center>VII</center></h3></td>
	                      <td class="tab_col"><h3><center>4-6 pm</center></h3></td>
	                    </tr>
	                    <tr>
	                      <td class="tab_row"><h3><center>D1 Hall</center></h3></td>
	                      <td><button class="box" id="d1hall0" onclick="availCheck(this);">-</button></td>
	                      <td><button class="box" id="d1hall1" onclick="availCheck(this);">-</button></td>
                		<td><button class="box" id="d1hall2" onclick="availCheck(this);">-</button></td>
                  		<td><button class="box" id="d1hall3" onclick="availCheck(this);">-</button></td>
                    		<td><button class="box" id="d1hall4" onclick="availCheck(this);">-</button></td>
                      		<td><button class="box" id="d1hall5" onclick="availCheck(this);">-</button></td>
                        	<td><button class="box" id="d1hall6" onclick="availCheck(this);">-</button></td>
                          	<td><button  class="box" id="d1hall7" onclick="availCheck(this);">-</button></td>
                            	<td><button class="box" id="d1hall8" onclick="availCheck(this);">-</button></td>
	                    </tr>

			    <tr>
	                      <td class="tab_row"><h3><center>Cse Lab 1 (1&2)</center></h3></td>
	                      <td><button class="box" id="oldcse10" onclick="availCheck(this);">-</button></td>
	                      <td><button class="box" id="oldcse11" onclick="availCheck(this);">-</button></td>
                		<td><button class="box" id="oldcse12" onclick="availCheck(this);">-</button></td>
                  		<td><button class="box" id="oldcse13" onclick="availCheck(this);">-</button></td>
                    		<td><button class="box" id="oldcse14" onclick="availCheck(this);">-</button></td>
                      		<td><button class="box" id="oldcse15" onclick="availCheck(this);">-</button></td>
                        	<td><button class="box" id="oldcse16" onclick="availCheck(this);">-</button></td>
                          	<td><button  class="box" id="oldcse17" onclick="availCheck(this);">-</button></td>
                            	<td><button class="box" id="oldcse18" onclick="availCheck(this);">-</button></td>
	                    </tr>
			    <tr>
	                      <td class="tab_row"><h3><center>Cse Lab 1(3&4)</center></h3></td>
	                      <td><button class="box" id="oldcse20" onclick="availCheck(this);">-</button></td>
	                      <td><button class="box" id="oldcse21" onclick="availCheck(this);">-</button></td>
                		<td><button class="box" id="oldcse22" onclick="availCheck(this);">-</button></td>
                  		<td><button class="box" id="oldcse23" onclick="availCheck(this);">-</button></td>
                    		<td><button class="box" id="oldcse24" onclick="availCheck(this);">-</button></td>
                      		<td><button class="box" id="oldcse25" onclick="availCheck(this);">-</button></td>
                        	<td><button class="box" id="oldcse26" onclick="availCheck(this);">-</button></td>
                          	<td><button  class="box" id="oldcse27" onclick="availCheck(this);">-</button></td>
                            	<td><button class="box" id="oldcse28" onclick="availCheck(this);">-</button></td>
	                    </tr>
			    <tr>
	                      <td class="tab_row"><h3><center>Cse Lab 2</center></h3></td>
	                      <td><button class="box" id="newcse0" onclick="availCheck(this);">-</button></td>
	                      <td><button class="box" id="newcse1" onclick="availCheck(this);">-</button></td>
                		<td><button class="box" id="newcse2" onclick="availCheck(this);">-</button></td>
                  		<td><button class="box" id="newcse3" onclick="availCheck(this);">-</button></td>
                    		<td><button class="box" id="newcse4" onclick="availCheck(this);">-</button></td>
                      		<td><button class="box" id="newcse5" onclick="availCheck(this);">-</button></td>
                		<td><button class="box" id="newcse6" onclick="availCheck(this);">-</button></td>
                          	<td><button  class="box" id="newcse7" onclick="availCheck(this);">-</button></td>
                            	<td><button class="box" id="newcse8" onclick="availCheck(this);">-</button></td>
	                    </tr>
	                  </table>
		  </center>
	    	</div>
	    </div>
	</div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-body">
		<div class="col-sm-8 col-sm-offset-2" style="padding-top:10px;padding-left:30px;padding-right:30px;border: 1px solid black;border-radius: 20px;background-color:#f5cc85;">
		<form  action="set.php" method="post"  enctype="multipart/form-data" role="form" >
		  <div class="form-horizontal">
      			  <div class="form-group">
      				  <div class="col-sm-12">
					  <button type="button" class="close" data-dismiss="modal" style="letter-spacing:5px;font-family:serif;font-size:30px;">&times;</button>
      					  <h3 style="letter-spacing:5px;font-family:serif;font-size:30px;">Details</h3>
      				  </div>
      			  </div>
      			  <hr>
      			  <div class="form-group">
      				  <div class="col-sm-12">
      					  <input type="text" id="code" class="form-control" name="code"  placeholder="Subject Code or Other reason" required>
      				  </div>
      			  </div>
			  <div class="col-lg-12  col-sm-12 col-md-12 ">
				  <center><h4>YEAR</h4></center>
                                  <div class="btn-group col-lg-12  col-xs-12 col-md-12 " style="margin-top:10px;" data-toggle="buttons">
                                    <label class="btn btn-primary radbut  col-sm-3" >
                                      <input type="radio" name="year" id="type1" value="I" required> I
                                    </label>
                                    <label class="btn btn-primary radbut col-sm-3">
                                      <input type="radio" name="year" id="type2" value="II"> II
                                    </label>
				    <label class="btn btn-primary radbut col-sm-3" >
				      <input type="radio" name="year" id="type3" value="III" > III
				    </label>
				    <label class="btn btn-primary radbut col-sm-3">
				      <input type="radio" name="year" id="type4" value="IV" > IV
				    </label>
                                  </div>
                          </div>
			  <div class="col-lg-12  col-sm-12 col-md-12 ">
				 <center><h4>SECTION</h4></center>
				  <div class="btn-group col-sm-6 col-sm-offset-3 " style="margin-top:10px;margin-bottom:30px;" data-toggle="buttons">
				    <label class="btn btn-primary radbut  col-sm-6" >
				      <input type="radio" name="section" id="sec1" value="A" required> A
				    </label>
				    <label class="btn btn-primary radbut  col-sm-6" >
				      <input type="radio" name="section" id="sec2" value="B" > B
				    </label>
				  </div>
			  </div>

      			  <hr>
      			  <div class="form-group">
      				  <div class="col-sm-12 ">
      					  <div class="col-sm-3 col-sm-offset-3">
      					  <button type="submit" class="btn btn-primary">
      						  Book
      					  </button>
      					  </div>
					  <div class="col-sm-3">

					  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      					  </div>
      				  </div>
      			  </div>
      		  </div>
	  </form>
      	  </div>
      </div>
    </div>
  </div>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
