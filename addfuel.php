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
            $.get("selectEmployee.php", {term: inputVal}).done(function(data){
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
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<form action="addfuelReg.php" method="post"">
  <div class="container">
    <h2>ADD FUEL</h2>
    <hr>

	<label for="email"><b>Date</b></label><br>
    <input type="date" name="date" id="date" required>
	<br>
	
	<div class = "c">
   <div class="search-box">
	<label for="psw"><b>Vehicle Number</b></label><br>
        <input type="text" autocomplete="off" placeholder="Vehicle Number" name="number" id="number" required>
        <div class="result"></div>
    </div>
	</div>
	
	<label for="email"><b>Qty</b></label><br>
    <input type="text" placeholder="Qty" name="qty" id="qty" required>
	<br>
	
	<div class = "left">
	 <div class="search-box1">
	<label for="psw"><b>Delivery No</b></label><br>
        <input type="text" autocomplete="off" placeholder="Type Delivery Note No" name="delivernote" id="delivernote" >
        <div class="result1"></div>
    </div>
	<br>
	
	 <div class="search-box2">
	<label for="psw"><b>Driver Name</b></label><br>
        <input type="text" autocomplete="off" placeholder="Name" name="dn" id="dn" >
        <div class="result2"></div>
    </div>
	<br>
	
	 <label for="email"><b>Cost</b></label><br>
    <input type="text" placeholder="cost" name="cost" id="cost" required>
	<br>
	
	</div>
	
	<div class="footer">
	
    <hr>

    <button type="submit" class="registerbtn">Create Record</button>
 
  </div>
  
  
  </div>
</form>

</div>


</body>
</html>
