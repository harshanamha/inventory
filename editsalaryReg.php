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


	
$cityResult= mysqli_query($link,"SELECT * FROM salary  WHERE date = '$y' AND delivery_Note = '$p'");
$row = mysqli_fetch_array($cityResult,MYSQLI_BOTH);
    
	
	 if($row){
                // Fetch result rows as an associative array
                
					echo  $row["id"] ;
                    echo  '+' ;
                    echo  $row["date"] ;
					echo  '+' ;
					echo  $row["delivery_Note"] ;
					echo  '+' ;
					echo  $row["drivername"] ;
					echo  '+' ;
					echo  $row["driversalary"] ;
					echo  '+' ;
					echo  $row["helper1name"] ;
					echo  '+' ;
					echo  $row["helper1salary"] ;
					echo  '+' ;
					echo  $row["helper2name"] ;
					echo  '+' ;
					echo  $row["helper2salary"] ;
					
					
            } else{
                echo "<p>Not Registar This City</p>";
            }
     

 
// close connection
mysqli_close($link);
?>




    

