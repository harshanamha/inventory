<?php

$con=mysqli_connect("localhost","root","","inventory");


$fname=$_POST["fname"];
$lname=$_POST["lname"];
$username=$_POST["username"];
$pw=$_POST["pw"];
$rpw=$_POST["rpw"];

if($pw != $rpw){
	
	echo "Password Not Match";
} else {

$sql = "INSERT INTO user (FirstName, LastName, UserName, Password)
VALUES ('$fname', '$lname', '$username', '$pw')";

if ($con->query($sql) === TRUE) {
  echo '<script language="javascript">';
     echo 'alert("New User created successfully")';
     echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

}
?>