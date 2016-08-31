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
<body onload="bas_lab();">

  <button id="log_out"  class="btn btn-primary" onclick="window.location='logout.php'">
    <i class="fa fa-btn fa-sign-in"></i> Logout
  </button>
  <button id="log_out"  class="btn btn-primary" onclick="window.location='table1.php'">
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


                         <center><table>

                <tr>
                  <b><td><h4><center>Venue</center></h4></td>
                  <td><h4><center>8.30  - 9.00 am</center></h4></td>
                  <td><h4><center>9.00  - 9.50 am</center></h4></td>
                  <td><h4><center>9.50  - 10.40 am</center></h4></td>
                  <td><h4><center>11.00  - 11.50 am</center></h4></td>
                  <td><h4><center>11.50  - 12.40 pm</center></h4></td>
                  <td><h4><center>1.30  - 2.20 pm</center></h4></td>
                  <td><h4><center>2.20  - 3.10 pm</center></h4></td>
                  <td><h4><center>3.10  - 4.00 pm</center></h4></td>
                  <td><h4><center>4.00  - 6.00 pm</center></h4></td>
                </tr>

                <tr>
                  <td><h4><center>Monday</center></h4></td>
                  <td><button class="box" id="monday0" onclick="checkperiod(this,'monday');"></button></td>
                  <td><button class="box" id="monday1" onclick="checkperiod(this,'monday');"></button></td>
                    <td><button class="box" id="monday2" onclick="checkperiod(this,'monday');"></button></td>
                      <td><button class="box" id="monday3" onclick="checkperiod(this,'monday');"></button></td>
                        <td><button class="box" id="monday4" onclick="checkperiod(this,'monday');"></button></td>
                          <td><button class="box" id="monday5" onclick="checkperiod(this,'monday');"></button></td>
                            <td><button class="box" id="monday6" onclick="checkperiod(this,'monday');"></button></td>
                              <td><button  class="box" id="monday7" onclick="checkperiod(this,'monday');"></button></td>
                                <td><button class="box" id="monday8" onclick="checkperiod(this,'monday');"></button></td>
                </tr>
                <tr>
                  <td><h4><center>Tuesday</center></h4></td>
                  <td><button class="box" id="tuesday0" onclick="checkperiod(this,'tuesday');"></button></td>
                  <td><button class="box" id="tuesday1" onclick="checkperiod(this,'tuesday');"></button></td>
                    <td><button class="box" id="tuesday2" onclick="checkperiod(this,'tuesday');"></button></td>
                      <td><button class="box" id="tuesday3" onclick="checkperiod(this,'tuesday');"></button></td>
                        <td><button class="box" id="tuesday4" onclick="checkperiod(this,'tuesday');"></button></td>
                          <td><button class="box" id="tuesday5" onclick="checkperiod(this,'tuesday');"></button></td>
                            <td><button class="box" id="tuesday6" onclick="checkperiod(this,'tuesday');"></button></td>
                              <td><button  class="box" id="tuesday7" onclick="checkperiod(this,'tuesday');"></button></td>
                                <td><button class="box" id="tuesday8" onclick="checkperiod(this,'tuesday');"></button></td>
                </tr>
                <tr>
                  <td><h4><center>Wednesday</center></h4></td>
                  <td><button class="box" id="wednesday0" onclick="checkperiod(this,'wednesday');"></button></td>
                  <td><button class="box" id="wednesday1" onclick="checkperiod(this,'wednesday');"></button></td>
                    <td><button class="box" id="wednesday2" onclick="checkperiod(this,'wednesday');"></button></td>
                      <td><button class="box" id="wednesday3" onclick="checkperiod(this,'wednesday');"></button></td>
                        <td><button class="box" id="wednesday4" onclick="checkperiod(this,'wednesday');"></button></td>
                          <td><button class="box" id="wednesday5" onclick="checkperiod(this,'wednesday');"></button></td>
                            <td><button class="box" id="wednesday6" onclick="checkperiod(this,'wednesday');"></button></td>
                              <td><button  class="box" id="wednesday7" onclick="checkperiod(this,'wednesday');"></button></td>
                                <td><button class="box" id="wednesday8" onclick="checkperiod(this,'wednesday');"></button></td>
                </tr>
                <tr>
                  <td><h4><center>Thursday</center></h4></td>
                  <td><button class="box" id="thursday0" onclick="checkperiod(this,'thursday');"></button></td>
                  <td><button class="box" id="thursday1" onclick="checkperiod(this,'thursday');"></button></td>
                    <td><button class="box" id="thursday2" onclick="checkperiod(this,'thursday');"></button></td>
                      <td><button class="box" id="thursday3" onclick="checkperiod(this,'thursday');"></button></td>
                        <td><button class="box" id="thursday4" onclick="checkperiod(this,'thursday');"></button></td>
                          <td><button class="box" id="thursday5" onclick="checkperiod(this,'thursday');"></button></td>
                            <td><button class="box" id="thursday6" onclick="checkperiod(this,'thursday');"></button></td>
                              <td><button  class="box" id="thursday7" onclick="checkperiod(this,'thursday');"></button></td>
                                <td><button class="box" id="thursday8" onclick="checkperiod(this,'thursday');"></button></td>
                </tr>
                <tr>
                  <td><h4><center>Friday</center></h4></td>
                  <td><button class="box" id="friday0" onclick="checkperiod(this,'friday');"></button></td>
                  <td><button class="box" id="friday1" onclick="checkperiod(this,'friday');"></button></td>
                    <td><button class="box" id="friday2" onclick="checkperiod(this,'friday');"></button></td>
                      <td><button class="box" id="friday3" onclick="checkperiod(this,'friday');"></button></td>
                        <td><button class="box" id="friday4" onclick="checkperiod(this,'friday');"></button></td>
                          <td><button class="box" id="friday5" onclick="checkperiod(this,'friday');"></button></td>
                            <td><button class="box" id="friday6" onclick="checkperiod(this,'friday');"></button></td>
                              <td><button  class="box" id="friday7" onclick="checkperiod(this,'friday');"></button></td>
                                <td><button class="box" id="friday8" onclick="checkperiod(this,'friday');"></button></td>
                </tr><tr>
                  <td><h4><center>Saturday</center></h4></td>
                  <td><button class="box" id="saturday0" onclick="checkperiod(this,'saturday');"></button></td>
                  <td><button class="box" id="saturday1" onclick="checkperiod(this,'saturday');"></button></td>
                    <td><button class="box" id="saturday2" onclick="checkperiod(this,'saturday');"></button></td>
                      <td><button class="box" id="saturday3" onclick="checkperiod(this,'saturday');"></button></td>
                        <td><button class="box" id="saturday4" onclick="checkperiod(this,'saturday');"></button></td>
                          <td><button class="box" id="saturday5" onclick="checkperiod(this,'saturday');"></button></td>
                            <td><button class="box" id="saturday6" onclick="checkperiod(this,'saturday');"></button></td>
                              <td><button  class="box" id="saturday7" onclick="checkperiod(this,'saturday');"></button></td>
                                <td><button class="box" id="saturday8" onclick="checkperiod(this,'saturday');"></button></td>
                </tr>
          </table></center>
        </div>
      </div>
    </div>


<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
