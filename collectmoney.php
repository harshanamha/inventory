
<?php

$conn=mysqli_connect("localhost","root","","inventory");




	


echo "<h1 style='text-align: center;'>" . "Collect Money Report" . "</h1>";
echo "<h2 style='text-align: center;'>". "Status :" . "NOT DONE" . "</h2>";





$select = mysqli_query($conn,"SELECT h.name as hname,s.*
FROM `sales` as s,`hardware` as h
where s.hardware = h.id AND s.status = 'NOT DONE'");


 
echo '<style type="text/css">
#customers {
	overflow: scroll;
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

echo'<div style="overflow-y:auto;">';
echo '<table border=1px id="customers">';
echo'<tr>';
echo'<th>'."Hardware Name".'</th>';
echo'<th>'."Delivery Note ".'</th>';
echo'<th>'."Invoice".'</th>';
echo'<th>'."Qty".'</th>';
echo'<th>'."Free Qty".'</th>';
echo'<th>'."Unit Price".'</th>';
echo'<th>'."Discount".'</th>';
echo'<th>'."Total".'</th>';
echo'<th>'."Paid Amount".'</th>';
echo'<th>'."Rest Amount".'</th>';
echo'</tr>';

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	echo'<tr>';
	echo'<td>'.$row["hname"].'</td>';
	echo'<td>'.$row["delivery_Note"].'</td>';
	echo'<td>'.$row["invno"].'</td>';
	echo'<td>'.$row["sqty"].'</td>';
	echo'<td>'.$row["freeqty"].'</td>';
	echo'<td>'.$row["unit"].'</td>';
	echo'<td>'.$row["discount"].'</td>';
	echo'<td>'.$row["total"].'</td>';
	echo'<td>'.$row["total"] - $row["restamount"].'</td>';
	echo'<td>'.$row["restamount"].'</td>';
	echo'</tr>';
		
}

echo'</tabl>';
echo'</div>';


?>

