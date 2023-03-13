<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","","inventory");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$x = $_REQUEST["term"];



    // Prepare a select statement
	

	
$cityResult= mysqli_query($link,"SELECT i.*,h.name as hname,s.* FROM invoice as i, sales as s, hardware as h WHERE i.dnote_id = s.id AND s.hardware = h.id AND i.invoice = '$x' ");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);
    
	
	 if($row){
                // Fetch result rows as an associative array
                
					echo  $row["id"] ;
                    echo  '+' ;
                    echo  $row["date"] ;
					echo  '+' ;
					echo  $row["invoice"] ;
					echo  '+' ;
					echo  $row["method"] ;
					echo  '+' ;
					echo  $row["chequeno"] ;
					echo  '+' ;
					echo  $row["amount"] ;
					echo  '+' ;
					echo  $row["helper"] ;
					echo  '+' ;
					echo  $row["hname"] ;
					echo  '+' ;
					echo  $row["delivery_Note"] ;
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




    

