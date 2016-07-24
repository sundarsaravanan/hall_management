<?php
session_start();
if (isset($_SESSION['id'])) {

    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
	$date=$_SESSION['date'];
	include_once("dbconnect.php");
	
	$date = mysqli_real_escape_string($dbCon, $date);
	
    $sql = "SELECT id,per1,per2,per3,per4,per5,per6,per7 FROM class WHERE date='$date'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$id = $row[0];
	for($i=1;$i<8;$i++){
	$per[$i] = $row[$i];
    }
	
	$sql1 = "SELECT id,per1,per2,per3,per4,per5,per6,per7 FROM oldcse WHERE date='$date'";
	$query1 = mysqli_query($dbCon, $sql1);
	$row1 = mysqli_fetch_row($query1);
	$id1 = $row1[0];
	for($j=8,$i=1;$j<15,$i<8;$j++,$i++){
	$per[$j] = $row1[$i];
    }
	
	$sql2 = "SELECT id,per1,per2,per3,per4,per5,per6,per7 FROM newcse WHERE date='$date'";
	$query2 = mysqli_query($dbCon, $sql2);
	$row2 = mysqli_fetch_row($query2);
	$id2 = $row2[0];
	for($j=15,$i=1;$j<22,$i<8;$j++,$i++){
	$per[$j] = $row2[$i];
    }
	
	
	
	
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<head>


<link rel="stylesheet" href="custom.css">

</head>
<body>
<form action="home.php" method="post">
<button type="submit" class="home">HOME</button>
</form>
<form action="logout.php" method="post">
<button type="submit" class="logout_table">LOG OUT</button>
</form>
<div class="container">
<table>
    <tr>
        <td><a1><center>VENUE</center></a1></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td><a1><center>PERIOD 1</center></a1></td>
        <td><a1><center>PERIOD 2</center></a1></td>
        <td><a1><center>PERIOD 3</center></a1></td>
        <td><a1><center>PERIOD 4</center></a1></td>
        <td><a1><center>PERIOD 5</center></a1></td>
        <td><a1><center>PERIOD 6</center></a1></td>
        <td><a1><center>PERIOD 7</center></a1></td>
    </tr>
    <tr><td><br></td></tr>
<tr>
<td>
<a1><center>D1 HALL</center></a1>
</td>
	<td></td>
<?php
for($i=1;$i<8;$i++){
echo "<td>";
if($per[$i]=='available'){
	$id='box';
	}elseif($per[$i]==$usname){
		$id='green';
		}else{
			$id='red';
		}
		
if($per[$i]=='available'){
	$action='book_period.php';
	}else{
		$action='cancel_period.php';
		}
        
if($per[$i]=='available'){
    $button='AVAILABLE';
    }elseif($per[$i]==$usname){
        $button='BOOKED BY<br>YOU';
        }else{
            $button='BOOKED BY <BR>'.strtoupper($per[$i]);
            }      

	echo '<form action='.$action.' method="post" enctype="multipart/form-data">';
    echo '<input class="hidden" name="cell" value='.$i.' >';
	echo '<button id='.$id.' type="submit">'.$button.'</button>';
	echo "</form>";
echo "</td>";
}
?>






</tr>

<tr>
	<td><a1><center>OLD CSE LAB</center></a1>
		</td>
        <td></td>
        
<?php
for($i=8;$i<15;$i++){
echo "<td>";
if($per[$i]=='available'){
	$id='box';
	}elseif($per[$i]==$usname){
		$id='green';
		}else{
			$id='red';
		}
		
if($per[$i]=='available'){
	$action='book_period.php';
	}else{
		$action='cancel_period.php';
		}
        
if($per[$i]=='available'){
    $button='AVAILABLE';
    }elseif($per[$i]==$usname){
        $button='BOOKED BY<br>YOU';
        }else{
            $button='BOOKED BY <BR>'.strtoupper($per[$i]);
            }      

	echo '<form action='.$action.' method="post" enctype="multipart/form-data">';
	echo '<input class="hidden" name="cell" value='.$i.' >';
    echo '<button id='.$id.' type="submit">'.$button.'</button>';
	echo "</form>";
echo "</td>";
}
?>
	
</tr>


<tr>
	<td><a1><center>NEW CSE LAB</center></a1>
		</td>
	<td></td>
	
<?php
for($i=15;$i<22;$i++){
echo "<td>";
if($per[$i]=='available'){
	$id='box';
	}elseif($per[$i]==$usname){
		$id='green';
		}else{
			$id='red';
		}
		
if($per[$i]=='available'){
	$action='book_period.php';
	}else{
		$action='cancel_period.php';
		}
        
if($per[$i]=='available'){
    $button='AVAILABLE';
    }elseif($per[$i]==$usname){
        $button='BOOKED BY<br>YOU';
        }else{
            $button='BOOKED BY <BR>'.strtoupper($per[$i]);
            }      

	echo '<form action='.$action.' method="post" enctype="multipart/form-data">';
    echo '<input class="hidden" name="cell" value='.$i.' >';
	echo '<button id='.$id.' type="submit">'.$button.'</button>';
	echo "</form>";
echo "</td>";
}
?>




</tr>




</table>



</div>
</body>

</html>


