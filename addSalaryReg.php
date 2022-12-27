<?php

$con=mysqli_connect("localhost","root","","inventory");


$date=$_POST["date"];
$dN=$_POST["delivernote"];
$driver=$_POST["dn"];
$dsal=$_POST["ds"];
$helper1=$_POST["hp1"];
$h1sal=$_POST["hs1"];
$helper2=$_POST["hp2"];
$h2sal=$_POST["hs2"];

	
	$sql = "INSERT INTO salary (date,delivery_Note, drivername, driversalary, helper1name, helper1salary, helper2name,helper2salary)
VALUES ('$date','$dN','$driver','$dsal','$helper1','$h1sal','$helper2','$h2sal')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("Salary Record Added successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
	





    

?>