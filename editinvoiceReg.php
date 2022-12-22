<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$total=$_POST["total"];
$date1=$_POST["date1"];
$date2=$_POST["date2"];
$date3=$_POST["date3"];
$date4=$_POST["date4"];
$date5=$_POST["date5"];
$invoice1=$_POST["invoice1"];
$invoice2=$_POST["invoice2"];
$invoice3=$_POST["invoice3"];
$invoice4=$_POST["invoice4"];
$invoice5=$_POST["invoice5"];
$amount1=$_POST["amount1"];
$amount2=$_POST["amount2"];
$amount3=$_POST["amount3"];
$amount4=$_POST["amount4"];
$amount5=$_POST["amount5"];

$status = 'NOT DONE';


$rest = $total - ($amount1+$amount2+$amount3+$amount4+$amount5);

if($rest===0) {
	$status = 'DONE';
}

$sql = "UPDATE sales SET date1='$date1',invoice1='$invoice1',amount1='$amount1',date2='$date2',invoice2='$invoice2',amount2='$amount2',date3='$date3',invoice3='$invoice3',amount3='$amount3',date4='$date4',invoice4='$invoice4',amount4='$amount4',date5='$date5',invoice5='$invoice5',amount5='$amount5',restamount='$rest',status='$status'
	 WHERE id='$id'";
     

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Updated Sales successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }
	

?>