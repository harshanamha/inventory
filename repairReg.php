<?php

$con=mysqli_connect("localhost","root","","inventory");


$date=$_POST["date"];
$number=$_POST["number"];
$dis=$_POST["dis"];
$cost=$_POST["cost"];


	 
	 $sql = "INSERT INTO repair (date, number, discription, cost)
     VALUES ('$date', '$number', '$dis', '$cost')";

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("New Record created successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }








?>