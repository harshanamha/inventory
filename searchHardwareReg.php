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
	
	$cityResult= mysqli_query($link,"SELECT h.*,c.name as cname FROM hardware as h , city as c where h.city = c.id And h.name = '$x' ");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);
    
	
	 if($row){
                // Fetch result rows as an associative array
                
					echo  $row["id"] ;
                    echo  '+' ;
                    echo  $row["name"] ;
                    echo  '+' ;
                    echo  $row["address"] ;
					echo  '+' ;
					echo  $row["cname"] ;
					echo  '+' ;
					echo  $row["contact"] ;
                
            } else{
                echo "<p>Not Registar This City</p>";
            }
     

 
// close connection
mysqli_close($link);
?>




    

