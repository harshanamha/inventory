<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$date=$_POST["date"];
$delivernote1=$_POST["delivernote1"];
$dn=$_POST["dn"];
$ds=$_POST["ds"];
$hp1=$_POST["hp1"];
$hs1=$_POST["hs1"];
$hp2=$_POST["hp2"];
$hs2=$_POST["hs2"];



$sql = "UPDATE salary SET date='$date',delivery_Note='$delivernote1',drivername='$dn',driversalary='$ds',helper1name='$hp1',helper1salary='$hs1',helper2name='$hp2',helper2salary='$hs2'
	 WHERE id='$id'";
     

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Updated Sales successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }
 

?>