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
	
	$cityResult= mysqli_query($link,"SELECT * FROM employee where name = '$x' ");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);
    
	
	 if($row){
                // Fetch result rows as an associative array
                
					echo  $row["id"] ;
                    echo  '+' ;
                    echo  $row["delivery_note"] ;
                    echo  '+' ;
                    echo  $row["date"] ;
					echo  '+' ;
					echo  $row["sale_type"] ;
					echo  '+' ;
					echo  $row["bulk_bag"] ;
					echo  '+' ;
					echo  $row["qty"] ;
					echo  '+' ;
					echo  $row["soNo"] ;
					echo  '+' ;
					echo  $row["poNo"] ;
					echo  '+' ;
					echo  $row["dis"] ;
					echo  '+' ;
					echo  $row["draft"] ;
					echo  '+' ;
					echo  $row["amount"] ;
					echo  '+' ;
					echo  $row["diverName"] ;
					echo  '+' ;
					echo  $row["vehicleNo"] ;
                
            } else{
                echo "<p>Not Registar This City</p>";
            }
     

 
// close connection
mysqli_close($link);
?>




    

