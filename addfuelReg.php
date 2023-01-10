<?php

$con=mysqli_connect("localhost","root","","inventory");


$date=$_POST["date"];
$number=$_POST["number"];
$qty=$_POST["qty"];
$delivernote=$_POST["delivernote"];
$dn=$_POST["dn"];
$cost=$_POST["cost"];

$sql = "INSERT INTO fuel (date,number,deliverynote,drivername,qty,cost)
VALUES ('$date','$number','$delivernote','$dn','$qty','$cost')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("Fuel Record Add successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}



?>