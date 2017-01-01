<?php
session_start();
if (isset($_SESSION['id'])) {
	if($_SESSION['role']=="admin"){
		header("Location: lab.php");
	}
	$usname = $_SESSION['usname'];
        $date=$_SESSION['date'];
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
	<script type="text/javascript" src="js/custom.js"></script>
	<link rel="stylesheet" type="text/css" href="css/for_index.css">

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script>
        $(document).ready(function() {
          $("#datepicker").datepicker({ minDate: 0 ,
              beforeShowDay: noSunday ,maxDate: 20,
             dateFormat: 'dd-mm-yy'

      });
        });

        function noSunday(date){
                  var day = date.getDay();
                              return [(day > 0), ''];
              };
        </script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        </style>

</head>
<body onload="bas2('<?php echo $usname;?>');" style="background-color:#ffffff;">
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
		</div>

		<div class="row">
		<div class="col-sm-2 col-sm-offset-1">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="font-size:20px;" >
	                  Book
	                </button>
			<button type="button" class="btn btn-primary" onclick="remarks('<?php echo $usname;?>')" style="font-size:20px;" >
	                  Remarks
	                </button>

		</div>
	          <div class="col-sm-5 col-sm-offset-4">
	            <form  action="home.php"  method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
	                <div class="col-sm-5 col-sm-offset-2">
	                 <input  autocomplete="off" id="datepicker" class="form-control" name="date" placeholder="Choose Date" value="<?php echo $_SESSION['date']?>">
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
	                <center>  <table class="timetab">
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
	                      <td><button class="box" id="d1hall0" onclick="checkperiod1(this);">-</button></td>
	                      <td><button class="box" id="d1hall1" onclick="checkperiod1(this);">-</button></td>
	                        <td><button class="box" id="d1hall2" onclick="checkperiod1(this);">-</button></td>
	                          <td><button class="box" id="d1hall3" onclick="checkperiod1(this);">-</button></td>
	                            <td><button class="box" id="d1hall4" onclick="checkperiod1(this);">-</button></td>
	                              <td><button class="box" id="d1hall5" onclick="checkperiod1(this);">-</button></td>
	                                <td><button class="box" id="d1hall6" onclick="checkperiod1(this);">-</button></td>
	                                  <td><button  class="box" id="d1hall7" onclick="checkperiod1(this);">-</button></td>
	                                    <td><button class="box" id="d1hall8" onclick="checkperiod1(this);">-</button></td>
	                    </tr>

	                    <tr>
	                      <td class="tab_row"><h3><center>New Cse Lab</center></h3></td>
	                      <td><button class="box" id="newcse0" onclick="checkperiod1(this);">-</button></td>
	                      <td><button class="box" id="newcse1" onclick="checkperiod1(this);">-</button></td>
	                        <td><button class="box" id="newcse2" onclick="checkperiod1(this);">-</button></td>
	                          <td><button class="box" id="newcse3" onclick="checkperiod1(this);">-</button></td>
	                            <td><button class="box" id="newcse4" onclick="checkperiod1(this);">-</button></td>
	                              <td><button class="box" id="newcse5" onclick="checkperiod1(this);">-</button></td>
	                                <td><button class="box" id="newcse6" onclick="checkperiod1(this);">-</button></td>
	                                  <td><button  class="box" id="newcse7" onclick="checkperiod1(this);">-</button></td>
	                                    <td><button class="box" id="newcse8" onclick="checkperiod1(this);">-</button></td>
	                    </tr>
			    <tr>
	                      <td class="tab_row"><h3><center>Old Cse Lab 1&2</center></h3></td>
	                      <td><button class="box" id="oldcse10" onclick="checkperiod1(this);">-</button></td>
	                      <td><button class="box" id="oldcse11" onclick="checkperiod1(this);">-</button></td>
	                        <td><button class="box" id="oldcse12" onclick="checkperiod1(this);">-</button></td>
	                          <td><button class="box" id="oldcse13" onclick="checkperiod1(this);">-</button></td>
	                            <td><button class="box" id="oldcse14" onclick="checkperiod1(this);">-</button></td>
	                              <td><button class="box" id="oldcse15" onclick="checkperiod1(this);">-</button></td>
	                                <td><button class="box" id="oldcse16" onclick="checkperiod1(this);">-</button></td>
	                                  <td><button  class="box" id="oldcse17" onclick="checkperiod1(this);">-</button></td>
	                                    <td><button class="box" id="oldcse18" onclick="checkperiod1(this);">-</button></td>
	                    </tr><tr>
	                      <td class="tab_row"><h3><center>Old Cse Lab 3&4</center></h3></td>
	                      <td><button class="box" id="oldcse20" onclick="checkperiod1(this);">-</button></td>
	                      <td><button class="box" id="oldcse21" onclick="checkperiod1(this);">-</button></td>
	                        <td><button class="box" id="oldcse22" onclick="checkperiod1(this);">-</button></td>
	                          <td><button class="box" id="oldcse23" onclick="checkperiod1(this);">-</button></td>
	                            <td><button class="box" id="oldcse24" onclick="checkperiod1(this);">-</button></td>
	                              <td><button class="box" id="oldcse25" onclick="checkperiod1(this);">-</button></td>
	                                <td><button class="box" id="oldcse26" onclick="checkperiod1(this);">-</button></td>
	                                  <td><button  class="box" id="oldcse27" onclick="checkperiod1(this);">-</button></td>
	                                    <td><button class="box" id="oldcse28" onclick="checkperiod1(this);">-</button></td>
	                    </tr>

	                  </table></center>
	    </div>
	    </div>
	</div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-body">
		<div class="col-sm-8 col-sm-offset-2" style="padding-top:10px;padding-left:30px;padding-right:30px;border: 1px solid black;border-radius: 20px;background-color:#f5cc85;">
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
      					  <input type="text" id="code" class="form-control"  placeholder="Subject Code or Other reason" >
      				  </div>
      			  </div>

      			  <div class="form-group">
      				  <label for="type_m" class="col-sm-4 control-label"><h4>Year</h4></label>
      				  <div class="col-sm-8" style="padding-top:10px;">
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
      				  <label for="type_m" class="col-sm-4 control-label"><h4>Section</h4></label>
      				  <div class="col-sm-6 " style="padding-top:10px;">
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
      				  <div class="col-sm-12 ">
      					  <div class="col-sm-3 col-sm-offset-3">
      					  <button type="button" class="btn btn-primary" onclick="home_form()">
      						  Book
      					  </button>
      					  </div>
					  <div class="col-sm-3">

					  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      					  </div>

      				  </div>
      			  </div>
      		  </div>
      	  </div>



      </div>

    </div>
  </div>





	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
