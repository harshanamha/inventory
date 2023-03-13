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
input[type=text], input[type=password],input[type=date],div.sel,input[type=number] {
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

div.v {
position: relative;
left: 800px;
top: -175px;
}
div.x {
position: relative;
left: 550px;
top: -280px;
}

div.b, hr.b {
position: relative;

top: -190px;
}

div.d {
position: relative;

top: -290px;
}

div.e {
position: relative;

top: -390px;
}

div.y {
position: relative;

top: -90px;
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
	
	.search-box3{
        width: 40%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box3 input[type="text"]{
        height: 45px;
        padding: 5px 10px;
        border: 0px solid #CCCCCC;
        font-size: 14px;
    }
    .result3{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box3 input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result3 p{
        margin: 0;
		background: #f2f2f2;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result3 p:hover{
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
    $('.search-box3 input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result3");
        if(inputVal.length){
            $.get("selectEmployee.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result3 p", function(){
        $(this).parents(".search-box3").find('input[type="text"]').val($(this).text());
        $(this).parent(".result3").empty();
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
            $.get("editsearchinvoice.php", {term: inputVal}).done(function(data){
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
            $.get("editinvoicesetReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				
		
				document.getElementById('form').hidden = false;
				document.getElementById("id").value = words[0];
				document.getElementById("dNote").value = words[8];
				document.getElementById("hardwareid").value = words[7];
				document.getElementById("restamount").value = words[9];
				document.getElementById("status").value = words[10];
				document.getElementById("date").value = words[1];
				document.getElementById("invoice").value = words[2];
				document.getElementById("saletype").value = words[3];
				document.getElementById("cheque").value = words[4];
				document.getElementById("amount").value = words[5];
				document.getElementById("amount1").value = words[5];
				document.getElementById("helper").value = words[6];
				
				document.getElementById("date").readOnly = true;
				document.getElementById("invoice").readOnly = true;
				document.getElementById("saletype").readOnly = true;
				document.getElementById("cheque").readOnly = true;
				document.getElementById("amount").readOnly = true;
				document.getElementById("helper").readOnly = true;
				
				
				
				
				
				
	
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

 
    const restamount = parseFloat(document.getElementById('restamount').value); 
    const amount = parseFloat(document.getElementById('amount').value); 
     
    const rest = restamount - (amount - amount1);
	
  
    if(rest<0) 
    { 
        alert("Amount IS Greater Than Rest Amount");
		document.getElementById('amount').value = 0;
		
    } else {
	 
        document.getElementById('restamount').value = rest;
	}
    
}

</script>

<script >
    function enableInput() {
				document.getElementById("date").readOnly = false;
				document.getElementById("invoice").readOnly = false;
				document.getElementById("saletype").readOnly = false;
				document.getElementById("cheque").readOnly = false;
				document.getElementById("amount").readOnly = false;
				document.getElementById("helper").readOnly = false;
				document.getElementById('updatebtn').hidden = false;

    };
</script>


</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<div class="container">
    <h2>Search Recept</h2>
	<div class="search-box2">
        <input type="text" autocomplete="off" placeholder="Recept No" name="d_Note" id="d_Note" >
        <div class="result2"></div>
    </div>
	<button class ="searchbtn" onclick="enableInput()" >edit</button>
	
    <hr>

<form action="invoiceeditReg.php" method="post" id="form" name="form" hidden>

    <div hidden >

    <label for="email"><b>id</b></label><br>
	<input type="text" placeholder="id" name="id" id="id" readOnly>
	</div>
  
	
   
	<div class="search-box1">
	<label for="psw"><b>Delivery Note No</b></label><br>
        <input type="text" autocomplete="off" placeholder="Delivery Note No" name="dNote" id="dNote" readOnly>
        <div class="result1"></div>
    </div>
	
	<br>

    <div class = "a">
    <div class="search-box">
	<label for="psw"><b>Hardware</b></label><br>
        <input type="text" autocomplete="off" placeholder="Hardware Name" name="hardwareid" id="hardwareid" style = "width:40%;" readOnly>
        <div class="result"></div>
    </div>
	</div>
	
	<div class = "v">
	<label for="psw"><b>Rest Amount</b></label><br>
        <input type="text" placeholder="id" name="restamount" id="restamount" style = "width:18%;" readOnly>
	</div>
	
	<div class = "b">
	<label for="email"><b>Date</b></label><br>
    <input type="date" name="date" id="date" min="1900-01-01" max="2100-12-31" required>
	<br>
	</div>
	
	<div class = "x">
    <label for="psw"><b>Invoice Number</b></label><br>
    <input type="text" placeholder="Invoice" name="invoice" id="invoice"  required>
	</div>
	
	<div class = "d">
	
	<div class = "">
	<label for="psw"><b>Cheque / Cash</b></label><br>
    <div class="sel">
    <select name="saletype" id="saletype"  style = "width: 150px">
  <option value="Cash">Cash</option>
  <option value="Cheque">Cheque</option>
</select>
	</div>
	</div>
	
	
	<div class = "a">
	<label for="email"><b>Cheque Number </b></label><br>
    <input type="text" step="any" placeholder="Cheque Number" name="cheque" id="cheque" >
	<br>
	</div>
	</div>
	
	<div class = "e">
	
	<label for="email"><b>Amount </b></label><br>
    <input type="number" step="any" value="0.00" name="amount" id="amount" onkeyup="sum()" required>

	
	<div class = "a">
	
	<div class="search-box3">
	<label for="psw"><b>Helper Name</b></label><br>
        <input type="text" autocomplete="off" placeholder="Helper" name="helper" id="helper" required>
        <div class="result3"></div>
    </div>
	</div>
	
	<div hidden >

    <label for="email"><b>Status</b></label><br>
	<input type="text" placeholder="id" name="status" id="status" readOnly>
	</div>
	
	<div hidden >

    <label for="email"><b>amount1</b></label><br>
	<input type="text" placeholder="id" name="amount1" id="amount1" readOnly>
	</div>
	
	<div class="y">
    <hr>

    <button type="submit" class="registerbtn"  id = "updatebtn" name = "updatebtn" hidden >Update Invoice</button>
	</div>
  </div>
  
  
  
  </div>
</form>

</div>


</body>
</html>
