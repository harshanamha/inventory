<?php

$con=mysqli_connect("localhost","root","","inventory");


$type=$_POST["type"];

$cityResult= mysqli_query($con,"SELECT * FROM type where name='$type'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if(!$row){
$sql = "INSERT INTO type (name)
VALUES ('$type')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("New Type created successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
} else{
	echo '<script language="javascript">';
     echo 'alert("This Type is already Added")';
     echo '</script>';
	
}


?>