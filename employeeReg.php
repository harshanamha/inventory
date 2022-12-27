<?php

$con=mysqli_connect("localhost","root","","inventory");


$date=$_POST["date"];
$type=$_POST["type"];
$tel1=$_POST["tel1"];
$tel2=$_POST["tel2"];
$address=$_POST["address"];
$name=$_POST["name"];

$cityResult= mysqli_query($con,"SELECT * FROM employee where name='$name'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if(!$row){
$sql = "INSERT INTO employee (date,name,designation,address,tp1,tp2)
VALUES ('$date','$name','$type','$address','$tel1','$tel2')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("New Employee created successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
} else{
	echo '<script language="javascript">';
     echo 'alert("This Employee is already Added")';
     echo '</script>';
	
}


?>