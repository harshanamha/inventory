<?php
require('fpdf/fpdf.php');
// Database Connection 
$conn=mysqli_connect("localhost","root","","inventory");
//Check for connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}
// Select data from MySQL database
$select = mysqli_query($conn,"SELECT * 
FROM `sales` as s,`hardware` as h
where date between '2022-05-01' and '2022-06-01' 
AND s.hardware = h.id");	

//$result = mysqli_fetch_array($select,MYSQLI_BOTH);	
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

while($row = mysqli_fetch_array($select,MYSQLI_BOTH)){
	
  $id = $row->id;
  $pdf->Cell(20,10,$row["total"],1);
  $pdf->Ln();

}
$pdf->Output();
?>