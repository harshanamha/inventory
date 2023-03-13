<?php

$con=mysqli_connect("localhost","root","","inventory");


$dnote=$_POST["dNote"];
$date=$_POST["date"];
$stype=$_POST["saletype"];
$type=$_POST["type"];
$bulk=$_POST["bulk"];
$qty=$_POST["qty"];
$sono=$_POST["soNo"];
$pono=$_POST["poNo"];
$dis=$_POST["cash_dis"];
$draft=$_POST["draft"];
$amount=$_POST["amount"];
$dname=$_POST["dname"];
$vno=$_POST["vNo"];


$sql = "INSERT INTO stores (delivery_note, date, type, sale_type, bulk_bag, qty, soNo, poNo, dis, draft, amount, diverName, vehicleNo,restqty)
VALUES ('$dnote','$date','$type','$stype','$bulk','$qty','$sono','$pono','$dis','$draft',$amount,'$dname','$vno','$qty')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("New Delivery Note Added successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}


?>