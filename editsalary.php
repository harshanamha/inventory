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

div.top{
	position: relative;

top: -75px;
left: 400px;
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

top: -110px;
}

div.mod {
position: relative;

top: -80px;
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
});
</script>

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
            $.get("salaryDeliveryNote.php", {term: inputVal}).done(function(data){
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
            $.get("editsalaryReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				
		
				document.getElementById('form').hidden = false;
				document.getElementById("id").value = words[0];
				document.getElementById("date").value = words[1];
				document.getElementById("delivernote1").value = words[2];
				document.getElementById("dn").value = words[3];
				document.getElementById("ds").value = words[4];
				document.getElementById("hp1").value = words[5];
				document.getElementById("hs1").value = words[6];
				document.getElementById("hp2").value = words[7];
				document.getElementById("hs2").value = words[8];
				
				document.getElementById("id").readOnly = true;
				document.getElementById("date").readOnly = true;
				document.getElementById("delivernote1").readOnly = true;
				document.getElementById("dn").readOnly = true;
				document.getElementById("ds").readOnly = true;
				document.getElementById("hp1").readOnly = true;
				document.getElementById("hs1").readOnly = true;
				document.getElementById("hp2").readOnly = true;
				document.getElementById("hs2").readOnly = true;
				
				
				
				
				
				
	
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

<script >
    function enableInput() {
				document.getElementById('updatebtn').hidden = false;
				document.getElementById("date").readOnly = false;
				document.getElementById("delivernote1").readOnly = false;
				document.getElementById("dn").readOnly = false;
				document.getElementById("ds").readOnly = false;
				document.getElementById("hp1").readOnly = false;
				document.getElementById("hs1").readOnly = false;
				document.getElementById("hp2").readOnly = false;
				document.getElementById("hs2").readOnly = false;

    };
</script>
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">


  <div class="container">

<h2>EDIT SALARY</h2>
    <div class="search-box2">
	<label for="psw"><b>Delivery No</b></label><br>
        <input type="text" autocomplete="off" placeholder="Type Delivery Note No" name="delivernote" id="delivernote" >
        <div class="result2"></div>
    </div>
	
    
	<div class="top">
	<button  class ="searchbtn" onclick="enableInput()" >edit</button>
	</div>
	
	
	<div class="mod">
    <hr>
	<form action="updateSalaryReg.php" method="post"  id="form" name="form" hidden>
   
   <div hidden >

    <label for="email"><b>id</b></label><br>
	<input type="text" placeholder="id" name="id" id="id" readOnly>
	</div>
   
    <label for="email"><b>Date</b></label><br>
    <input type="date" name="date" id="date" required>
	<br>
	
	
	<div class = "a">
    <div class="search-box">
	<label for="psw"><b>Delivery No</b></label><br>
        <input type="text" autocomplete="off" placeholder="Type Delivery Note No" name="delivernote1" id="delivernote1" >
        <div class="result"></div>
    </div>
	</div>

    
	<div class = "b">
	 <div class="search-box1">
	<label for="psw"><b>Driver Name</b></label><br>
        <input type="text" autocomplete="off" placeholder="Name" name="dn" id="dn" required>
        <div class="result1"></div>
    </div>

	<br>
	</div>
	
	<div class = "x">
    <label for="psw"><b>Driver Salary</b></label><br>
    <input type="number" placeholder="0.00" name="ds" id="ds" required>
	</div>
	
	<div class = "d">
	
	<div class = "">
	<div class="search-box1">
	<label for="psw"><b>Helper1 Name </b></label><br>
    <input type="text" placeholder="Name" name="hp1" id="hp1"  required>
	<div class="result1"></div>
    </div>
	</div>
	
	
	<div class = "a">
	<label for="email"><b>Helper1 Salary</b></label><br>
    <input type="number" step="any" placeholder="0.00" name="hs1" id="hs1" required>
	<br>
	</div>
	</div>
	
	<div class = "e">
	<div class="search-box1">
	<label for="email"><b>Helper2 Name </b></label><br>
    <input type="text" step="any" placeholder="Name" name="hp2" id="hp2" >
	<div class="result1"></div>
    </div>

	
	<div class = "a">
	<label for="psw"><b>Helper2 Salary</b></label><br>
    <input type="number" step="any" placeholder="0.00" name="hs2" id="hs2">
	</div>
	
	
	<div class="y">
    <hr>

    <button type="submit" class="registerbtn" id = "updatebtn" name = "updatebtn" hidden>Edit Salary</button>
	</div>
  </div>
  
  </form>
  
  </div>
  
  
  
  </div>


</div>


</body>
</html>
