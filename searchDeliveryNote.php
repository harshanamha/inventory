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

div.t {
position: relative;
left:0px;
top: -10px;
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
				document.getElementById("dNote").value = words[1];
				document.getElementById("date").value = words[2];
				document.getElementById("saletype").value = words[3];
				document.getElementById("bulk").value = words[4];
				document.getElementById("qty").value = words[5];
				document.getElementById("soNo").value = words[6];
				document.getElementById("poNo").value = words[7];
				document.getElementById("cash_dis").value = words[8];
				document.getElementById("draft").value = words[9];
				document.getElementById("amount").value = words[10];
				document.getElementById("dname").value = words[11];
				document.getElementById("vNo").value = words[12];
				document.getElementById("dNote").readOnly = true;
				document.getElementById('date').readOnly = true;
				document.getElementById('saletype').readOnly = true;
				document.getElementById('bulk').readOnly = true;
				document.getElementById('qty').readOnly = true;
				document.getElementById('soNo').readOnly = true;
				document.getElementById("poNo").readOnly = true;
				document.getElementById("cash_dis").readOnly = true;
				document.getElementById("draft").readOnly = true;
				document.getElementById("amount").readOnly = true;
				document.getElementById("dname").readOnly = true;
				document.getElementById("vNo").readOnly = true;
				
				
	
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
				document.getElementById("dNote").readOnly = false;
				document.getElementById('date').readOnly = false;
				document.getElementById('saletype').readOnly = false;
				document.getElementById('bulk').readOnly = false;
				document.getElementById('qty').readOnly = false;
				document.getElementById('soNo').readOnly = false;
				document.getElementById("poNo").readOnly = false;
				document.getElementById("cash_dis").readOnly = false;
				document.getElementById("draft").readOnly = false;
				document.getElementById("amount").readOnly = false;
				document.getElementById("dname").readOnly = false;
				document.getElementById("vNo").readOnly = false;
				document.getElementById('updatebtn').hidden = false;

    };
</script>

</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">


<div class="container">


   
<h2>Search Delivery Note</h2>
<div class = "t">
<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Type Delivery Note No" name="hardwareid" id="hardwareid" >
        <div class="result"></div>
    </div>
	<button class ="searchbtn" onclick="enableInput()" >edit</button>
	

</div>


<hr>

<form action="editDeliveryNoteReg.php" method="post" id="form" name="form" hidden>
 
    
	<div hidden >

    <label for="email"><b>Hardware id</b></label><br>
	<input type="text" placeholder="id" name="id" id="id" readOnly>
	</div>

    <label for="email"><b>Delivery Note No</b></label><br>
    <input type="text" placeholder="Delivery Note No" name="dNote" id="dNote" required>
	<br>
	
	<div class = "a">
    <label for="psw"><b>Date</b></label><br>
    <input type="date" placeholder="" name="date" id="date" min="1900-01-01" max="2100-12-31" required>
	</div>
	
	<div class = "c">
    <label for="psw"><b>Type of Sale</b></label><br>
	<div class="sel">
    <select name="saletype" id="saletype"  style = "width: 150px">
  <option value="Cash Sale">Cash Sale</option>
  <option value="Cheque Sale">Cheque Sale</option>
</select>
	</div>
	</div>
	
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
    <label for="psw"><b>Driver Name</b></label><br>
    <input type="text" placeholder="Driver Name" name="dname" id="dname" >
	</div>
	
	<div class = "c">
    <label for="psw"><b>Vehicle No</b></label><br>
    <input type="text" placeholder="Vehicle No" name="vNo" id="vNo" >
	</div>
	</div>
	
	<div class = "f">
    <hr>
    <button type="submit" class="registerbtn" id = "updatebtn" name = "updatebtn" hidden>update Delivery Note</button>
    </div>
 
  </div>
</form>


</div>


</body>
</html>
