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
<body onload="bas('<?php echo $usname;?>');">
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
    <div class="row"><div class="col-lg-4 col-lg-offset-4"><center><h3>CSE DEPARTMENT - LCD PORTAL</h3></center></div></div>
    <hr>
    <div class="row">
      <div class="col-lg-5 col-lg-offset-7">
        <form action="table.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="username" class="col-lg-4 control-label">Choose date</label>
            <div class="col-lg-5">
             <input type="date" class="form-control" name="date" placeholder="Choose Date" value="<?php echo $_SESSION['date']?>">
           </div>
         </div>
         <div class="form-group">
          <div class="col-lg-6 col-lg-offset-4">
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
    <div class="col-lg-12" >
      <br>
              <table>
                <tr>
                  <td><h4><center>Venue</center></h4></td>
                  <td><h4><center>8.30  - 9.00 am</center></h4></td>
                  <td><h4><center>9.00  - 9.50 am</center></h4></td>
                  <td><h4><center>9.50  - 10.40 am</center></h4></td>
                  <td><h4><center>11.00 - 11.50 am</center></h4></td>
                  <td><h4><center>11.50 - 12.40 pm</center></h4></td>
                  <td><h4><center>1.30  - 2.20 pm</center></h4></td>
                  <td><h4><center>2.20  - 3.10 pm</center></h4></td>
                  <td><h4><center>3.10  - 4.00 pm</center></h4></td>
                  <td><h4><center>4.00  - 6.00 pm</center></h4></td>
                </tr>

                <tr>
                  <td><h4><center>D1 Hall</center></h4></td>
                  <td><button class="box" id="d1hall0" onclick="checkperiod1(this);"></button></td>
                  <td><button class="box" id="d1hall1" onclick="checkperiod1(this);"></button></td>
                    <td><button class="box" id="d1hall2" onclick="checkperiod1(this);"></button></td>
                      <td><button class="box" id="d1hall3" onclick="checkperiod1(this);"></button></td>
                        <td><button class="box" id="d1hall4" onclick="checkperiod1(this);"></button></td>
                          <td><button class="box" id="d1hall5" onclick="checkperiod1(this);"></button></td>
                            <td><button class="box" id="d1hall6" onclick="checkperiod1(this);"></button></td>
                              <td><button  class="box" id="d1hall7" onclick="checkperiod1(this);"></button></td>
                                <td><button class="box" id="d1hall8" onclick="checkperiod1(this);"></button></td>
                </tr>
                <tr>
                  <td><h4><center>Old Cse Lab</center></h4></td>
                  <td><button class="box" id="oldcse0" onclick="checkperiod1(this);"></button></td>
                  <td><button class="box" id="oldcse1" onclick="checkperiod1(this);"></button></td>
                    <td><button class="box" id="oldcse2" onclick="checkperiod1(this);"></button></td>
                      <td><button class="box" id="oldcse3" onclick="checkperiod1(this);"></button></td>
                        <td><button class="box" id="oldcse4" onclick="checkperiod1(this);"></button></td>
                          <td><button class="box" id="oldcse5" onclick="checkperiod1(this);"></button></td>
                            <td><button class="box" id="oldcse6" onclick="checkperiod1(this);"></button></td>
                              <td><button  class="box" id="oldcse7" onclick="checkperiod1(this);"></button></td>
                                <td><button class="box" id="oldcse8" onclick="checkperiod1(this);"></button></td>
                </tr>
                <tr>
                  <td><h4><center>New Cse Lab</center></h4></td>
                  <td><button class="box" id="newcse0" onclick="checkperiod1(this);"></button></td>
                  <td><button class="box" id="newcse1" onclick="checkperiod1(this);"></button></td>
                    <td><button class="box" id="newcse2" onclick="checkperiod1(this);"></button></td>
                      <td><button class="box" id="newcse3" onclick="checkperiod1(this);"></button></td>
                        <td><button class="box" id="newcse4" onclick="checkperiod1(this);"></button></td>
                          <td><button class="box" id="newcse5" onclick="checkperiod1(this);"></button></td>
                            <td><button class="box" id="newcse6" onclick="checkperiod1(this);"></button></td>
                              <td><button  class="box" id="newcse7" onclick="checkperiod1(this);"></button></td>
                                <td><button class="box" id="newcse8" onclick="checkperiod1(this);"></button></td>
                </tr>
                <tr>
                  <td><h4><center>Movable</center></h4></td>
                  <td><button class="box" id="movable0" onclick="checkperiod1(this);"></button></td>
                  <td><button class="box" id="movable1" onclick="checkperiod1(this);"></button></td>
                    <td><button class="box" id="movable2" onclick="checkperiod1(this);"></button></td>
                      <td><button class="box" id="movable3" onclick="checkperiod1(this);"></button></td>
                        <td><button class="box" id="movable4" onclick="checkperiod1(this);"></button></td>
                          <td><button class="box" id="movable5" onclick="checkperiod1(this);"></button></td>
                            <td><button class="box" id="movable6" onclick="checkperiod1(this);"></button></td>
                              <td><button  class="box" id="movable7" onclick="checkperiod1(this);"></button></td>
                                <td><button class="box" id="movable8" onclick="checkperiod1(this);"></button></td>
                </tr>
                </table>


              <!--



                        $ts=time();
                        $date1=date_create("$date $time_ref[$i]");
                        $date2=strtotime(date_format($date1,"Y/m/d H:i"));
                        if($ts-$date2>7200){
                          $type="disabled";
                          $op=0.7;






                -->

</div>
</div>
</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
