<!DOCTYPE html>
<?php 
 session_start();

if($_SESSION['status']!="Active")
{
    header("location:index.html");
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:  black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  width: 80%;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=date],input[type=number],div.sel {
  width: 40%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

div.a {
position: relative;
left: 550px;
top: -90px;
}

div.left {
position: relative;
left: 550px;
top: -270px;
}

div.footer {
position: relative;
left: 0px;
top: -270px;
}


div.b, hr.b {
position: relative;

top: -90px;
}



input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
 position: relative;
 left:240px;
  background-color: #3ca9e2;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
  
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
  position: relative;
  left: 100px;

top: -90px;
}

</style>
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<form action="cityReg.php" method="post"">
  <div class="container">
    <h2>Register Employee</h2>
    <hr>

	<label for="email"><b>Join Date</b></label><br>
    <input type="date" name="date" id="date" required>
	<br>
	
	<div class = "c">
    <label for="psw"><b>Destination</b></label><br>
	<div class="sel">
    <select name="type" id="type"  style = "width: 150px">
  <option value="Cash Sale">Driver</option>
  <option value="Cheque Sale">Helper</option>
</select>
	</div>
	</div>
	
	<label for="email"><b>Telephone 1</b></label><br>
    <input type="text" placeholder="Telephone 1" name="tel1" id="tel1" required>
	<br>
	
	<div class = "left">
	 <label for="email"><b>Employee Name</b></label><br>
    <input type="text" placeholder="City Name" name="city" id="city" required>
	<br>
	
	 <label for="email"><b>Address</b></label><br>
    <input type="text" placeholder="City Name" name="address" id="address" required>
	<br>
	
	 <label for="email"><b>Telephone 2</b></label><br>
    <input type="text" placeholder="Telephone 2" name="tel2" id="tel2" required>
	<br>
	
	</div>
	
	<div class="footer">
	
    <hr>

    <button type="submit" class="registerbtn">Create Employee</button>
 
  </div>
  
  
  </div>
</form>

</div>


</body>
</html>
