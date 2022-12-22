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
input[type=text], input[type=password] {
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

div.f {
position: relative;
left:0px;
top: -10px;
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

/* Set a style for the submit button */
.searchbtn {
 position: relative;
 left:140px;
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
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
	.result1{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
	.search-box1 input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
	
    /* Formatting result items */
    .result p{
        margin: 0;
		background-color: #f2f2f2;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #D9D9D6;
    }
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
	
	div.t {
  visibility: hidden;
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
            $.get("backend-search.php", {term: inputVal}).done(function(data){
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
	
	$(document).on("click", ".result p", function(){
        /* Get input value on change */
        var inputVal = $(this).text();
        if(inputVal.length){
            $.get("searchHardwareReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				
				document.getElementById('form').hidden = false;
				document.getElementById("id").value = words[0];
				document.getElementById("hname").value = words[1];
				document.getElementById("address").value = words[2];
				document.getElementById("city").value = words[3];
				document.getElementById("contact").value = words[4];
				document.getElementById("data").hidden = false;
				document.getElementById('hname').readOnly = true;
				document.getElementById('address').readOnly = true;
				document.getElementById('city').readOnly = true;
				document.getElementById('contact').readOnly = true;
				document.getElementById('updatebtn').hidden = true;
				
				
	
                //resultDropdown.html(data);
            });
        } else{
            document.getElementById
                            ("hname").value = "";
        }
    });
});
</script>

<script >
    function enableInput() {
        document.getElementById('hname').readOnly = false;
        document.getElementById('address').readOnly = false;
        document.getElementById('city').readOnly = false;
        document.getElementById('contact').readOnly = false;
        document.getElementById('updatebtn').hidden = false;
    };
</script>

</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<div class="container">


   
<h2>Search Hardware</h2>
<div class = "f">
<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Type Hardware Name" name="hardwareid" id="hardwareid" >
        <div class="result"></div>
    </div>
	<button class ="searchbtn" onclick="enableInput()" >edit</button>
	
<hr>
</div>


<form action="editHardwareReg.php" method="post" id="form" name="form" hidden>

      <div hidden >

    <label for="email"><b>Hardware id</b></label><br>
	<input type="text" placeholder="id" name="id" id="id" readOnly>
	</div>

    
    <label for="email"><b>Hardware Name</b></label><br>
    <input type="text" placeholder="Hardware Name" name="hname" id="hname" required readOnly>
	<br>
	
	
	
	
    <label for="psw"><b>Address</b></label><br>
    <input type="text" placeholder="Address" name="address" id="address" required readonly>
	

    <div class = "a">
    <div class="search-box1">
	<label for="psw"><b>City</b></label><br>
        <input type="text" autocomplete="off" placeholder="City" name="city" id="city" required readonly>
        <div class="result1"></div>
    </div>
	</div>
	
	<div class = "b">
	<label for="email"><b>Contact No</b></label><br>
    <input type="text" placeholder="Contact No" name="contact" id="contact" required readonly>
	<br>
	
    <hr>

    <button type="submit" id = "updatebtn" name = "updatebtn" class="registerbtn" hidden>Update Hardware</button>
  </div>
  
  
  
  </div>
</form>
</div>

</div>


</body>
</html>
