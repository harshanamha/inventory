<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$hname=$_POST["hname"];
$address=$_POST["address"];
$city=$_POST["city"];
$contact=$_POST["contact"];

$cityResult= mysqli_query($con,"SELECT * FROM city where name='$city'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if($row>0){
	
	 $cid = $row["id"];
	 
	 $sql = "UPDATE hardware SET Name='$hname',Address='$address',City='$cid',Contact='$contact' 
	 WHERE id='$id'";
     

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Updated Hardware successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }

} else {
	
	echo "Please registar City Before Registar Hardware";	
	
}






?>