<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role']=="admin") {
  $usname = $_SESSION['username'];
  $hall=$_SESSION['hall'];
  include_once("dbconnect.php");
}
else {
  header("Location: index.php");
}
if (!empty($_POST['hall'])) {
 $hall = strip_tags($_POST['hall']);
 $_SESSION['hall'] = $hall;
}

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
  <button id="log_out"  class="btn btn-primary" onclick="window.location='table.php'">
    <i class="fa fa-btn fa-sign-in"></i> Home
  </button>

  <div class="container-fluid">
    <div class="row" style="height:30px;"></div>
    <div class="row"><div class="col-md-4 col-md-offset-4"><center><h3>Admin Portal</h3></center></div></div>

    <hr>

    <div class="row">
      <div class="col-md-5 col-md-offset-7">
        <form action="lab.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
          <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
              <select class="form-control" name="hall" >
                  <option <?php if($_SESSION['hall']=="oldcse") echo 'selected="selected"'; ?>>Select Hall</option>
					        <option value="oldcse" <?php if($_SESSION['hall']=="oldcse") echo 'selected="selected"'; ?>>Oldcse Lab</option>
                  <option value="newcse" <?php if($_SESSION['hall']=="newcse") echo 'selected="selected"'; ?>>Newcse Lab</option>
                  <option value="d1hall" <?php if($_SESSION['hall']=="d1hall") echo 'selected="selected"'; ?>>D1 Hall</option>
                  <option value="movable"<?php if($_SESSION['hall']=="movable") echo 'selected="selected"'; ?>>Movable</option>
					      </select>
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
    <div class="col-md-12 " >

          <div class="row" >
            <div class="col-md-10 col-md-offset-1" style="padding-left:10px;">
                         <center><table>
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
                  <b><td><h5><center></center></h5></td>
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
                $days=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
                $day_ref=array("monday","tuesday","wednesday","thursday","friday","saturday");
                for($k=0;$k<6;$k++){
                    echo "<tr><td><h4><center>$days[$k]</center></h4></td>";
                    $sql = "SELECT * FROM lab where day='$day_ref[$k]' and hall='$hall' ";
                    $query = mysqli_query($dbCon, $sql);
                    $row = mysqli_fetch_row($query);
                    for($i=2;$i<=10;$i++){
                      $action='cancel_lab.php';
                        echo "<td>";
                        if($row[$i]==0){
                          $id='box';
                          $button='Free';
                          $action='book_lab.php';
                        }else{
                          $id='blue';
                          $button='Blocked';
                        }
                        if(empty($hall)){
                          $button="-";
                          $id="box";
                        }
                        $j=$i-2;
                        $periodid="period$j";
                        echo '<button class='.$id.' type="button"  row_name="'.$day_ref[$k].'" perform="'.$action.'" periodid="'.$periodid.'"  onclick="checkperiod(this);"><h6><i>'.$button.'</i></h6></button>';
                        echo "</td>";
                      }
                    echo '</tr>';
                }
                ?>
          </table></center>
        </div>
      </div>
    </div>

</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
