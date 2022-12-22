
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$fdate=$_POST["fdate"];
$tdate=$_POST["tdate"];
$city=$_POST["city"];
$hardwareid=$_POST["hardwareid"];



if($fdate and $tdate and $city and $hardwareid) {
	
$cityResult= mysqli_query($conn,"SELECT * FROM city where name='$city'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];

$hardwareResult= mysqli_query($conn,"SELECT * FROM hardware where name='$hardwareid'");
$hardwarerow = mysqli_fetch_array($hardwareResult,MYSQLI_BOTH);

$hid = $hardwarerow["id"];
echo "<h1 style='text-align: center;'>" ."Summary Report" . "</h1>";
echo "<h2 style='text-align: center;'>". "From :" ."&nbsp;&nbsp;". $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate. "</h2>";
echo "<h2 style='text-align: center;'>". "Hardware Name: :" ."&nbsp;&nbsp;". $hardwareid ."&nbsp;&nbsp;"."&nbsp;&nbsp;City:"."&nbsp;&nbsp;". $city. "</h2>";

$qty = 0;
$fqty = 0;
$total=0.00;
$dicount=0.00;
	
$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s,`hardware` as h
where date between '$fdate' and '$tdate' 
AND hardware = '$hid' 
AND s.hardware = h.id AND h.city = '$cid'");

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	$qty = $qty + $row["qty"];
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

}  else if($fdate and $tdate and $city) {
	
	$cityResult= mysqli_query($conn,"SELECT * FROM city where name='$city'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];
	
$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s,`hardware` as h
where date between '$fdate' and '$tdate' 
AND s.hardware = h.id AND h.city = '$cid'");

 $qty = 0;
 $fqty = 0;
 $total=0.00;
 echo "<h1 style='text-align: center;'>" ."Summary Report" . "</h1>";
 echo "<h2 style='text-align: center;'>". "From :" ."&nbsp;&nbsp;". $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate."&nbsp;&nbsp;". "&nbsp;&nbsp;City:"."&nbsp;&nbsp;".$city. "</h2>";

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	  $qty = $qty + $row["qty"]+ $row["freeqty"];
	 $fqty = $fqty + $row["freeqty"];
	 $total =  $total + $row["total"];
	
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
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Sells Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $qty  . '</td>'. "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Income:&nbsp;&nbsp;" .'</td>'.'<td>' . $total  .'</td>'.  "</h2>";
echo '</tr>';
echo '</table>';



} else if($fdate and $tdate and $hardwareid) {
	
	$hardwareResult= mysqli_query($conn,"SELECT * FROM hardware where name='$hardwareid'");
$hardwarerow = mysqli_fetch_array($hardwareResult,MYSQLI_BOTH);

$hid = $hardwarerow["id"];

$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s,`hardware` as h
where date between '$fdate' and '$tdate' 
AND s.hardware = h.id
AND hardware = '$hid' ");

$qty = 0;
$fqty = 0;
$total=0.00;
$dicount=0.00;

echo "<h1 style='text-align: center;'>" ."Summary Report" . "</h1>";
	 echo "<h2 style='text-align: center;'>". "From :"."&nbsp;&nbsp;" . $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate ."&nbsp;&nbsp;". "&nbsp;&nbsp;Hardware Name:"."&nbsp;&nbsp;".$hardwareid. "</h2>";
	echo'<br>';

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	 $qty = $qty + $row["qty"];
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


}else{
	
	$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s,`hardware` as h
where date between '$fdate' and '$tdate' 
AND s.hardware = h.id");	

$select1 = mysqli_query($conn,"SELECT * 
FROM `stores`
where date between '$fdate' and '$tdate' ");

$bqty = 0;
$btotal = 0.00;

while($row1 = mysqli_fetch_array($select1,MYSQLI_BOTH)){
	 $bqty = $bqty + $row1["qty"];
	 $btotal =  $btotal + $row1["amount"];
	 
	
}



//$result = mysqli_fetch_array($select,MYSQLI_BOTH);	

echo "<h1 style='text-align: center;'>" ."Summary Report" . "</h1>";
	 echo "<h2 style='text-align: center;'>". "From :" . $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:". $tdate. "</h2>";
	 
	 $qty = 0;
	 $fqty = 0;
	 $total=0.00;

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	 $qty = $qty + $row["qty"]+ $row["freeqty"];
	 $fqty = $fqty + $row["freeqty"];
	 $total =  $total + $row["total"];
	 
	 
	
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
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Purchases Qty:&nbsp;&nbsp;".'</td>'.'<td>' . $bqty   .'</td>'. "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Sells Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . $qty  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Rest Qty:&nbsp;&nbsp;" .'</td>'.'<td>' . ($bqty-$qty)   .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo '<tr>';echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Cost:&nbsp;&nbsp;" .'</td>'.'<td>' . $btotal  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Income:&nbsp;&nbsp;" .'</td>'.'<td>' . $total  .'</td>'.  "</h2>";
echo '</tr>';
echo '<tr>';
echo "<h2 style='position: relative; left: 300px;'>".'<td>'."Total Profit:&nbsp;&nbsp;" .'</td>'.'<td>' . ($total-$btotal)  .'</td>'.  "</h2>";
echo '</tr>';
echo '</table>';
}





?>

