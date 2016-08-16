<?php
session_start();
if (isset($_SESSION['id'])) {

    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
	$date=$_SESSION['date'];
	include_once("dbconnect.php");

	$date = mysqli_real_escape_string($dbCon, $date);

    $sql = "SELECT id,per1,per2,per3,per4,per5,per6,per7 FROM class WHERE date='$date'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$id = $row[0];
	for($i=1;$i<8;$i++){
	$per[$i] = $row[$i];
    }

	$sql1 = "SELECT id,per1,per2,per3,per4,per5,per6,per7 FROM oldcse WHERE date='$date'";
	$query1 = mysqli_query($dbCon, $sql1);
	$row1 = mysqli_fetch_row($query1);
	$id1 = $row1[0];
	for($j=8,$i=1;$j<15,$i<8;$j++,$i++){
	$per[$j] = $row1[$i];
    }

	$sql2 = "SELECT id,per1,per2,per3,per4,per5,per6,per7 FROM newcse WHERE date='$date'";
	$query2 = mysqli_query($dbCon, $sql2);
	$row2 = mysqli_fetch_row($query2);
	$id2 = $row2[0];
	for($j=15,$i=1;$j<22,$i<8;$j++,$i++){
	$per[$j] = $row2[$i];
    }




} else {
    header("Location: index.php");
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

    <button id="log_out"  class="btn btn-primary" onclick="window.location='logout.php'">
        <i class="fa fa-btn fa-sign-in"></i> Logout
    </button>
    <button id="log_out"  class="btn btn-primary" onclick="window.location='date.php'">
        <i class="fa fa-btn fa-sign-in"></i> Home
    </button>

		<div class="container-fluid">
      <div class="row" style="height:100px;"></div>

			<div class="row"><center><h1>LCD PORTAL</h1></center></div>
			<hr>
      <div class="row"  >
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-body">

                        <div class="row" >
                          <div class="col-md-12" >

                          <table>
                              <tr>
                                  <td><a1><center>VENUE</center></a1></td>
                                  <td>&nbsp;&nbsp;&nbsp;</td>
                                  <td><a1><center>9 - 9.50 am</center></a1></td>
                                  <td><a1><center>9.50 - 10.40 am </center></a1></td>
                                  <td><a1><center>11.00 - 11.50 am</center></a1></td>
                                  <td><a1><center>11.50 - 12.40 pm</center></a1></td>
                                  <td><a1><center>1.30 - 2.20 pm</center></a1></td>
                                  <td><a1><center>2.20 - 3.10 pm</center></a1></td>
                                  <td><a1><center>3.10 - 4.00 pm</center></a1></td>
                              </tr>
                              <tr><td><br></td></tr>
                          <tr>
                          <td>
                          <a1><center>D1 HALL</center></a1>
                          </td>
                          	<td></td>
                          <?php
                          for($i=1;$i<8;$i++){
                          echo "<td>";
                          if($per[$i]=='available'){
                          	$id='box';
                          	}elseif($per[$i]==$usname){
                          		$id='green';
                          		}else{
                          			$id='red';
                          		}

                          if($per[$i]=='available'){
                          	$action='book_period.php';
                          	}else{
                          		$action='cancel_period.php';
                          		}

                          if($per[$i]=='available'){
                              $button='AVAILABLE';
                              }elseif($per[$i]==$usname){
                                  $button='BOOKED BY<br>YOU';
                                  }else{
                                      $button='BOOKED BY <BR>'.strtoupper($per[$i]);
                                      }

                          	echo '<form action='.$action.' method="post" enctype="multipart/form-data">';
                              echo '<input class="hidden" name="cell" value='.$i.' >';
                          	echo '<button id='.$id.' type="submit">'.$button.'</button>';
                          	echo "</form>";
                          echo "</td>";
                          }
                          ?>






                          </tr>

                          <tr>
                          	<td><a1><center>OLD CSE LAB</center></a1>
                          		</td>
                                  <td></td>

                          <?php
                          for($i=8;$i<15;$i++){
                          echo "<td>";
                          if($per[$i]=='available'){
                          	$id='box';
                          	}elseif($per[$i]==$usname){
                          		$id='green';
                          		}else{
                          			$id='red';
                          		}

                          if($per[$i]=='available'){
                          	$action='book_period.php';
                          	}else{
                          		$action='cancel_period.php';
                          		}

                          if($per[$i]=='available'){
                              $button='AVAILABLE';
                              }elseif($per[$i]==$usname){
                                  $button='BOOKED BY<br>YOU';
                                  }else{
                                      $button='BOOKED BY <BR>'.strtoupper($per[$i]);
                                      }

                          	echo '<form action='.$action.' method="post" enctype="multipart/form-data">';
                          	echo '<input class="hidden" name="cell" value='.$i.' >';
                              echo '<button id='.$id.' type="submit">'.$button.'</button>';
                          	echo "</form>";
                          echo "</td>";
                          }
                          ?>

                          </tr>


                          <tr>
                          	<td><a1><center>NEW CSE LAB</center></a1>
                          		</td>
                          	<td></td>

                          <?php
                          for($i=15;$i<22;$i++){
                          echo "<td>";
                          if($per[$i]=='available'){
                          	$id='box';
                          	}elseif($per[$i]==$usname){
                          		$id='green';
                          		}else{
                          			$id='red';
                          		}

                          if($per[$i]=='available'){
                          	$action='book_period.php';
                          	}else{
                          		$action='cancel_period.php';
                          		}

                          if($per[$i]=='available'){
                              $button='AVAILABLE';
                              }elseif($per[$i]==$usname){
                                  $button='BOOKED BY<br>YOU';
                                  }else{
                                      $button='BOOKED BY <BR>'.strtoupper($per[$i]);
                                      }

                          	echo '<form action='.$action.' method="post" enctype="multipart/form-data">';
                              echo '<input class="hidden" name="cell" value='.$i.' >';
                          	echo '<button id='.$id.' type="submit">'.$button.'</button>';
                          	echo "</form>";
                          echo "</td>";
                          }
                          ?>




                          </tr>




                          </table>




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
