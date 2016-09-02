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
	<title>Personal Log</title>
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="js/custom.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="border-bottom:1px solid black;padding-bottom:20px;margin-bottom:30px;background-color:#433498;">
			<div class="col-lg-2">
				<button type="button" class="btn btn-danger " style="float:left;margin-top:40px;" onclick="window.location='logout.php'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"
			  		style="font-size: 20px;"></span>Logout
				</button>
			</div>
			<div class="col-lg-8"style="margin-top:30px;"><center><h2 style="letter-spacing:5px;font-family:serif;font-size:25px;color:#ffffff;">PERSONAL LOG</h2></center></div>
			<div class="col-lg-2">
				<button type="button" class="btn btn-info " style="float:right;margin-top:40px;" onclick="window.location='home.php'">  <span class="glyphicon glyphicon-home" aria-hidden="true"
			  		style="font-size: 20px;"></span>
				</button>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-10 col-lg-offset-1" style="margin-top:10px;">

        <table class="logtab">
          <thead>
            <tr>
              <th width="5%">SNo.</th>
              <th width="10%">Date</th>
              <th width="10%">Period</th>
              <th width="10%">Subject Code</th>
              <th width="40%">Subject Name</th>
              <th width="10%">Venue</th>
              <th width="5%">Year</th>
              <th width="10%">Section</th>
            <tr>
          </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>29/08/2016</td>
                <td>III</td>
                <td>CS6402</td>
                <td>Theory of Computation</td>
                <td>Old Cse Lab</td>
<td>III</td>
                <td>B</td>
              </tr>
              <tr>
                <td>2</td>
                <td>29/08/2016</td>
                <td>III</td>
                <td>CS6402</td>
                <td>Theory of Computation</td>
                <td>Old Cse Lab</td>
                <td>III</td>
                <td>B</td>

              </tr>
              <tr>
                <td>3</td>
                <td>29/08/2016</td>
                <td>III</td>
                <td>CS6402</td>
                <td>Theory of Computation</td>
                <td>Old Cse Lab</td>
                <td>III</td>
                <td>B</td>

              </tr>
              <tr>
                <td>4</td>
                <td>29/08/2016</td>
                <td>III</td>
                <td>CS6402</td>
                <td>Theory of Computation</td>
                <td>Old Cse Lab</td>
                <td>III</td>
                <td>B</td>

              </tr>
              <tr>
                <td>5</td>
                <td>29/08/2016</td>
                <td>III</td>
                <td>CS6402</td>
                <td>Theory of Computation</td>

                <td>Old Cse Lab</td>
                <td>III</td>
                <td>B</td>

              </tr>
            </tbody>
          </table>


    			</div>
			</div>
	</div>





	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
