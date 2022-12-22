<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];

 
	$sql = "DELETE FROM hardware WHERE id='$id'";
     

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Delete Hardware successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }








?>