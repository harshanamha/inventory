<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$date=$_POST["date"];
$invoice=$_POST["invoice"];
$saletype=$_POST["saletype"];
$cheque=$_POST["cheque"];
$amount=$_POST["amount"];
$helper=$_POST["helper"];
$restamount=$_POST["restamount"];
$rest= $restamount - $amount;
$status = 'NOT DONE';

if($rest === 0) {
	$status = 'DONE';
}

$sql1 = "UPDATE sales SET restamount='$rest',status='$status'
	 WHERE id='$id'";

$con->query($sql1);


	 
	 $sql = "INSERT INTO invoice (dnote_id, date, invoice, method,chequeno,amount,helper)
     VALUES ('$id', '$date', '$invoice', '$saletype','$cheque', '$amount', '$helper')";

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("New Invoice created successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }








?>