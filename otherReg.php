<?php

$con=mysqli_connect("localhost","root","","inventory");


$date=$_POST["date"];
$dis=$_POST["dis"];
$cost=$_POST["cost"];


	 
	 $sql = "INSERT INTO other(date, discription, cost)
     VALUES ('$date', '$dis', '$cost')";

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("New Record created successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }








?>