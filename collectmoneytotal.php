
<?php

$conn=mysqli_connect("localhost","root","","inventory");




	


echo "<h1 style='text-align: center;'>" . "Collect Total Money Hardware Wise" . "</h1>";
echo "<h2 style='text-align: center;'>". "Status :" . "NOT DONE" . "</h2>";





$select = mysqli_query($conn,"SELECT h.name as hname,SUM(s.restamount) as rest
FROM `sales` as s,`hardware` as h
where s.hardware = h.id AND s.status = 'NOT DONE'
GROUP BY s.hardware");


 
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
echo'<th>'."Total Rest Amount ".'</th>';
echo'</tr>';

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	echo'<tr>';
	echo'<td>'.$row["hname"].'</td>';
	echo'<td>'.$row["rest"].'</td>';
	echo'</tr>';
		
}

echo'</tabl>';
echo'</div>';


?>

