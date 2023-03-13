<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$dnote=$_POST["dNote"];
$date=$_POST["date"];
$stype=$_POST["saletype"];
$type=$_POST["type"];
$bulk=$_POST["bulk"];
$qty=$_POST["qty"];
$tqty=$_POST["tqty"];
$rqty=$_POST["rqty"];
$sono=$_POST["soNo"];
$pono=$_POST["poNo"];
$dis=$_POST["cash_dis"];
$draft=$_POST["draft"];
$amount=$_POST["amount"];
$dname=$_POST["dname"];
$vno=$_POST["vNo"];

$total = $qty - $tqty;
$newrest = $rqty + $total;



 $sql = "UPDATE stores SET delivery_note='$dnote',date='$date',type='$type',sale_type='$stype',bulk_bag='$bulk',qty='$qty',soNo='$sono',poNo='$pono',dis='$dis',draft='$draft',amount='$amount',diverName='$dname',vehicleNo='$vno',restqty='$newrest' 
	 WHERE id='$id'";
     

     if ($con->query($sql) === TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Updated Delivery Note successfully")';
     echo '</script>';
    } else {
     echo "Error: " . $sql . "<br>" . $con->error;
    }


?>