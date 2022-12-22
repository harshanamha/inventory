
<?php

$conn=mysqli_connect("localhost","root","","inventory");

//$x = $_REQUEST["term"];
//$pieces = explode("/", $x);
//$y = $pieces[0]; 
//$p = $pieces[1];

$y=$_POST["dno"];
$p=$_POST["hname"];


	
$hardwareResult= mysqli_query($conn,"SELECT * FROM hardware where name='$p'");
$hardwarerow = mysqli_fetch_array($hardwareResult,MYSQLI_BOTH);	

$hid = $hardwarerow["id"];

	
$saleResult= mysqli_query($conn,"SELECT * FROM sales where delivery_Note='$y' and hardware = '$hid' ");
$salerow = mysqli_fetch_array($saleResult,MYSQLI_BOTH);	

$sid = $salerow["id"];
$total = $salerow["total"];
$rest = $salerow["restamount"];
$status = $salerow["status"];

echo "<h2 style='text-align: center;'>". "Delivery Note No :" . $y ."&nbsp;&nbsp;"."&nbsp;&nbsp;Hardware:". $p. "</h2>";
echo "<h2 style='text-align: center;'>". "Total :" . $total ."&nbsp;&nbsp;"."&nbsp;&nbsp;Rest Amount:". $rest. "</h2>";
echo "<h2 style='text-align: center;'>". "Status :&nbsp;&nbsp;" . $status. "</h2>";



	
$select = mysqli_query($conn,"SELECT i.* FROM invoice as i WHERE i.dnote_id ='$sid'");

echo '<style type="text/css">
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>';


echo '<table border=1px id="customers">';
echo'<tr>';
echo'<th>'."Date".'</th>';
echo'<th>'."Invoice No".'</th>';
echo'<th>'."Payment Method".'</th>';
echo'<th>'."Cheque No".'</th>';
echo'<th>'."Amount".'</th>';
echo'<th>'."Helper".'</th>';
echo'</tr>';

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	echo'<tr>';
	echo'<td>'.$row["date"].'</td>';
	echo'<td>'.$row["invoice"].'</td>';
	echo'<td>'.$row["method"].'</td>';
	echo'<td>'.$row["chequeno"].'</td>';
	echo'<td>'.$row["amount"].'</td>';
	echo'<td>'.$row["helper"].'</td>';
	echo'</tr>';
		
}

echo'</tabl>';


?>

