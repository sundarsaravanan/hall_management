<?php
session_start();
if (isset($_SESSION['id'])) {
  $usname = $_SESSION['username'];
  $date=$_SESSION['date'];
  include_once("dbconnect.php");
}
else {
  header("Location: index.php");
}
if (!empty($_POST['date'])) {
 $date = strip_tags($_POST['date']);
 $_SESSION['date'] = $date;
 header("Location: check.php");
}
date_default_timezone_set('Asia/Calcutta');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kcet-Login</title>
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="js/custom.js"></script>
</head>
<body>
  <button id="log_out"  class="btn btn-primary" onclick="window.location='logout.php'">
    <i class="fa fa-btn fa-sign-in"></i> Logout
  </button>
  <?php
  if($_SESSION['role']=="admin"){
    echo "<button id='log_out'  class='btn btn-primary' onclick='edit();'>
      <i class='fa fa-btn fa-sign-in'></i> Edit
    </button>";
  }

   ?>
  <div class="container-fluid">
    <div class="row" style="height:30px;"></div>
    <div class="row"><div class="col-md-4 col-md-offset-4"><center><h3>CSE DEPARTMENT - LCD PORTAL</h3></center></div></div>
    <hr>
    <div class="row">
      <div class="col-md-5 col-md-offset-7">
        <form action="table.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="username" class="col-md-4 control-label">Choose date</label>
            <div class="col-md-5">
             <input type="date" class="form-control" name="date" placeholder="Choose Date" value="<?php echo $_SESSION['date']?>">
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
  <br>
  <div class="row"  >
    <div class="col-md-12" >

          <div class="row" >
            <div class="col-md-10 col-md-offset-1" style="padding-left:10px;">
              <div class="panel panel-default">
                <div class="panel-body">
              <table>
                <tr>
                  <td><h4><center>VENUE</center></h4></td>
                  <td><h4><center>0</center></h4></td>
                  <td><h4><center>I</center></h4></td>
                  <td><h4><center>II</center></h4></td>
                  <td><h4><center>III</center></h4></td>
                  <td><h4><center>IV</center></h4></td>
                  <td><h4><center>V</center></h4></td>
                  <td><h4><center>VI</center></h4></td>
                  <td><h4><center>VII</center></h4></td>
                  <td><h4><center>EVENING</center></h4></td>
                </tr>
                <tr>
                  <td><h5><center></center></h5></td>
                  <td><h5><center>8.30  - 9.00 am</center></h5></td>
                  <td><h5><center>9.00  - 9.50 am</center></h5></td>
                  <td><h5><center>9.50  - 10.40 am</center></h5></td>
                  <td><h5><center>11.00  - 11.50 am</center></h5></td>
                  <td><h5><center>11.50  - 12.40 pm</center></h5></td>
                  <td><h5><center>1.30  - 2.20 pm</center></h5></td>
                  <td><h5><center>2.20  - 3.10 pm</center></h5></td>
                  <td><h5><center>3.10  - 4.00 pm</center></h5></td>
                  <td><h5><center>4.00  - 6.00 pm</center></h5></td>
                </tr>
                <?php
                $halls=array("D1 HALL","OLD CSE LAB","NEW CSE LAB","MOVABLE");
                $hall_ref=array("d1hall","oldcse","newcse","movable");
                $time_ref=array("","","08:30","09:00","09:50","11:00","11:50","13:30","14:20","15:10","16:00");
                for($k=0;$k<4;$k++){
                    echo "<tr><td><h4><center>$halls[$k]</center></h4></td>";
                    $sql = "SELECT * FROM log WHERE date='$date' and hall='$hall_ref[$k]' ";
                    $query = mysqli_query($dbCon, $sql);
                    $row = mysqli_fetch_row($query);
                    for($i=2;$i<=10;$i++){
                      $action='cancel_period.php';
                      $op=1;
                      $type="";
                        echo "<td>";
                        if($row[$i]=='0'){
                          $id='box';
                          $button='Free';
                          $action='book_period.php';
                        }elseif($row[$i]==$usname){
                          $id='green';
                          $button='Allotted';

                      }elseif($row[$i]=='1'){
                        $id='blue';
                        $button='Lab Hour';
                        $type="disabled";
                      }else{
                          $id='red';
                          $button='Booked by <BR>'.strtoupper($row[$i]);
                          $type="disabled";

                        }


                        $ts=time();
                        $date1=date_create("$date $time_ref[$i]");
                        $date2=strtotime(date_format($date1,"Y/m/d H:i"));
                        if($ts-$date2>7200){
                          $type="disabled";
                          $op=0.7;
                      }
                      if(empty($date)){
                        $button="-";
                        $id="box";
                      }


                        $j=$i-2;
                        $periodid="period$j";
                        echo '<button id="'.$id.'" type="button" time_ref="'.$time_ref[$i].'" hall="'.$hall_ref[$k].'" perform="'.$action.'" periodid="'.$periodid.'"  style="opacity:'.$op.'"onclick="checkperiod1(this);" '.$type.'><h6><i>'.$button.'</i></h6></button>';
                        echo "</td>";
                      }
                    echo '</tr>';
                }
                ?>
          </table>
        </div>
      </div></div>
      </div>
</div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
