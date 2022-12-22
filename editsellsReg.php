<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$date=$_POST["date"];
$hardware=$_POST["hardwareid"];
$dn=$_POST["dNote"];
$qty=$_POST["qty"];
$fqty=$_POST["fqty"];
$uprice=$_POST["uprice"];
$dprice=$_POST["dprice"];
$total=$_POST["total"];

$cityResult= mysqli_query($con,"SELECT * FROM hardware where name='$hardware'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if($row>0){
	$hid = $row["id"];

$sql = "UPDATE sales SET date='$date',hardware='$hid',delivery_Note='$dn',qty='$qty',freeqty='$fqty',unit='$uprice',discount='$dprice',total='$total'
	 WHERE id='$id'";
     

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Updated Sales successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }
	
} else {
	
	echo "Please registar This Hardware Before Record Sales";	
	
}




    

?>