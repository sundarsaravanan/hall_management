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
  <div class="row" style="border-bottom:1px solid black;padding-bottom:20px;margin-bottom:30px;background-color:#ffffff;">
    <div class="col-sm-2">
      <button type="button" class="btn btn-primary " style="float:left;margin-top:30px;font-size:18px;margin-left:40px;" onclick="window.location='logout.php'"> Logout
      </button>
    </div>
    <div class="col-sm-8"style="margin-top:20px;"><center><h2 style="letter-spacing:5px;font-family:serif;font-size:25px;color:#000000;">ADMIN PORTAL</h2></center></div>
    <div class="col-sm-2">

      <button type="button" class="btn btn-primary " style="float:right;margin-top:30px;margin-right:20px;" onclick="window.location='settings.php'">  <span class="glyphicon glyphicon-cog" aria-hidden="true"
          style="font-size: 20px;"></span>
      </button>
      <button type="button" class="btn btn-primary " style="float:right;margin-top:30px;margin-right:20px;font-size:20px;" onclick="window.location='log.php'">  Log
      </button>

    </div>
  </div>

    <div class="row" style="margin-bottom:40px;">
      <div class="col-sm-4 col-sm-offset-8">
        <form action="lab.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
            <div class="col-sm-6">
              <select class="form-control" name="hall" >
                  <option <?php if($_SESSION['hall']=="oldcse") echo 'selected="selected"'; ?>>Select Hall</option>
                  <option value="newcse" <?php if($_SESSION['hall']=="newcse") echo 'selected="selected"'; ?>>Cse Lab 2</option>
                  <option value="d1hall" <?php if($_SESSION['hall']=="d1hall") echo 'selected="selected"'; ?>>D1 Hall</option>
                  <option value="oldcse1" <?php if($_SESSION['hall']=="oldcse1") echo 'selected="selected"'; ?>>Cse Lab 1(1&2)</option>
                  <option value="oldcse2" <?php if($_SESSION['hall']=="oldcse2") echo 'selected="selected"'; ?>>Cse Lab 1(3&4)</option>
					      </select>
               </div>
          <div class="col-sm-6">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-sign-in"></i> Check
            </button>
        </div>
      </form>
    </div>
  </div>

  <div class="row"  >
    <div class="col-sm-12 " >


                         <center><table class="timetab">

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
                  <td class="tab_row"><h3><center>Monday</center></h3></td>
                  <td><button class="box" id="monday0" onclick="checkperiod(this,'monday');">-</button></td>
                  <td><button class="box" id="monday1" onclick="checkperiod(this,'monday');">-</button></td>
                    <td><button class="box" id="monday2" onclick="checkperiod(this,'monday');">-</button></td>
                      <td><button class="box" id="monday3" onclick="checkperiod(this,'monday');">-</button></td>
                        <td><button class="box" id="monday4" onclick="checkperiod(this,'monday');">-</button></td>
                          <td><button class="box" id="monday5" onclick="checkperiod(this,'monday');">-</button></td>
                            <td><button class="box" id="monday6" onclick="checkperiod(this,'monday');">-</button></td>
                              <td><button  class="box" id="monday7" onclick="checkperiod(this,'monday');">-</button></td>
                                <td><button class="box" id="monday8" onclick="checkperiod(this,'monday');">-</button></td>
                </tr>
                <tr>
                  <td class="tab_row"><h3><center>Tuesday</center></h3></td>
                  <td><button class="box" id="tuesday0" onclick="checkperiod(this,'tuesday');">-</button></td>
                  <td><button class="box" id="tuesday1" onclick="checkperiod(this,'tuesday');">-</button></td>
                    <td><button class="box" id="tuesday2" onclick="checkperiod(this,'tuesday');">-</button></td>
                      <td><button class="box" id="tuesday3" onclick="checkperiod(this,'tuesday');">-</button></td>
                        <td><button class="box" id="tuesday4" onclick="checkperiod(this,'tuesday');">-</button></td>
                          <td><button class="box" id="tuesday5" onclick="checkperiod(this,'tuesday');">-</button></td>
                            <td><button class="box" id="tuesday6" onclick="checkperiod(this,'tuesday');">-</button></td>
                              <td><button  class="box" id="tuesday7" onclick="checkperiod(this,'tuesday');">-</button></td>
                                <td><button class="box" id="tuesday8" onclick="checkperiod(this,'tuesday');">-</button></td>
                </tr>
                <tr>
                  <td class="tab_row"><h3><center>Wednesday</center></h3></td>
                  <td><button class="box" id="wednesday0" onclick="checkperiod(this,'wednesday');">-</button></td>
                  <td><button class="box" id="wednesday1" onclick="checkperiod(this,'wednesday');">-</button></td>
                    <td><button class="box" id="wednesday2" onclick="checkperiod(this,'wednesday');">-</button></td>
                      <td><button class="box" id="wednesday3" onclick="checkperiod(this,'wednesday');">-</button></td>
                        <td><button class="box" id="wednesday4" onclick="checkperiod(this,'wednesday');">-</button></td>
                          <td><button class="box" id="wednesday5" onclick="checkperiod(this,'wednesday');">-</button></td>
                            <td><button class="box" id="wednesday6" onclick="checkperiod(this,'wednesday');">-</button></td>
                              <td><button  class="box" id="wednesday7" onclick="checkperiod(this,'wednesday');">-</button></td>
                                <td><button class="box" id="wednesday8" onclick="checkperiod(this,'wednesday');">-</button></td>
                </tr>
                <tr>
                  <td class="tab_row"><h3><center>Thursday</center></h3></td>
                  <td><button class="box" id="thursday0" onclick="checkperiod(this,'thursday');">-</button></td>
                  <td><button class="box" id="thursday1" onclick="checkperiod(this,'thursday');">-</button></td>
                    <td><button class="box" id="thursday2" onclick="checkperiod(this,'thursday');">-</button></td>
                      <td><button class="box" id="thursday3" onclick="checkperiod(this,'thursday');">-</button></td>
                        <td><button class="box" id="thursday4" onclick="checkperiod(this,'thursday');">-</button></td>
                          <td><button class="box" id="thursday5" onclick="checkperiod(this,'thursday');">-</button></td>
                            <td><button class="box" id="thursday6" onclick="checkperiod(this,'thursday');">-</button></td>
                              <td><button  class="box" id="thursday7" onclick="checkperiod(this,'thursday');">-</button></td>
                                <td><button class="box" id="thursday8" onclick="checkperiod(this,'thursday');">-</button></td>
                </tr>
                <tr>
                  <td class="tab_row"><h3><center>Friday</center></h3></td>
                  <td><button class="box" id="friday0" onclick="checkperiod(this,'friday');">-</button></td>
                  <td><button class="box" id="friday1" onclick="checkperiod(this,'friday');">-</button></td>
                    <td><button class="box" id="friday2" onclick="checkperiod(this,'friday');">-</button></td>
                      <td><button class="box" id="friday3" onclick="checkperiod(this,'friday');">-</button></td>
                        <td><button class="box" id="friday4" onclick="checkperiod(this,'friday');">-</button></td>
                          <td><button class="box" id="friday5" onclick="checkperiod(this,'friday');">-</button></td>
                            <td><button class="box" id="friday6" onclick="checkperiod(this,'friday');">-</button></td>
                              <td><button  class="box" id="friday7" onclick="checkperiod(this,'friday');">-</button></td>
                                <td><button class="box" id="friday8" onclick="checkperiod(this,'friday');">-</button></td>
                </tr><tr>
                  <td class="tab_row"><h3><center>Saturday</center></h3></td>
                  <td><button class="box" id="saturday0" onclick="checkperiod(this,'saturday');">-</button></td>
                  <td><button class="box" id="saturday1" onclick="checkperiod(this,'saturday');">-</button></td>
                    <td><button class="box" id="saturday2" onclick="checkperiod(this,'saturday');">-</button></td>
                      <td><button class="box" id="saturday3" onclick="checkperiod(this,'saturday');">-</button></td>
                        <td><button class="box" id="saturday4" onclick="checkperiod(this,'saturday');">-</button></td>
                          <td><button class="box" id="saturday5" onclick="checkperiod(this,'saturday');">-</button></td>
                            <td><button class="box" id="saturday6" onclick="checkperiod(this,'saturday');">-</button></td>
                              <td><button  class="box" id="saturday7" onclick="checkperiod(this,'saturday');">-</button></td>
                                <td><button class="box" id="saturday8" onclick="checkperiod(this,'saturday');">-</button></td>
                </tr>
          </table></center>
        </div>
      </div>
    </div>


<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/in_body.js"></script>
</body>
</html>
