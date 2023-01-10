
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$fdate=$_POST["fdate"];
$tdate=$_POST["tdate"];


	
$select = mysqli_query($conn,"SELECT * 
FROM `repair` 
where date between '$fdate' and '$tdate'");

 echo "<h2 style='text-align: center;'>". "Repair Report". "</h2>";
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
echo'<th>'."Vehicle Number".'</th>';
echo'<th>'."Discription".'</th>';
echo'<th>'."Cost".'</th>';
echo'</tr>';


	
	while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	echo'<tr>';
	echo'<td>'.$row["date"].'</td>';
	echo'<td>'.$row["number"].'</td>';
	echo'<td>'.$row["discription"].'</td>';
	echo'<td>'.$row["cost"].'</td>';
	echo'</tr>';
		
}


echo'</tabl>';


?>