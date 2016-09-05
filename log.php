<?php
session_start();
if (isset($_SESSION['id'])) {

	$uid = $_SESSION['id'];
	$usname = $_SESSION['usname'];
	$date=$_SESSION['date'];
	include_once("dbconnect.php");


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
		<div class="row" style="border-bottom:1px solid black;padding-bottom:20px;margin-bottom:30px;background-color:#433498;">
			<div class="col-lg-2">
				<button type="button" class="btn btn-danger " style="float:left;margin-top:40px;" onclick="window.location='logout.php'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"
			  		style="font-size: 20px;"></span>Logout
				</button>
			</div>
			<div class="col-lg-8"style="margin-top:30px;"><center><h2 style="letter-spacing:5px;font-family:serif;font-size:25px;color:#ffffff;">USAGE      LOG</h2></center></div>
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
              <th width="3%">SNo.</th>
              <th width="10%">Date</th>
              <th width="17%">Name</th>
              <th width="10%">Period</th>
              <th width="8%">Subject Code</th>
              <th width="35%">Subject Name</th>
              <th width="13%">Venue</th>
              <th width="7%">Year</th>
              <th width="7%">Section</th>
            <tr>
          </thead>
            <tbody>
							<?php
		$sql="select * from booking where not staffid='0' and not staffid='2' order by date desc";
							$query = mysqli_query($dbCon, $sql);
							$k=1;
while($row = mysqli_fetch_array($query)){
	echo '<tr>';
	echo "<td>$k. </td>";
	echo "<td> $row[1] </td>";
	echo "<td> $row[5] </td>";
	if($row[3]=="test"){
		echo "<td> 8.30 - 9.00 </td>";
	}
	else if($row[3]=="spcl"){
		echo "<td> 4.00 - 6.00 </td>";
	}
	else{
		echo "<td> $row[3] </td>";
	}
	echo "<td> $row[6] </td>";
	echo "<td> $row[7] </td>";
	echo "<td> $row[4] </td>";
	echo "<td> $row[8] </td>";
	echo "<td> $row[9] </td>";
	echo '</tr>';
$k++;
}
							?>
            </tbody>
          </table>


    			</div>
			</div>
	</div>





	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
