<?php
  session_start();
  if (isset($_SESSION['id'])) {
        $usname = $_SESSION['usname'];
      	$date=$_SESSION['date'];
      	include_once("dbconnect.php");
        $periodid=$_POST["period"];
        $hall=$_POST["hall"];
        $room=$_POST["room"];
        $code=$_SESSION['code'];
        $year=$_SESSION['year'];
        $section=$_SESSION['section'];

        $sql="select staffid from booking where date='$date' and lcd_type='$hall' and periodid='$periodid'";
        $query = mysqli_query($dbCon, $sql);
$row=mysqli_fetch_row($query);
$present=$row[0];

if($present=="0"){
  if($hall=="movable"){
    $sql = "update booking set staffid='$usname', code='$code',year='$year',section='$section',venue='$room' where date='$date' and lcd_type='$hall' and periodid='$periodid'";
    $query = mysqli_query($dbCon, $sql);
  }
  else{
  $sql = "update booking set staffid='$usname', code='$code',year='$year',section='$section' where date='$date' and lcd_type='$hall' and periodid='$periodid'";
  $query = mysqli_query($dbCon, $sql);
}



}
else{
  echo "same";
}

  }
  else {
        header("Location: index.php");
  }
?>
