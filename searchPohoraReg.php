<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","","teainventory");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$x = $_REQUEST["term"];

    // Prepare a select statement
	
	$cityResult= mysqli_query($link,"SELECT * FROM customers as c  where c.name = '$x' ");
$row1 = mysqli_fetch_array($cityResult,MYSQLI_BOTH);

$cusid = $row1["id"] ;


$pohoraResult= mysqli_query($link,"SELECT * FROM pohora as p  where p.cid = $cusid and p.pendingamount>0");
$row = mysqli_fetch_array($pohoraResult,MYSQLI_BOTH);
    
	
	 if($row){
                // Fetch result rows as an associative array
                
					echo  $row["id"] ;
                    echo  '+' ;
                    echo  $row["cid"] ;
                    echo  '+' ;
                    echo  $row["date"] ;
					echo  '+' ;
					echo  $row["amount"] ;
					echo  '+' ;
					echo  $row["date1"] ;
					echo  '+' ;
					echo  $row["installment1"] ;
					echo  '+' ;
					echo  $row["date2"] ;
					echo  '+' ;
					echo  $row["installment2"] ;
					echo  '+' ;
					echo  $row["date3"] ;
					echo  '+' ;
					echo  $row["installment3"] ;
					echo  '+' ;
					echo  $row["pendingamount"] ;
					echo  '+' ;
					echo  $row["status"] ;
                
            } else{
                echo "<p>Not Registar This Customer</p>";
            }
     

 
// close connection
mysqli_close($link);
?>




    

