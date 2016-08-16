<?php
session_start();
if (isset($_SESSION['id'])) {

    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];

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
   <link rel="stylesheet" type="text/css" href="for_index.css">
   <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

   <script type="text/javascript" src="in_head.js"></script>
 </head>
 <body>
   <form action="logout.php" method="post">
     <button id="log_out"  class="btn btn-primary" onclick="window.location='logout.php'">
         <i class="fa fa-btn fa-sign-in"></i> Logout
     </button></form>
   <div class="container">

     <div class="row" style="height:150px;"></div>
     <div class="row"><center><h1>LCD PORTAL</h1></center></div>
     <hr>
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
               <div class="panel panel-default">
                     <div class="panel-body">
                           <form action="date.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
                 <div class="form-group">
                               <label for="username" class="col-md-4 control-label">Choose date</label>
                               <div class="col-md-4">
                                  <input type="date" class="form-control" name="date">
                                 </div>
                              </div>



                              <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                     <button type="submit" class="btn btn-primary">
                                         <i class="fa fa-btn fa-sign-in"></i> Next
                                     </button>
                                 </div>
                             </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>

     <script src="js/bootstrap.min.js"></script>

   <script type="text/javascript" src="js/in_body.js"></script>
 </body>
</html>
