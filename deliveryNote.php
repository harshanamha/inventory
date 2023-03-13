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

.search-box{
        width: 25%;
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
        width: 25%;
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
        width: 60%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result2 p{
        margin: 0;
		background: #f2f2f2;
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
    $('.search-box1 input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result1");
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
            $.get("selecttype.php", {term: inputVal}).done(function(data){
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
});
</script>

<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("selectvehicle.php", {term: inputVal}).done(function(data){
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
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<form action="deliveryNoteReg.php" method="post"">
  <div class="container">
    <h2>Delivery Note</h2>
    <hr>
	

    <label for="email"><b>Delivery Note No</b></label><br>
    <input style = "width:20%" type="text" placeholder="Delivery Note No" name="dNote" id="dNote" required>
	<br>
	
	<div class = "a" style = "width:80% ;position:relative; left: 300px;">
    <label for="psw"><b>Date</b></label><br>
    <input   type="date" placeholder="" name="date" id="date" required>
	</div>
	
	<div class = "c" style = "width:80% ;position:relative; left: 600px;">
    <label for="psw"><b>Type of Sale</b></label><br>
	<div class="sel">
    <select name="saletype" id="saletype"  style = "width: 150px">
  <option value="Cash Sale">Cash Sale</option>
  <option value="Cheque Sale">Cheque Sale</option>
</select>
	</div>
	</div>
	
	<div style = "width:80% ;position:relative; left: 900px; top: -270px">
	<div class="search-box2">
    <label for="psw"><b>Type</b></label><br>
    <input type="text" placeholder="Type" name="type" id="type" required>
	<div class="result2"></div>
    </div>
	</div>
	
	<div style = "position:relative; top: -70px; left:70px">
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
	<div class="search-box1">
	<label for="psw"><b>Driver Name</b></label><br>
        <input type="text" autocomplete="off" placeholder="Driver Name" name="dname" id="dname" >
        <div class="result1"></div>
    </div>
	</div>
	
	<div class = "c">
	<div class="search-box">
	<label for="psw"><b>Vehicle Number</b></label><br>
        <input type="text" autocomplete="off" placeholder="Vehicle Number" name="vNo" id="vNo">
        <div class="result"></div>
    </div>
	</div>
	</div>
	
	<div class = "f" style = "position:relative; left:-70px">
    <hr>
    <button type="submit" class="registerbtn">Create Delivery Note</button>
    </div>
	</div>
 
  </div>
</form>

</div>


</body>
</html>
