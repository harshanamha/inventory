<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$date=$_POST["date"];
$invoice=$_POST["invoice"];
$saletype=$_POST["saletype"];
$cheque=$_POST["cheque"];
$amount=$_POST["amount"];
$amount1=$_POST["amount1"];
$helper=$_POST["helper"];
$restamount=$_POST["restamount"];


if($amount !== $amount1){
	
$rest= $restamount - ($amount-$amount1);
$status = 'NOT DONE';

if($rest === 0) {
	$status = 'DONE';
}

$sql1 = "UPDATE sales SET restamount='$rest',status='$status'
	 WHERE id='$id'";

$con->query($sql1);
	
} 


 $sql = "UPDATE invoice SET date='$date',invoice='$invoice',method='$saletype',chequeno='$cheque',amount='$amount',helper='$helper' 
	 WHERE id='$id'";
     

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Updated Invoice successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }


?>