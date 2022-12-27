
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$fdate=$_POST["fdate"];
$tdate=$_POST["tdate"];
$city=$_POST["city"];



	
$cityResult= mysqli_query($conn,"SELECT * FROM city where name='$city'");
$cityrow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$cid = $cityrow["id"];

echo "<h1 style='text-align: center;'>" . "City Detail Report" . "</h1>";
echo "<h2 style='text-align: center;'>". "From :" . $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:". $tdate. "</h2>";
echo "<h2 style='text-align: center;'>". "City :&nbsp;&nbsp;" . $city. "</h2>";

if($cid){
$select = mysqli_query($conn,"SELECT c.name,sum(s.qty) as qty,sum(s.freeqty) as freeqty ,sum(s.discount) as discount ,sum(s.total) as total
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN city c ON c.id = h.city
where date between '$fdate' and '$tdate' AND h.city = '$cid'
Group BY h.city");
} else {
	$select = mysqli_query($conn,"SELECT c.name,sum(s.qty) as qty,sum(s.freeqty) as freeqty ,sum(s.discount) as discount ,sum(s.total) as total
FROM `sales` as s
INNER JOIN hardware h ON s.hardware = h.id
INNER JOIN city c ON c.id = h.city
where date between '$fdate' and '$tdate' 
Group BY h.city");
}

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

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	echo'<tr>';
	echo'<td>'.$row["name"].'</td>';
	echo'<td>'.$row["qty"].'</td>';
	echo'<td>'.$row["freeqty"].'</td>';
	echo'<td>'.$row["discount"].'</td>';
	echo'<td>'.$row["total"].'</td>';
	echo'</tr>';
		
}

echo'</tabl>';


?>

