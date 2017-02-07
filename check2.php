<?php
session_start();
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
  	$date=$_SESSION['date'];
  	include_once("dbconnect.php");
  	$result = "SELECT date FROM booking";
  	$result = mysqli_query($dbCon,$result);
  	$storeArray = Array();
  	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] =  $row['date'];
  	}
  	$j=count($storeArray);
  	for($i=0;$i<=$j;$i++)
  	{
    	if($storeArray[$i]==$date){
    	   $flag=0;
    	    break;
    	}
    	else{
    		  $flag=1;
  	  }
  	}
        date_default_timezone_set('Asia/Calcutta');
        $timestamp = strtotime($date);
        $day_ref=array("sunday","monday","tuesday","wednesday","thursday","friday","saturday");
        $day = date('w', $timestamp);
        if($flag==0){
  	    	header("Location: cancel.php");
  	}
  	else{
                $hall=array("d1hall","newcse","oldcse1","oldcse2");
                $per=array("test","I","II","III","IV","V","VI","VII","spcl");
                for ($i=0;$i<4;$i++){
                        $sql="select period0,period1,period2,period3,period4,period5,period6,period7,period8 from lab where day='$day_ref[$day]' and hall='$hall[$i]'";
      	                 $query = mysqli_query($dbCon, $sql);
      	                  $row= mysqli_fetch_row($query);
                          for($m=0;$m<9;$m++){
                                  $sql="insert into booking(date,lcd_type,periodid,staffid,venue) values('$date','$hall[$i]','$per[$m]',$row[$m],'$hall[$i]')";
                                  $query = mysqli_query($dbCon, $sql);
                          }
                  }
  	             header("Location: home.php");
        }
	}
	else {
    header("Location: index.php");
}
?>
