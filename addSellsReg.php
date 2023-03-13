<?php

$con=mysqli_connect("localhost","root","","inventory");


$id=$_POST["id"];
$date=$_POST["date"];
$dN=$_POST["dNote"];
$hardware=$_POST["hardwareid"];
$qty=$_POST["qty"];
$fqty=$_POST["fqty"];
$rqty=$_POST["rqty"];
$uprice=$_POST["uprice"];
$dprice=$_POST["dprice"];
$total=$_POST["total"];
$inv=$_POST["inv"];

$newrest = $rqty - ($qty + $fqty);

$cityResult= mysqli_query($con,"SELECT * FROM hardware where name='$hardware'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

if($row>0){
	$hardwareid = $row["id"];
	
	
	$sql1 = "UPDATE stores SET restqty='$newrest'
	 WHERE id='$id'";

$con->query($sql1);
	
	
	$sql = "INSERT INTO sales (date,hardware,delivery_Note,invno, sqty, freeqty, unit, discount, total,restamount,status)
VALUES ('$date',$hardwareid,'$dN','$inv','$qty','$fqty','$uprice','$dprice','$total','$total','NOT DONE')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("Sales Record Added successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
	
} else {
	
	echo "Please registar This Hardware Before Record Sales";	
	
}




    

?>