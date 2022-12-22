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
  width: 82%;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=date],input[type=number] {
  width: 15%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

div.a {
position: relative;
left: 200px;
top: -108px;
}

div.k {
position: relative;
top: -10px;
}

div.x {
position: relative;
left: 600px;
top: -269px;
}

div.b, hr.b {
position: relative;
left: 400px;
top: -189px;
}

div.d {
position: relative;
left: 800px;
top: -350px;
}

div.e {
position: relative;
left: 1000px;
top: -430px;
}

div.f {
	position: relative;
	top: -450px;
}

div.g {
	position: relative;
	top: -450px;
}

div.h {
	position: relative;
	top: -709px;
	left: 200px;
}

div.i {
	position: relative;
	top: -968px;
	left: 400px;
}

div.j {
	position: relative;
	top: -1227px;
	left: 600px;
}

div.l {
	position: relative;
	top: -1486px;
	left: 800px;
}

div.y {
position: relative;

top: -1480px;
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
  margin: 0px 0;
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

.searchbtn {
 position: relative;
 left:140px;
 top:0px;
  background-color: #3ca9e2;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
  
}

.searchbtn:hover {
  opacity: 1;
}

.searchbtn1 {
 position: relative;
 left:0px;
 top:0px;
width: 15%;
  background-color: #3ca9e2;
  color: white;
  padding: 2px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;
  
}

.searchbtn1:hover {
  opacity: 1;
}

.search-box{
        width: 15%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 38px;
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
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
	
	
	.search-box1{
        width: 15%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box1 input[type="text"]{
        height: 38px;
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
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result1 p:hover{
        background: #f2f2f2;
    }



.search-box2{
        width: 40%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box2 input[type="text"]{
        height: 45px;
        padding: 5px 10px;
        border: 0px solid #CCCCCC;
        font-size: 14px;
    }
    .result2{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box2 input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result2 p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result2 p:hover{
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
	
	
	
	
});
</script>
<script>
$(document).ready(function(){
    $('.search-box2 input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result2");
        if(inputVal.length){
            $.get("sellsDeliveryNote.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result2 p", function(){
        $(this).parents(".search-box2").find('input[type="text"]').val($(this).text());
        $(this).parent(".result2").empty();
    });
	
	$(document).on("click", ".result2 p", function(){
        /* Get input value on change */
        var inputVal = $(this).text();
        if(inputVal.length){
            $.get("invoiceReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				
		
				document.getElementById('form').hidden = false;
				document.getElementById("id").value = words[0];
				document.getElementById("date").value = words[1];
				document.getElementById("hardwareid").value = words[2];
				document.getElementById("dNote").value = words[3];
				document.getElementById("total").value = words[8];
				document.getElementById("rest").value = words[24];
				document.getElementById("status").value = words[25];
				document.getElementById("date1").value = words[9];
				document.getElementById("invoice1").value = words[10];
				document.getElementById("amount1").value = words[11];
				document.getElementById("date2").value = words[12];
				document.getElementById("invoice2").value = words[13];
				document.getElementById("amount2").value = words[14];
				document.getElementById("date3").value = words[15];
				document.getElementById("invoice3").value = words[16];
				document.getElementById("amount3").value = words[17];
				document.getElementById("date4").value = words[18];
				document.getElementById("invoice4").value = words[19];
				document.getElementById("amount4").value = words[20];
				document.getElementById("date5").value = words[21];
				document.getElementById("invoice5").value = words[22];
				document.getElementById("amount5").value = words[23];
					
	
                //resultDropdown.html(data);
            });
        } else{
            document.getElementById
                            ("hardwareid").value = "";
        }
    });
	
	
	
	
});
</script>
<script>

function sum() 
{ 

 
    const amount1 = parseFloat(document.getElementById('amount1').value); 
    const amount2 = parseFloat(document.getElementById('amount2').value); 
    const amount3 = parseFloat(document.getElementById('amount3').value); 
    const amount4 = parseFloat(document.getElementById('amount4').value); 
    const amount5 = parseFloat(document.getElementById('amount5').value); 
    const total = parseFloat(document.getElementById('total').value); 
    const rest = total - (amount1 + amount2 + amount3 + amount4 + amount5 );
  
    if(rest<0) 
    { 
        alert("Total Invoice Amount IS Greater Than Total Amount");
		document.getElementById('amount1').value = 0;
		
    }
}

</script>

<script>

function sum2() 
{ 

 
    const amount1 = parseFloat(document.getElementById('amount1').value); 
    const amount2 = parseFloat(document.getElementById('amount2').value); 
    const amount3 = parseFloat(document.getElementById('amount3').value); 
    const amount4 = parseFloat(document.getElementById('amount4').value); 
    const amount5 = parseFloat(document.getElementById('amount5').value); 
    const total = parseFloat(document.getElementById('total').value); 
    const rest = total - (amount1 + amount2 + amount3 + amount4 + amount5 );
  
    if(rest<0) 
    { 
        alert("Total Invoice Amount IS Greater Than Total Amount");
		document.getElementById('amount2').value = 0;
		
    }
}

</script>

<script>

function sum3() 
{ 

 
    const amount1 = parseFloat(document.getElementById('amount1').value); 
    const amount2 = parseFloat(document.getElementById('amount2').value); 
    const amount3 = parseFloat(document.getElementById('amount3').value); 
    const amount4 = parseFloat(document.getElementById('amount4').value); 
    const amount5 = parseFloat(document.getElementById('amount5').value); 
    const total = parseFloat(document.getElementById('total').value); 
    const rest = total - (amount1 + amount2 + amount3 + amount4 + amount5 );
  
    if(rest<0) 
    { 
        alert("Total Invoice Amount IS Greater Than Total Amount");
		document.getElementById('amount3').value = 0;
		
    }
}

</script>

<script>

function sum4() 
{ 

 
    const amount1 = parseFloat(document.getElementById('amount1').value); 
    const amount2 = parseFloat(document.getElementById('amount2').value); 
    const amount3 = parseFloat(document.getElementById('amount3').value); 
    const amount4 = parseFloat(document.getElementById('amount4').value); 
    const amount5 = parseFloat(document.getElementById('amount5').value); 
    const total = parseFloat(document.getElementById('total').value); 
    const rest = total - (amount1 + amount2 + amount3 + amount4 + amount5 );
  
    if(rest<0) 
    { 
        alert("Total Invoice Amount IS Greater Than Total Amount");
		document.getElementById('amount4').value = 0;
		
    }
}

</script>

<script>

function sum5() 
{ 

 
    const amount1 = parseFloat(document.getElementById('amount1').value); 
    const amount2 = parseFloat(document.getElementById('amount2').value); 
    const amount3 = parseFloat(document.getElementById('amount3').value); 
    const amount4 = parseFloat(document.getElementById('amount4').value); 
    const amount5 = parseFloat(document.getElementById('amount5').value); 
    const total = parseFloat(document.getElementById('total').value); 
    const rest = total - (amount1 + amount2 + amount3 + amount4 + amount5 );
  
    if(rest<0) 
    { 
        alert("Total Invoice Amount IS Greater Than Total Amount");
		document.getElementById('amount5').value = 0;
		
    }
}

</script>

<script >
    function enableInput1() {
				document.getElementById('date1').readOnly = false;
				document.getElementById('amount1').readOnly = false;
				document.getElementById('invoice1').readOnly = false;
				document.getElementById('date1').required = true;
				document.getElementById('amount1').required = true;
				document.getElementById('invoice1').required = true;
				document.getElementById('updatebtn').hidden = false;

    };
</script>

<script >
    function enableInput2() {
				document.getElementById('date2').readOnly = false;
				document.getElementById('amount2').readOnly = false;
				document.getElementById('invoice2').readOnly = false;
				document.getElementById('date2').required = true;
				document.getElementById('amount2').required = true;
				document.getElementById('invoice2').required = true;
				document.getElementById('updatebtn').hidden = false;

    };
</script>

<script >
    function enableInput3() {
				document.getElementById('date3').readOnly = false;
				document.getElementById('amount3').readOnly = false;
				document.getElementById('invoice3').readOnly = false;
				document.getElementById('date3').required = true;
				document.getElementById('amount3').required = true;
				document.getElementById('invoice3').required = true;
				document.getElementById('updatebtn').hidden = false;

    };
</script>
<script >
    function enableInput4() {
				document.getElementById('date4').readOnly = false;
				document.getElementById('amount4').readOnly = false;
				document.getElementById('invoice4').readOnly = false;
				document.getElementById('date4').required = true;
				document.getElementById('amount4').required = true;
				document.getElementById('invoice4').required = true;
				document.getElementById('updatebtn').hidden = false;

    };
</script>

<script >
    function enableInput5() {
				document.getElementById('date5').readOnly = false;
				document.getElementById('amount5').readOnly = false;
				document.getElementById('invoice5').readOnly = false;
				document.getElementById('date5').required = true;
				document.getElementById('amount5').required = true;
				document.getElementById('invoice5').required = true;
				document.getElementById('updatebtn').hidden = false;

    };
</script>
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<div class="container">
    <h2>Search Delivery Note No</h2>
	<div class="search-box2">
        <input type="text" autocomplete="off" placeholder="Delivery Note No" name="d_Note" id="d_Note" >
        <div class="result2"></div>
    </div>
	
    <hr>

<form action="editinvoiceReg.php" method="post" id="form" name="form" hidden>

    <div hidden >

    <label for="email"><b>id</b></label><br>
	<input type="text" placeholder="id" name="id" id="id" readOnly>
	</div>
  
	
   <div class = "k">
    <label for="email"><b>Date</b></label><br>
    <input type="date" name="date" id="date" min="1900-01-01" max="2100-12-31" readOnly>
	</div>
	<br>

    <div class = "a">
    <div class="search-box1">
	<label for="psw"><b>Delivery Note No</b></label><br>
        <input type="text" autocomplete="off" placeholder="Delivery Note No" name="dNote" id="dNote" readOnly >
        <div class="result1"></div>
    </div>
	</div>
	
	<div class = "b">
	<div class="search-box">
	<label for="psw"><b>Hardware</b></label><br>
        <input type="text" autocomplete="off" placeholder="Hardware Name" name="hardwareid" id="hardwareid" readOnly>
        <div class="result"></div>
    </div>
	<br>
	</div>
	
	<div class = "x">
    <label for="psw"><b>Total Amount</b></label><br>
    <input type="number" name="total" id="total" readOnly>
	</div>
	
	
	
	<div class = "d">
	<label for="psw"><b>Rest Amount</b></label><br>
    <input type="text" name="rest" id="rest" readOnly>
	</div>
	
	
	<div class = "e">
	<label for="email"><b>Status </b></label><br>
    <input type="text" name="status" id="status" readOnly>
	<br>
	</div>
	
	<div class = "f">
	<hr>
	</div>
	
	
	<div class = "g">
	
	<label for="email"><b>Date </b></label><br>
    <input type="date" name="date1" id="date1" readOnly>
	<br>
	<label for="email"><b>Invoice Number 1 </b></label><br>
    <input type="text" name="invoice1" id="invoice1" readOnly>
	<br>
	<label for="email"><b>Amount </b></label><br>
    <input type="number" step="any"  name="amount1" id="amount1" value="" onkeyup="sum()" readOnly >
	<br>
	 <label class ="searchbtn1" onclick="enableInput1()" >edit</label>
	
	 </div>
	 
	 <div class = "h">
	
	<label for="email"><b>Date </b></label><br>
    <input type="date" name="date2" id="date2" readOnly>
	<br>
	<label for="email"><b>Invoice Number 2 </b></label><br>
    <input type="text" name="invoice2" id="invoice2" readOnly>
	<br>
	<label for="email"><b>Amount </b></label><br>
    <input type="number" step="any"  name="amount2" id="amount2" value="" onkeyup="sum2()" readOnly>
	<br>
	 <label class ="searchbtn1" onclick="enableInput2()" >edit</label>
	
	 </div>
	 
	 <div class = "i">
	
	<label for="email"><b>Date </b></label><br>
    <input type="date" name="date3" id="date3" readOnly>
	<br>
	<label for="email"><b>Invoice Number 3 </b></label><br>
    <input type="text" name="invoice3" id="invoice3" readOnly>
	<br>
	<label for="email"><b>Amount </b></label><br>
    <input type="number" step="any"  name="amount3" id="amount3" value="" onkeyup="sum3()" readOnly>
	<br>
	 <label class ="searchbtn1" onclick="enableInput3()" >edit</label>
	
	 </div>
	 
	 <div class = "j">
	
	<label for="email"><b>Date </b></label><br>
    <input type="date" name="date4" id="date4" readOnly>
	<br>
	<label for="email"><b>Invoice Number 4 </b></label><br>
    <input type="text" name="invoice4" id="invoice4" readOnly>
	<br>
	<label for="email"><b>Amount </b></label><br>
    <input type="number" step="any"  name="amount4" id="amount4" value="" onkeyup="sum4()" readOnly>
	<br>
	 <label class ="searchbtn1" onclick="enableInput4()" >edit</label>
	
	 </div>
	 
	 <div class = "l">
	
	<label for="email"><b>Date </b></label><br>
    <input type="date" name="date5" id="date5" readOnly>
	<br>
	<label for="email"><b>Invoice Number 5 </b></label><br>
    <input type="text" name="invoice5" id="invoice5" readOnly>
	<br>
	<label for="email"><b>Amount </b></label><br>
    <input type="number" step="any"  name="amount5" id="amount5" value="" onkeyup="sum5()" readOnly>
	<br>
	 <label class ="searchbtn1" onclick="enableInput5()" >edit</label>
	
	 </div>

	
	<div class="y">
    <hr>

    <button type="submit" class="registerbtn"  id = "updatebtn" name = "updatebtn" hidden>Update Invoice</button>
	</div>
 
  
  
  
  </div>
</form>

</div>


</body>
</html>
