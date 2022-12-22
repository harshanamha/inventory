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
            $.get("sellDeliveryNoteReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				document.getElementById("hname").value = words[2];
				document.getElementById("dno").value = words[3];
				
				
				
				
				
	
                //resultDropdown.html(data);
            });
        } else{
            document.getElementById
                            ("hardwareid").value = "";
        }
    });
	
	
	
	
});
</script>



</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">

<div class="container">
    <h2>Search Invoice</h2>
	<div class="search-box2">
        <input type="text" autocomplete="off" placeholder="Delivery Note No" name="d_Note" id="d_Note" >
        <div class="result2"></div>
    </div>
	<br>
	
    <hr>
	
	<form action="createinvoiceReport.php" method="post" id="form" name="form">
	
	<div hidden >

    <label for="email"><b>delevery No</b></label><br>
	<input type="text" placeholder="id" name="dno" id="dno" readOnly>
	</div>
	
	<div hidden >
    <label for="email"><b>Hardware</b></label><br>
	<input type="text" placeholder="id" name="hname" id="hname" readOnly>
	</div>
	
	<button type="submit" class="registerbtn">Find Invoices</button>
	
	</form>
</div>


</body>
</html>
