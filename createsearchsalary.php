
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$fdate=$_POST["fdate"];
$tdate=$_POST["tdate"];
$emp=$_POST["emp"];
$totalsal = 0;

	
$select = mysqli_query($conn,"SELECT * 
FROM `salary` 
where date between '$fdate' and '$tdate' 
AND drivername = '$emp'");

$select1 = mysqli_query($conn,"SELECT * 
FROM `salary`
where date between '$fdate' and '$tdate' 
AND helper1name = '$emp'");

$select2 = mysqli_query($conn,"SELECT * 
FROM `salary`
where date between '$fdate' and '$tdate' 
AND helper2name = '$emp'");

 echo "<h1 style='text-align: center;'>". $emp ." Salary Report" . "</h1>";
 echo "<h2 style='text-align: center;'>". "From :" ."&nbsp;&nbsp;". $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:"."&nbsp;&nbsp;". $tdate. "</h2>";

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
echo'<th>'."Date".'</th>';
echo'<th>'."Employee Name".'</th>';
echo'<th>'."Delivery Note No".'</th>';
echo'<th>'."Position".'</th>';
echo'<th>'."Salary".'</th>';
echo'</tr>';


	
	while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
		
		$totalsal = $totalsal + $row["driversalary"];
	
	echo'<tr>';
	echo'<td>'.$row["date"].'</td>';
	echo'<td>'.$row["drivername"].'</td>';
	echo'<td>'.$row["delivery_Note"].'</td>';
	echo'<td>'."Driver".'</td>';
	echo'<td>'.$row["driversalary"].'</td>';
	echo'</tr>';
		
}

while($row = mysqli_fetch_array($select1,MYSQLI_BOTH)){
	
	$totalsal = $totalsal + $row["helper1salary"];
	
	echo'<tr>';
	echo'<td>'.$row["date"].'</td>';
	echo'<td>'.$row["helper1name"].'</td>';
	echo'<td>'.$row["delivery_Note"].'</td>';
	echo'<td>'."Helper1".'</td>';
	echo'<td>'.$row["helper1salary"].'</td>';
	echo'</tr>';
		
}
while($row = mysqli_fetch_array($select2,MYSQLI_BOTH)){
	
	$totalsal = $totalsal + $row["helper1salary"];
	
	echo'<tr>';
	echo'<td>'.$row["date"].'</td>';
	echo'<td>'.$row["helper2name"].'</td>';
	echo'<td>'.$row["delivery_Note"].'</td>';
	echo'<td>'."Helper2".'</td>';
	echo'<td>'.$row["helper2salary"].'</td>';
	echo'</tr>';
		
}	

echo'<tr>';
	echo'<td>'.'<b>'. 'TOTAL'.'</b>'. '</td>';
	echo'<td>'."". '</td>';
	echo'<td>'."". '</td>';
	echo'<td>'."". '</td>';
	echo'<td>'.'<b>'.$totalsal.'</b>'.'</td>';
	echo'</tr>';	


echo'</tabl>';


?>