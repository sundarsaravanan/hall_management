<?php
session_start();
if (isset($_SESSION['id'])) {

    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
    //echo "welcome $usname<br>";
	//date_default_timezone_set('Asia/Calcutta');
	//echo "The time is " . date("h:i:sa") ."<br>";
	//echo  date('d-m-Y') . "<br>";

   
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
<meta charset="UTF-8">
<title>LOGIN</title>
<link href="custom.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Orbitron:900' rel='stylesheet' type='text/css'>
</head>
 
<body>
    <form action="logout.php" method="post">
<button type="submit">LOG OUT</button>
</form>
<div id="wrapper">
<h1>KAMARAJ COLLEGE OF ENGINEERING AND TECHNOLOGY<br><BR><BR><BR>CHOOSE DATE<BR><BR> </h1>
<form id="form" action="date.php" method="post" enctype="multipart/form-data">
<select name="date">
    <?php 
   date_default_timezone_set('Asia/Calcutta');
    $i=0;
    while($i<=10)
    {
        $nextday = time() + ($i*24 * 60 * 60);
        $da=date('l',$nextday);
        if($da!="Sunday")
        {
        echo "<option>". date('d-m-Y', $nextday)."</option>";
        }
        $i++;
    }
    ?>
    </select>
<input type="submit" value="Next" name="Submit" />



</form>

</body>
</html>
 
 
 <?php
 
 ?>