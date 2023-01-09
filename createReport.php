
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$fdate=$_POST["fdate"];
$tdate=$_POST["tdate"];
$city=$_POST["city"];
$hardwareid=$_POST["hardwareid"];
$type=$_POST["type"];



if($city and $hardwareid and $type) {
	
$cityResult= mysqli_query($conn,"SELECT * FROM city where name='$city'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];

$hardwareResult= mysqli_query($conn,"SELECT * FROM hardware where name='$hardwareid'");
$hardwarerow = mysqli_fetch_array($hardwareResult,MYSQLI_BOTH);

$hid = $hardwarerow["id"];
echo "<h1 style='text-align: center;'>" ."Sells Summary Report" . "</h1>";
echo "<h2 style='text-align: center;'>". "From :" ."&nbsp;&nbsp;". $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate. "</h2>";
echo "<h2 style='text-align: center;'>". "Hardware Name: :" ."&nbsp;&nbsp;". $hardwareid ."&nbsp;&nbsp;"."&nbsp;&nbsp;City:"."&nbsp;&nbsp;". $city. "</h2>";
echo "<h2 style='text-align: center;'>". "Type: :" ."&nbsp;&nbsp;". $type . "</h2>";

$qty = 0;
$fqty = 0;
$total=0.00;
$dicount=0.00;
	
$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN stores st ON s.delivery_Note = st.delivery_note
where s.date between '$fdate' and '$tdate' 
AND s.hardware = '$hid' 
AND st.type = '$type' AND h.city = '$cid'");

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	 $qty = $qty + $row["sqty"];
	 $fqty = $fqty + $row["freeqty"];
	 $total =  $total + $row["total"];
	 $dicount =  $dicount + $row["discount"];
	
}
echo "<br>";

echo '<style type="text/css">
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
   width: 50%;
  position: relative;
  left: 400px;
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


echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Sell Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $qty   .'</td>'. "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Free Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $fqty  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Qty:&nbsp;&nbsp;" . '</td>'.'<td>' . ($qty+$fqty)   .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Income:&nbsp;&nbsp;" . '</td>'.'<td>' . $total .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Dicount:&nbsp;&nbsp;" .'</td>'.'<td>' . $dicount .'</td>'.  "</h2>";
echo '</tr>';
echo '</table>';

}  
else if($city AND $type ) {
	
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
  width: 50%;
  position: relative;
  left: 400px;
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


echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Sell Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $qty   .'</td>'. "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Free Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $fqty  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Qty:&nbsp;&nbsp;" . '</td>'.'<td>' . ($qty+$fqty)   .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Income:&nbsp;&nbsp;" . '</td>'.'<td>' . $total .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Dicount:&nbsp;&nbsp;" .'</td>'.'<td>' . $dicount .'</td>'.  "</h2>";
echo '</tr>';
echo '</table>';



}

else if($hardwareid AND $type ) {
	
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
  width: 50%;
  position: relative;
  left: 400px;
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


echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Sell Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $qty   .'</td>'. "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Free Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $fqty  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Qty:&nbsp;&nbsp;" . '</td>'.'<td>' . ($qty+$fqty)   .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Income:&nbsp;&nbsp;" . '</td>'.'<td>' . $total .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Dicount:&nbsp;&nbsp;" .'</td>'.'<td>' . $dicount .'</td>'.  "</h2>";
echo '</tr>';
echo '</table>';



}
 else if($city and $hardwareid) {
	
	$hardwareResult= mysqli_query($conn,"SELECT * FROM hardware where name='$hardwareid'");
$hardwarerow = mysqli_fetch_array($hardwareResult,MYSQLI_BOTH);

$hid = $hardwarerow["id"];

$cityResult= mysqli_query($conn,"SELECT * FROM city where name='$city'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];

$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN stores st ON s.delivery_Note = st.delivery_note
where s.date between '$fdate' and '$tdate' 
AND s.hardware = '$hid' 
AND h.city = '$cid'");


$qty = 0;
$fqty = 0;
$total=0.00;
$dicount=0.00;

echo "<h1 style='text-align: center;'>" ."Sells Summary Report" . "</h1>";
	 echo "<h2 style='text-align: center;'>". "From :" ."&nbsp;&nbsp;". $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate. "</h2>";
	 echo "<h2 style='text-align: center;'>". "Hardware Name :" ."&nbsp;&nbsp;". $hardwareid ."&nbsp;&nbsp;"."&nbsp;&nbsp;City:"."&nbsp;&nbsp;". $city. "</h2>";	 
	echo'<br>';

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	 $qty = $qty + $row["sqty"];
	 $fqty = $fqty + $row["freeqty"];
	 $total =  $total + $row["total"];
	 $dicount =  $dicount + $row["discount"];
	
}

echo '<style type="text/css">
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
  position: relative;
  left: 400px;
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


echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Sell Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $qty  . '</td>'. "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Free Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $fqty  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . ($qty+$fqty)  . '</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Income:&nbsp;&nbsp;" .'</td>'.'<td>' . $total  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Dicount:&nbsp;&nbsp;" .'</td>'.'<td>' . $dicount  .'</td>'.  "</h2>";
echo '</tr>';
echo '</table>';


}
else{
	
	$hardwareResult= mysqli_query($conn,"SELECT * FROM hardware where name='$hardwareid'");
$hardwarerow = mysqli_fetch_array($hardwareResult,MYSQLI_BOTH);

$hid = $hardwarerow["id"];

$cityResult= mysqli_query($conn,"SELECT * FROM city where name='$city'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];

if($type || $city || $hardwareid){
	
$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN stores st ON s.delivery_Note = st.delivery_note
where s.date between '$fdate' and '$tdate' 
AND (s.hardware = '$hid' 
OR st.type = '$type' OR h.city = '$cid')");

} else {
	$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN stores st ON s.delivery_Note = st.delivery_note
where s.date between '$fdate' and '$tdate'");
	
}


echo "<h1 style='text-align: center;'>" ."Sells Summary Report" . "</h1>";
	 echo "<h2 style='text-align: center;'>". "From :" . $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:". $tdate. "</h2>";

if($type){	


	 echo "<h2 style='text-align: center;'>". "Type :" . $type ."</h2>";
} else if($hardwareid) {
	
	 echo "<h2 style='text-align: center;'>". "Hardware Name :" . $hardwareid ."</h2>";
	
} else if($city){
	
	 echo "<h2 style='text-align: center;'>". "City :" . $city ."</h2>";
	
}

	echo "<br>";
	 
	 $qty = 0;
	 $fqty = 0;
	 $total=0.00;
	 $dicount=0.00;

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	$qty = $qty + $row["sqty"];
	 $fqty = $fqty + $row["freeqty"];
	 $total =  $total + $row["total"];
	 $dicount =  $dicount + $row["discount"];
	 
	 
	
}

echo "<br>";

echo '<style type="text/css">
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
   width: 50%;
  position: relative;
  left: 400px;
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


echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Sell Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $qty  . '</td>'. "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Free Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $fqty  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . ($qty+$fqty)  . '</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Income:&nbsp;&nbsp;" .'</td>'.'<td>' . $total  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Dicount:&nbsp;&nbsp;" .'</td>'.'<td>' . $dicount  .'</td>'.  "</h2>";
echo '</tr>';
echo '</table>';
}





?>

