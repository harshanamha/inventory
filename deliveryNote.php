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
input[type=text], input[type=password], input[type=date],div.sel, input[type=number] {
  width: 25%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

div.a {
position: relative;
left: 350px;
top: -88px;
}

div.c {
position: relative;
left: 700px;
top: -180px;
}

div.d {
position: relative;
left: 0px;
top: -380px;
}

div.e {
position: relative;
left: 0px;
top: -570px;
}

div.f {
position: relative;
left: 0px;
top: -750px;
}

div.b, hr.b {
position: relative;

top: -190px;
}



input[type=text]:focus, input[type=password]:focus, input[type=date]:focus, input[type=number]:focus, div.sel {
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

<form action="deliveryNoteReg.php" method="post"">
  <div class="container">
    <h2>Delivery Note</h2>
    <hr>
	

    <label for="email"><b>Delivery Note No</b></label><br>
    <input type="text" placeholder="Delivery Note No" name="dNote" id="dNote" required>
	<br>
	
	<div class = "a">
    <label for="psw"><b>Date</b></label><br>
    <input type="date" placeholder="" name="date" id="date" required>
	</div>
	
	<div class = "c">
    <label for="psw"><b>Type of Sale</b></label><br>
	<div class="sel">
    <select name="saletype" id="saletype"  style = "width: 150px">
  <option value="Cash Sale">Cash Sale</option>
  <option value="Cheque Sale">Cheque Sale</option>
</select>
	</div>
	</div>
	
	<div class= "b">
    <label for="psw"><b>Bulk Or Bag</b></label><br>
    <div class="sel">
    <select name="bulk" id="bulk"  style = "width: 150px">
	<option value="Bag">Bag</option>
    <option value="Bulk">Bulk</option>
</select>
	</div>
	

    <div class = "a">
    <label for="psw"><b>Qty</b></label><br>
    <input type="text" placeholder="Qty" name="qty" id="qty" required>
	</div>
	
	<div class = "c">
    <label for="psw"><b>S.O.No</b></label><br>
    <input type="text" placeholder="S.O.No" name="soNo" id="soNo">
	</div>
	</div>
	
	<div class= "d">
    <label for="psw"><b>Cust.P.O.No</b></label><br>
    <input type="text" placeholder="Cust.P.O.No" name="poNo" id="poNo" >
	

    <div class = "a">
    <label for="psw"><b>Cash Dis</b></label><br>
   <div class="sel">
    <select name="cash_dis" id="cash_dis"  style = "width: 150px">
	<option value="Y">Y</option>
    <option value="N">N</option>
</select>
	</div>
	</div>
	
	<div class = "c">
    <label for="psw"><b>RT/CQ/DRAFT</b></label><br>
    <input type="text" placeholder="RT/CQ/DRAFT" name="draft" id="draft" required>
	</div>
	</div>
	
	<div class= "e">
    <label for="psw"><b>Amount</b></label><br>
    <input type="number" step="any" placeholder="Amount" name="amount" id="amount" required>
	

    <div class = "a">
    <label for="psw"><b>Driver Name</b></label><br>
    <input type="text" placeholder="Driver Name" name="dname" id="dname" >
	</div>
	
	<div class = "c">
    <label for="psw"><b>Vehicle No</b></label><br>
    <input type="text" placeholder="Vehicle No" name="vNo" id="vNo" >
	</div>
	</div>
	
	<div class = "f">
    <hr>
    <button type="submit" class="registerbtn">Create Delivery Note</button>
    </div>
 
  </div>
</form>

</div>


</body>
</html>
