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

top: -90px;
}

div.e {
position: relative;

top: -170px;
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
   
	.search-box1 input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
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
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<form action="createCityReport.php" method="post" target="_blank">
  <div class="container">
    <h2>Search City Details Report</h2>
    <hr>
	
   
    <label for="email"><b>FromDate</b></label><br>
    <input type="date" name="fdate" id="fdate" required>

    <div class="a">
    <label for="email"><b>ToDate</b></label><br>
    <input type="date" name="tdate" id="tdate" required>
    </div>
	<br>
	
	<div class="b">
	
	<div class="search-box1">
	<label for="psw"><b>City</b></label><br>
        <input type="text" autocomplete="off" placeholder="City" name="city" id="city" >
        <div class="result1"></div>
    </div>
	</div>
	
	
	
	
	<div class = "d">

    <button type="submit" class="registerbtn">Generate City Detail Reprt</button>
  </div>
  
  
  
  </div>
</form>

</div>


</body>
</html>
