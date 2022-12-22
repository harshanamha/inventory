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

div.b, hr.b {
position: relative;

top: -90px;
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
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
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
            $.get("selectDeliveryNote.php", {term: inputVal}).done(function(data){
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
	
	$(document).on("click", ".result p", function(){
        /* Get input value on change */
        var inputVal = $(this).text();
        if(inputVal.length){
            $.get("searchDeliveryReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				
				document.getElementById('form').hidden = false;
				document.getElementById("id").value = words[0];
				
	
                //resultDropdown.html(data);
            });
        } else{
            document.getElementById
                            ("hname").value = "";
        }
    });
	
	
});
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
        document.getElementById('balance_payement').value = 0; 
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
    <h2>ADD SALES</h2>
    <hr>
	
   
    <label for="email"><b>Date</b></label><br>
    <input type="date" name="date" id="date" required>
	<br>
	
	
	<div class = "a">
    <div class="search-box">
	<label for="psw"><b>Delivery No</b></label><br>
        <input type="text" autocomplete="off" placeholder="Type Delivery Note No" name="hardwareid" id="hardwareid" >
        <div class="result"></div>
    </div>
	</div>

    
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
    <input type="number" placeholder="Qty" name="qty" id="qty" onkeyup="sum()" required>
	</div>
	
	<div class = "d">
	
	<div class = "">
	<label for="psw"><b>Free Qty</b></label><br>
    <input type="number" placeholder="Qty" name="fqty" id="fqty" value="0" required>
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
</form>

</div>


</body>
</html>
