<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$sid=$_POST["sid"];
$date=$_POST["date"];
$hardware=$_POST["hardwareid"];
$dn=$_POST["dNote"];
$qty=$_POST["qty"];
$qty1=$_POST["qty1"];
$fqty=$_POST["fqty"];
$fqty1=$_POST["fqty1"];
$rqty=$_POST["rqty"];
$uprice=$_POST["uprice"];
$dprice=$_POST["dprice"];
$total=$_POST["total"];
$total1=$_POST["total1"];
$rest=$_POST["rest"];
$status=$_POST["status"];
$inv=$_POST["inv"];

$nqty = $qty - $qty1;
$nfqty = $fqty - $fqty1;
$newrestam = $rqty - ($nqty + $nfqty);

$rsetamount=$total-$total1;

$newrest = $rest + $rsetamount;

if($newrest === 0) {
	$status = 'DONE';
}

$cityResult= mysqli_query($con,"SELECT * FROM hardware where name='$hardware'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if($row>0){
	$hid = $row["id"];
	
	$sql1 = "UPDATE stores SET restqty='$newrestam'
	 WHERE id='$sid'";

$con->query($sql1);

$sql = "UPDATE sales SET date='$date',hardware='$hid',delivery_Note='$dn',invno='$inv',sqty='$qty',freeqty='$fqty',unit='$uprice',discount='$dprice',total='$total',restamount='$newrest',status='$status'
	 WHERE id='$id'";
	 
     

      if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Updated Invoice successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }
	
} else {
	
	echo "Please registar This Hardware Before Record Sales";	
	
}




    

?>