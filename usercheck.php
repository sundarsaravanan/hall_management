<?php
    $uid=$_GET['id'];
	include_once("dbconnect.php");
	$query = "select username from staff where username like '". $uid."'";
	$result = mysqli_query($dbCon, $query)
	or die('Error querying database.');
    $row = mysqli_fetch_row($result);
	$id = $row[0];
    if($uid==$row[0])
        echo "found";
    else
        echo "not found";
	mysqli_close($dbCon);

    ?>
