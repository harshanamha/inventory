<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","","inventory");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$x = $_REQUEST["term"];
$pieces = explode("/", $x);
$y = $pieces[0]; 
$p = $pieces[1];



$cityResult= mysqli_query($link,"SELECT * FROM hardware where name='$p'");
$hardwarerow = mysqli_fetch_array($cityResult,MYSQLI_BOTH);	

$hid = $hardwarerow["id"];


    // Prepare a select statement
	

	
$cityResult= mysqli_query($link,"SELECT s.*,h.name as hname FROM sales as s, hardware as h WHERE s.hardware = h.id AND s.delivery_Note = '$y' AND s.hardware = '$hid' ");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);
    
	
	 if($row){
                // Fetch result rows as an associative array
                
					echo  $row["id"] ;
                    echo  '+' ;
                    echo  $row["date"] ;
					echo  '+' ;
					echo  $row["hname"] ;
					echo  '+' ;
					echo  $row["delivery_Note"] ;
					echo  '+' ;
					echo  $row["qty"] ;
					echo  '+' ;
					echo  $row["freeqty"] ;
					echo  '+' ;
					echo  $row["unit"] ;
					echo  '+' ;
					echo  $row["discount"] ;
					echo  '+' ;
					echo  $row["total"] ;
					echo  '+' ;
					echo  $row["date1"] ;
					echo  '+' ;
					echo  $row["invoice1"] ;
					echo  '+' ;
					echo  $row["amount1"] ;
					echo  '+' ;
					echo  $row["date2"] ;
					echo  '+' ;
					echo  $row["invoice2"] ;
					echo  '+' ;
					echo  $row["amount2"] ;
					echo  '+' ;
					echo  $row["date3"] ;
					echo  '+' ;
					echo  $row["invoice3"] ;
					echo  '+' ;
					echo  $row["amount3"] ;
					echo  '+' ;
					echo  $row["date4"] ;
					echo  '+' ;
					echo  $row["invoice4"] ;
					echo  '+' ;
					echo  $row["amount4"] ;
					echo  '+' ;
					echo  $row["date5"] ;
					echo  '+' ;
					echo  $row["invoice5"] ;
					echo  '+' ;
					echo  $row["amount5"] ;
					echo  '+' ;
					echo  $row["restamount"] ;
					echo  '+' ;
					echo  $row["status"] ;
					
					
					
            } else{
                echo "<p>Not Registar This City</p>";
            }
     

 
// close connection
mysqli_close($link);
?>




    

