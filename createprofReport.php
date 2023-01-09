
<?php

$conn=mysqli_connect("localhost","root","","inventory");

$fdate=$_POST["fdate"];
$tdate=$_POST["tdate"];


	
	$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s,`hardware` as h
where date between '$fdate' and '$tdate'");	

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

echo "<h1 style='text-align: center;'>" ."Profit Summary Report" . "</h1>";
	 echo "<h2 style='text-align: center;'>". "From :" . $fdate ."&nbsp;&nbsp;"."&nbsp;&nbsp;To:". $tdate. "</h2>";
	 
	 $qty = 0;
	 $fqty = 0;
	 $total=0.00;

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
	 $qty = $qty + $row["sqty"]+ $row["freeqty"];
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


?>

