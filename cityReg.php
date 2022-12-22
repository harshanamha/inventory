<?php

$con=mysqli_connect("localhost","root","","inventory");


$city=$_POST["city"];

$cityResult= mysqli_query($con,"SELECT * FROM city where name='$city'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if(!$row){
$sql = "INSERT INTO city (name)
VALUES ('$city')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("New City created successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
} else{
	echo '<script language="javascript">';
     echo 'alert("This City is already Added")';
     echo '</script>';
	
}


?>