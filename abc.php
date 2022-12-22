
<?php

$con=mysqli_connect("localhost","root","","inventory");

$username=$_POST["fname"];
$pw=$_POST["password"];

$result = mysqli_query($con,"SELECT * FROM user where UserName='$username' and Password='$pw'");
$row = mysqli_fetch_array($result,MYSQLI_BOTH);
if($row){
	session_start();
$_SESSION['status'] = "Active";
	header('Location:home.php');
}
else
{
	echo "Invalid";
}
?>

