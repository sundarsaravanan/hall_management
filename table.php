<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['code'])&&  isset($_SESSION['year'])&& isset($_SESSION['section'])) {
  $usname = $_SESSION['usname'];
  $date=$_SESSION['date'];
  include_once("dbconnect.php");
}
else {
  header("Location: home.php");
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
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker({ minDate: 0 ,
        beforeShowDay: noSunday ,maxDate: 20,
       dateFormat: 'dd-mm-yy'

});
  });

  function noSunday(date){
            var day = date.getDay();
                        return [(day > 0), ''];
        };
  </script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
  <style>
  label {
    display: inline-block;
    width: 5em;
  }
  </style>

</head>
<body onload="bas('<?php echo $usname;?>');" style="background-color:#ffffff;">


  <div class="container-fluid">
    <div class="row" style="border-bottom:1px solid black;padding-bottom:20px;margin-bottom:30px;background-color:#ffffff;">
      <div class="col-lg-2">
        <button type="button" class="btn btn-primary " style="float:left;margin-top:30px;font-size:18px;" onclick="window.location='logout.php'"> Logout
        </button>
      </div>
      <div class="col-lg-8"style="margin-top:20px;"><center><h2 style="letter-spacing:5px;font-family:serif;font-size:25px;color:#000000;">BOOKING</h2></center></div>
      <div class="col-lg-2">

        <button type="button" class="btn btn-primary " style="float:right;margin-top:30px;" onclick="window.location='home.php'">  <span class="glyphicon glyphicon-home" aria-hidden="true"
            style="font-size: 20px;"></span>
        </button>

      </div>
    </div>


    <div class="row">
      <div class="col-lg-5 col-lg-offset-7">
        <form  action="table.php"  method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
            <div class="col-lg-5 col-lg-offset-2">
             <input  autocomplete="off" id="datepicker" class="form-control" name="date" placeholder="Choose Date" value="<?php echo $_SESSION['date']?>">
</div>
<div class="col-lg-3 col-lg-offset-1">
            <button type="submit" class="btn btn-primary" style="font-size:20px;" onclick="datestore1();">
              <i class="fa fa-btn fa-sign-in"></i> Check
            </button>
          </div>
      </form>
    </div>
  </div>
  <br>
  <div class="row"  >
    <div class="col-lg-12" >
      <br>
            <center>  <table class="timetab">
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
                  <td class="tab_row"><h3><center>D1 Hall</center></h3></td>
                  <td><button class="box"  id="d1hall0" onclick="checkperiod1(this);">-</button></td>
                  <td><button class="box" id="d1hall1" onclick="checkperiod1(this);">-</button></td>
                    <td><button class="box" id="d1hall2" onclick="checkperiod1(this);">-</button></td>
                      <td><button class="box" id="d1hall3" onclick="checkperiod1(this);">-</button></td>
                        <td><button class="box" id="d1hall4" onclick="checkperiod1(this);">-</button></td>
                          <td><button class="box" id="d1hall5" onclick="checkperiod1(this);">-</button></td>
                            <td><button class="box" id="d1hall6" onclick="checkperiod1(this);">-</button></td>
                              <td><button  class="box" id="d1hall7" onclick="checkperiod1(this);">-</button></td>
                                <td><button class="box" id="d1hall8" onclick="checkperiod1(this);">-</button></td>
                </tr>
                <tr>
                  <td class="tab_row"><h3><center>New Cse Lab</center></h3></td>
                  <td><button class="box" id="newcse0" onclick="checkperiod1(this);">-</button></td>
                  <td><button class="box" id="newcse1" onclick="checkperiod1(this);">-</button></td>
                    <td><button class="box" id="newcse2" onclick="checkperiod1(this);">-</button></td>
                      <td><button class="box" id="newcse3" onclick="checkperiod1(this);">-</button></td>
                        <td><button class="box" id="newcse4" onclick="checkperiod1(this);">-</button></td>
                          <td><button class="box" id="newcse5" onclick="checkperiod1(this);">-</button></td>
                            <td><button class="box" id="newcse6" onclick="checkperiod1(this);">-</button></td>
                              <td><button  class="box" id="newcse7" onclick="checkperiod1(this);">-</button></td>
                                <td><button class="box" id="newcse8" onclick="checkperiod1(this);">-</button></td>
                </tr>
                <tr>
                  <td class="tab_row"><h3><center>Old Cse Lab 1 & 2</center></h3></td>
                  <td><button class="box" id="oldcse10" onclick="checkperiod1(this);">-</button></td>
                  <td><button class="box" id="oldcse11" onclick="checkperiod1(this);">-</button></td>
                    <td><button class="box" id="oldcse12" onclick="checkperiod1(this);">-</button></td>
                      <td><button class="box" id="oldcse13" onclick="checkperiod1(this);">-</button></td>
                        <td><button class="box" id="oldcse14" onclick="checkperiod1(this);">-</button></td>
                          <td><button class="box" id="oldcse15" onclick="checkperiod1(this);">-</button></td>
                            <td><button class="box" id="oldcse16" onclick="checkperiod1(this);">-</button></td>
                              <td><button  class="box" id="oldcse17" onclick="checkperiod1(this);">-</button></td>
                                <td><button class="box" id="oldcse18" onclick="checkperiod1(this);">-</button></td>
                </tr>

                <tr>
                  <td class="tab_row"><h3><center>Old Cse Lab 1 & 2</center></h3></td>
                  <td><button class="box" id="oldcse20" onclick="checkperiod1(this);">-</button></td>
                  <td><button class="box" id="oldcse21" onclick="checkperiod1(this);">-</button></td>
                    <td><button class="box" id="oldcse22" onclick="checkperiod1(this);">-</button></td>
                      <td><button class="box" id="oldcse23" onclick="checkperiod1(this);">-</button></td>
                        <td><button class="box" id="oldcse24" onclick="checkperiod1(this);">-</button></td>
                          <td><button class="box" id="oldcse25" onclick="checkperiod1(this);">-</button></td>
                            <td><button class="box" id="oldcse26" onclick="checkperiod1(this);">-</button></td>
                              <td><button  class="box" id="oldcse27" onclick="checkperiod1(this);">-</button></td>
                                <td><button class="box" id="oldcse28" onclick="checkperiod1(this);">-</button></td>
                </tr>
              </table></center>
</div>
</div>
</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
