
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$dN=$_POST["dNote"];


$cityResult= mysqli_query($conn,"SELECT * FROM sales where delivery_Note='$dN'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];

echo "<h1 style='text-align: center;'>" . "Delivery Note Report" . "</h1>";

echo "<h2 style='text-align: center;'>". "Delivery Note No :&nbsp;&nbsp;" . $dN. "</h2>";

$tqty = 0;
$tfqty = 0;
$tdis = 0;
$tin = 0;



	
$select = mysqli_query($conn,"SELECT h.name,s.*
FROM `sales` as s,`hardware` as h
where s.hardware = h.id AND delivery_Note='$dN' ");

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
echo'<th>'."Hardware Name".'</th>';
echo'<th>'."Date".'</th>';
echo'<th>'."Sell Qty".'</th>';
echo'<th>'."Free Qty".'</th>';
echo'<th>'."Unit Price".'</th>';
echo'<th>'."Discount".'</th>';
echo'<th>'."Income".'</th>';
echo'</tr>';

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	$tqty = $tqty + $row["sqty"];
	$tfqty = $tfqty + $row["freeqty"];
	$tdis = $tdis + $row["discount"];
	$tin = $tin + $row["total"] ;
	
	echo'<tr>';
	echo'<td>'.$row["name"].'</td>';
	echo'<td>'.$row["date"].'</td>';
	echo'<td>'.$row["sqty"].'</td>';
	echo'<td>'.$row["freeqty"].'</td>';
	echo'<td>'.$row["unit"].'</td>';
	echo'<td>'.$row["discount"].'</td>';
	echo'<td>'.$row["total"].'</td>';
	echo'</tr>';
		
}

echo'<tr>';
	echo'<td>'.'<b>'. 'TOTAL'.'</b>'.'</td>';
	echo'<td>'.'&nbsp;&nbsp;'.'</td>';
	echo'<td>'.'<b>'.$tqty.'</b>'.'</td>';
	echo'<td>'.'<b>'.$tfqty.'</b>'.'</td>';
	echo'<td>'.'&nbsp;&nbsp;'.'</td>';
	echo'<td>'.'<b>'.$tdis.'</b>'.'</td>';
	echo'<td>'.'<b>'.$tin.'</b>'.'</td>';
	echo'</tr>';

echo'</table>';

$sqty = $tqty + $tfqty;

$se = mysqli_query($conn,"SELECT d.qty as qty, d.amount as amount
FROM `stores` as d
where delivery_note='$dN' ");

$row = mysqli_fetch_array($se,MYSQLI_BOTH);


echo '<style type="text/css">
#customers1 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 40%;
}

#customers1 td, #customers1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers1 tr:nth-child(even){background-color: #f2f2f2;}

#customers1 tr:hover {background-color: #ddd;}

#customers1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>';

echo'<br>';
echo'<br>';
echo'<table border=1px id="customers1">';

echo'<tr>'.'<td>'.'Buy QTY:&nbsp;&nbsp;'.'</td><td>'. $row["qty"].'</td>'.'</tr>';

echo'<tr>'.'<td>'.'Sells QTY:&nbsp;&nbsp;'.'</td><td>'. $sqty.'</td>'.'</tr>';
echo'<tr>'.'<td>'.'Rest QTY:&nbsp;&nbsp;'.'</td><td>'. ($row["qty"] - $sqty).'</td>'.'</tr>';

echo'<br>';

echo'<tr>'.'<td>'.'Cost Amount:&nbsp;&nbsp;'.'</td><td>'. $row["amount"].'</td>'.'</tr>';
echo'<tr>'.'<td>'.'Sells Amount:&nbsp;&nbsp;'.'</td><td>'. $tin.'</td>'.'</tr>';
echo'<tr>'.'<td>'.'Profit:&nbsp;&nbsp;'. '&nbsp;&nbsp;'.'</td><td>'.($tin - $row["amount"] ).'</td>'.'</tr>';

echo'</table>';



?>

