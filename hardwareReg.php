<?php

$con=mysqli_connect("localhost","root","","inventory");


$hname=$_POST["hname"];
$address=$_POST["address"];
$city=$_POST["city"];
$contact=$_POST["contact"];

$cityResult= mysqli_query($con,"SELECT * FROM city where name='$city'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if($row>0){
	
	 $id = $row["id"];
	 
	 $sql = "INSERT INTO hardware (Name, Address, City, Contact)
     VALUES ('$hname', '$address', '$id', '$contact')";

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("New Hardware created successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }

} else {
	
	echo "Please registar City Before Registar Hardware";	
	
}






?>