<?php

$con=mysqli_connect("localhost","root","","inventory");


$number=$_POST["number"];
$type=$_POST["vtype"];


$cityResult= mysqli_query($con,"SELECT * FROM vehicle where number='$number'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if(!$row){
$sql = "INSERT INTO vehicle (number,type)
VALUES ('$number','$type')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("New Vehicle created successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
} else{
	echo '<script language="javascript">';
     echo 'alert("This Vehicle is already Added")';
     echo '</script>';
	
}


?>