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

if (!empty($_POST['date'])) {
	    $date = strip_tags($_POST['date']);
        $_SESSION['date'] = $date;
        header("Location: check.php");
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kcet-Login</title>
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	</head>
	<body>

    <button id="log_out"  class="btn btn-primary" onclick="window.location='logout.php'">
        <i class="fa fa-btn fa-sign-in"></i> Logout
    </button>


		<div class="container-fluid">
      <div class="row" style="height:10px;"></div>

			<div class="row"><div class="col-md-4 col-md-offset-4"><center><h2>LCD PORTAL</h2></center></div></div>
			<hr>
      <div class="row">
        <div class="col-md-5 col-md-offset-7">
                            <form action="table.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
                  <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Choose date</label>
                                <div class="col-md-4">
                                   <input type="date" class="form-control" name="date" value="<?php echo $_SESSION['date']?>">
                                  </div>
                               </div>



                               <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary">
                                          <i class="fa fa-btn fa-sign-in"></i> Check
                                      </button>
                                  </div>
                              </div>
                </form>
          </div>
        </div>
      <div class="row"  >
              <div class="col-md-10 col-md-offset-1" >
                  <div class="panel panel-default">
                      <div class="panel-body">

                        <div class="row" >
                          <div class="col-md-12" style="padding-left:60px;">

                          <table>
                              <tr>
                                  <td><h4><center>VENUE</center></h4></td>
                                  <td><h4><center>I</center></h4></td>
                                  <td><h4><center>II</center></h4></td>
                                  <td><h4><center>III</center></h4></td>
                                  <td><h4><center>IV</center></h4></td>
                                  <td><h4><center>V</center></h4></td>
                                  <td><h4><center>VI</center></h4></td>
                                  <td><h4><center>VII</center></h4></td>
                              </tr>
                          <tr>
                          <td>
                          <h4><center>D1 HALL</center></h4>
                          </td>
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
                          	echo '<button id='.$id.' type="submit"><h6>'.$button.'</h6></button>';
                          	echo "</form>";
                          echo "</td>";
                          }
                          ?>






                          </tr>

                          <tr>
                          	<td><h4><center>OLD CSE LAB</center></h4>
                          		</td>

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
                              echo '<button id='.$id.' type="submit"><h6>'.$button.'</h6></button>';
                          	echo "</form>";
                          echo "</td>";
                          }
                          ?>

                          </tr>


                          <tr>
                          	<td><h4><center>NEW CSE LAB</center></h4>
                          		</td>

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
                          	echo '<button id='.$id.' type="submit"><h6>'.$button.'</h6></button>';
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
