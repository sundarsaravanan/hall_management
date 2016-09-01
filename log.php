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
	<title>Log</title>
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="js/custom.js"></script>
</head>
<body>
	<div class="container-fluid">
    <div class="row" style="height:40px;margin-top:30px;"><center><img src="logo.png" style="border:2px solid black;"/></center></div>
		<div class="row">
			<div class="col-lg-2">
				<button type="button" class="btn btn-danger " style="float:left;" onclick="window.location='logout.php'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"
			  		style="font-size: 20px;"></span>Logout
				</button>
			</div>
			<div class="col-lg-8"style="margin-top:100px;"><center><h2>LOG  </h2></center></div>
			<div class="col-lg-2">
				<button type="button" class="btn btn-info " style="float:right;" onclick="window.location='home.php'">  <span class="glyphicon glyphicon-home" aria-hidden="true"
			  		style="font-size: 20px;"></span>
				</button>
			</div>
		</div>
		<hr>


		<div class="row">
			<div class="col-lg-10 col-lg-offset-1" style="margin-top:10px;">

        <table class="logtab">
          <thead>
            <tr>
              <th width="5%">SNo.</th>
              <th width="10%">Date</th>
              <th width="20%">Name</th>
              <th width="5%">Period</th>
              <th width="8%">Subject Code</th>
              <th width="35%">Subject Name</th>
              <th width="13%">Venue</th>
              <th width="7%">Year</th>
              <th width="7%">Section</th>
            <tr>
          </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>29/08/2016</td>
                <td>AAA</td>
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
                <td>BBB</td>
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
                <td>CCC</td>

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
                <td>DDD</td>

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
                <td>FFF</td>

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
