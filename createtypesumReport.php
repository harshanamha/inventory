
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$fdate=$_POST["fdate"];
$tdate=$_POST["tdate"];
$city=$_POST["city"];
$hardwareid=$_POST["hardwareid"];
$type=$_POST["type"];


if($city) {
	
	$cityResult= mysqli_query($conn,"SELECT * FROM city where name='$city'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];
	
$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN stores st ON s.delivery_Note = st.delivery_note
where s.date between '$fdate' and '$tdate' 
AND st.type = '$type' AND h.city = '$cid'");

 $qty = 0;
 $fqty = 0;
 $total= 0.00;
 $dicount = 0.00;
 echo "<h1 style='text-align: center;'>" ."Sells Summary Report" . "</h1>";
 echo "<h2 style='text-align: center;'>". "From :" ."&nbsp;&nbsp;". $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate. "</h2>";
 echo "<h2 style='text-align: center;'>". "City Name :" ."&nbsp;&nbsp;". $city ."&nbsp;&nbsp;"."&nbsp;&nbsp;Type:"."&nbsp;&nbsp;". $type. "</h2>";

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	  
	  $qty = $qty + $row["sqty"];
	 $fqty = $fqty + $row["freeqty"];
	 $total =  $total + $row["total"];
	 $dicount =  $dicount + $row["discount"];
	
}
echo '<br>';

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
echo'<th>'."City Name".'</th>';
echo'<th>'."Total Qty".'</th>';
echo'<th>'."Free Qty".'</th>';
echo'<th>'."Total Discount".'</th>';
echo'<th>'."Total Income".'</th>';
echo'</tr>';


	
	echo'<tr>';
	echo'<td>'.$city.'</td>';
	echo'<td>'.$qty.'</td>';
	echo'<td>'.$fqty.'</td>';
	echo'<td>'.$dicount.'</td>';
	echo'<td>'.$total.'</td>';
	echo'</tr>';
		


echo'</tabl>';



}

else if($hardwareid) {
	
$hardwareResult= mysqli_query($conn,"SELECT * FROM hardware where name='$hardwareid'");
$hardwarerow = mysqli_fetch_array($hardwareResult,MYSQLI_BOTH);

$hid = $hardwarerow["id"];
	
$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN stores st ON s.delivery_Note = st.delivery_note
where s.date between '$fdate' and '$tdate' 
AND s.hardware = '$hid' 
AND st.type = '$type'");

 $qty = 0;
 $fqty = 0;
 $total= 0.00;
 $dicount = 0.00;
 echo "<h1 style='text-align: center;'>" ."Sells Summary Report" . "</h1>";
 echo "<h2 style='text-align: center;'>". "From :" ."&nbsp;&nbsp;". $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate. "</h2>";
 echo "<h2 style='text-align: center;'>". "City Name :" ."&nbsp;&nbsp;". $city ."&nbsp;&nbsp;"."&nbsp;&nbsp;Type:"."&nbsp;&nbsp;". $type. "</h2>";

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	  
	  $qty = $qty + $row["sqty"];
	 $fqty = $fqty + $row["freeqty"];
	 $total =  $total + $row["total"];
	 $dicount =  $dicount + $row["discount"];
	
}
echo '<br>';

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
echo'<th>'."Total Qty".'</th>';
echo'<th>'."Free Qty".'</th>';
echo'<th>'."Total Discount".'</th>';
echo'<th>'."Total Income".'</th>';
echo'</tr>';


	
	echo'<tr>';
	echo'<td>'.$hardwareid.'</td>';
	echo'<td>'.$qty.'</td>';
	echo'<td>'.$fqty.'</td>';
	echo'<td>'.$dicount.'</td>';
	echo'<td>'.$total.'</td>';
	echo'</tr>';
		


echo'</tabl>';

}




?>