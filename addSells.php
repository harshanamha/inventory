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
input[type=text], input[type=password],input[type=date],input[type=number] {
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
top: -88px;
}

div.aa {
position: relative;
left: 400px;
top: -88px;
}

div.b, hr.b {
position: relative;

top: -90px;
}

div.up {
position: relative;

top: -80px;
}

div.d {
position: relative;

top: -170px;
}

div.e {
position: relative;

top: -250px;
}



input[type=text]:focus, input[type=password]:focus,input[type=date]:focus,input[type=number]:focus {
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

div.x {
position: relative;
left: 550px;
top: -180px;
}

div.ppp {
position: relative;
left: 770px;
top: -178px;
}

div.y {
position: relative;

top: -100px;
}

.search-box{
        width: 40%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 45px;
        padding: 5px 10px;
        border: 0px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
	background: #f2f2f2;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
	
	.search-box1{
        width: 40%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box1 input[type="text"]{
        height: 45px;
        padding: 5px 10px;
        border: 0px solid #CCCCCC;
        font-size: 14px;
    }
    .result1{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box1 input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result1 p{
        margin: 0;
		background: #f2f2f2;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result1 p:hover{
        background: #f2f2f2;
    }

</style>
<script src="./script.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("selectHardware.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<script>
$(document).ready(function(){
    $('.search-box1 input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result1");
        if(inputVal.length){
            $.get("selectDeliveryNote.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result1 p", function(){
        $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());
        $(this).parent(".result1").empty();
    });
	
	$(document).on("click", ".result1 p", function(){
        /* Get input value on change */
        var inputVal = $(this).text();
        if(inputVal.length){
            $.get("searchDeliveryReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				
				
				document.getElementById("id").value = words[0];
				document.getElementById("rqty").value = words[14];
				document.getElementById("qty").readOnly = false;
				document.getElementById("fqty").readOnly = false;
				
				
				
	
                //resultDropdown.html(data);
            });
        } else{
            document.getElementById
                            ("rqty").value = "";
        }
    });
	
	
	
	
});
</script>


<script>

function sum2() 
{ 


const restamount = parseInt(document.getElementById('qty').value); 
    const amount = parseInt(document.getElementById('rqty').value); 
    const fqty = parseInt(document.getElementById('fqty').value); 
     
    const rest =  amount - (restamount+fqty);
  
    if(rest<0) 
    { 
        alert("Quantity IS Greater Than Rest Quantity");
		document.getElementById('fqty').value = 0;
		
    } else {
    var txtFirstNumberValue = document.getElementById('uprice').value; 
    var txtSecondNumberValue = document.getElementById('qty').value; 
    var txtThiredNumberValue = document.getElementById('dprice').value; 
    var result = (txtFirstNumberValue * txtSecondNumberValue) - txtThiredNumberValue; 
    if(txtFirstNumberValue=="" ||txtSecondNumberValue=="") 
    { 
        document.getElementById('total').value = 0; 
    }
    if (!isNaN(result)) 
    { 
        document.getElementById('total').value = result;
    }
	}
}

</script>

<script>

function sum1() 
{ 


const restamount = parseInt(document.getElementById('qty').value); 
    const amount = parseInt(document.getElementById('rqty').value); 
    const fqty = parseInt(document.getElementById('fqty').value); 
     
    const rest =  amount - (restamount+fqty);
  
    if(rest<0) 
    { 
        alert("Quantity IS Greater Than Rest Quantity");
		document.getElementById('qty').value = 0;
		
    } else {
    var txtFirstNumberValue = document.getElementById('uprice').value; 
    var txtSecondNumberValue = document.getElementById('qty').value; 
    var txtThiredNumberValue = document.getElementById('dprice').value; 
    var result = (txtFirstNumberValue * txtSecondNumberValue) - txtThiredNumberValue; 
    if(txtFirstNumberValue=="" ||txtSecondNumberValue=="") 
    { 
        document.getElementById('total').value = 0; 
    }
    if (!isNaN(result)) 
    { 
        document.getElementById('total').value = result;
    }
	}
}

</script>

<script>

function sum() 
{ 


    var txtFirstNumberValue = document.getElementById('uprice').value; 
    var txtSecondNumberValue = document.getElementById('qty').value; 
    var txtThiredNumberValue = document.getElementById('dprice').value; 
    var result = (txtFirstNumberValue * txtSecondNumberValue) - txtThiredNumberValue; 
    if(txtFirstNumberValue=="" ||txtSecondNumberValue=="") 
    { 
        document.getElementById('total').value = 0; 
    }
    if (!isNaN(result)) 
    { 
        document.getElementById('total').value = result;
    }
}

</script>
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<form action="addSellsReg.php" method="post"">
  <div class="container">
    <h2>ADD INVOICE</h2>
    <hr>
	
   
    <label for="email"><b>Date</b></label><br>
    <input style = "width: 250px" type="date" name="date" id="date" required>
	<br>
	
	
	<div class = "aa">
    <div class="search-box1">
	<label for="psw"><b>Delivery Note No</b></label><br>
        <input style = "width: 250px" type="text" autocomplete="off" placeholder="Delivery Note No" name="dNote" id="dNote" required>
        <div class="result1"></div>
    </div>
	</div>
	
	<div hidden >
	<label for="psw"><b>id</b></label><br>
    <input type="text" placeholder="id" name="id" id="id" >
	
	<label for="psw"><b>restqty</b></label><br>
    <input type="text" placeholder="rqty" name="rqty" id="rqty" >
	</div>

	<div class = "ppp">
    <label for="psw"><b>Invoice Number</b></label><br>
    <input style = "width: 250px" type="text" placeholder="Invoice Number" name="inv" id="inv" required>
	</div>
	
	<div class="up">
    
	<div class = "b">
	 <div class="search-box">
	<label for="psw"><b>Hardware</b></label><br>
        <input type="text" autocomplete="off" placeholder="Hardware" name="hardwareid" id="hardwareid" required>
        <div class="result"></div>
    </div>

	<br>
	</div>
	
	<div class = "x">
    <label for="psw"><b>Qty</b></label><br>
    <input type="number" placeholder="Qty" name="qty" id="qty" onkeyup="sum1()" required readOnly>
	</div>
	
	<div class = "d">
	
	<div class = "">
	<label for="psw"><b>Free Qty</b></label><br>
    <input type="number" placeholder="Qty" name="fqty" id="fqty" value="0" onkeyup="sum2()" required readOnly>
	</div>
	
	
	<div class = "a">
	<label for="email"><b>Unit Price </b></label><br>
    <input type="number" step="any" placeholder="Unit Price" name="uprice" id="uprice" onkeyup="sum()" required>
	<br>
	</div>
	</div>
	
	<div class = "e">
	
	<label for="email"><b>Discount Price </b></label><br>
    <input type="number" step="any" value="0" name="dprice" id="dprice" onkeyup="sum()" required>

	
	<div class = "a">
	<label for="psw"><b>Total Price</b></label><br>
    <input type="number" step="any" placeholder="0.00" name="total" id="total" readonly required>
	</div>
	
	
	<div class="y">
    <hr>

    <button type="submit" class="registerbtn">Create Sale</button>
	</div>
  </div>
  </div>
  
  
  
  </div>
</form>

</div>


</body>
</html>
