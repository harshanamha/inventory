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
  width: 30%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

div.x {
position: relative;

top: -18px;
}

div.a {
position: relative;
left: 550px;
top: -128px;
}

div.b, hr.b {
position: relative;

top: -145px;
}

div.c {
position: relative;
left: 550px;
top: -242px;
}

div.p {
position: relative;
left: 850px;
top: -312px;
}

div.d{
position: relative;

top: -290px;
}

div.e {
position: relative;
left: 550px;
top: -388px;
}

div.q {
position: relative;
left: 850px;
top: -458px;
}

div.g{
position: relative;

top: -435px;
}

div.h {
position: relative;
left: 550px;
top: -532px;
}

div.r {
position: relative;
left: 850px;
top: -602px;
}

div.f{
position: relative;

top: -590px;
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
  padding: 12px 20px;
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
            $.get("selectCustomer.php", {term: inputVal}).done(function(data){
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
            $.get("searchPohoraReg.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
				
				var words = data.split('+');
				
				document.getElementById('form').hidden = false;
				document.getElementById("id").value = words[0];
				document.getElementById("amount").value = words[3];
				document.getElementById("pendingamount").value = words[10];
				document.getElementById("date1").value = words[4];
				document.getElementById("amount1").value = words[5];
				document.getElementById("date2").value = words[6];
				document.getElementById("amount2").value = words[7];
				document.getElementById("date3").value = words[8];
				document.getElementById("amount3").value = words[9];
				document.getElementById("amount").readOnly = true;
				document.getElementById('date').readOnly = true;
				document.getElementById('pendingamount').readOnly = true;
				document.getElementById('date1').readOnly = true;
				document.getElementById('amount1').readOnly = true;
				document.getElementById('date2').readOnly = true;
				document.getElementById("amount2").readOnly = true;
				document.getElementById("date3").readOnly = true;
				document.getElementById("amount3").readOnly = true;
				
				
	
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
    function enableInput1() {
				document.getElementById('date1').readOnly = false;
				document.getElementById('amount1').readOnly = false;
				document.getElementById('regbtn').hidden = false;

    };
</script>

<script >
    function enableInput2() {
				document.getElementById('date2').readOnly = false;
				document.getElementById('amount2').readOnly = false;
				document.getElementById('regbtn').hidden = false;

    };
</script>

<script >
    function enableInput3() {
				document.getElementById('date3').readOnly = false;
				document.getElementById('amount3').readOnly = false;
				document.getElementById('regbtn').hidden = false;

    };
</script>

</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<div style = "position: relative; left: 130px">


<div class="container">


   
<h2>ගනුදෙනුකරු සොයන්න</h2>
<div class = "t">
<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Type Customer Name" name="hardwareid" id="hardwareid" >
        <div class="result"></div>
    </div>
	

</div>


<hr>

<form action="editPohoraReg.php" method="post" id="form" name="form" hidden>
 
    
	<div hidden >

    <label for="email"><b>Hardware id</b></label><br>
	<input type="text" placeholder="id" name="id" id="id" readOnly>
	</div>

    <div class = "x"> 
    <label style = "font-size:20px" ><b>ගත් මුදල     </b></label><br>
	<input type="text" placeholder="Customer Name" name="amount" id="amount" readOnly>
	</div>
	
	<br>
	
	<div class = "a">
    <label style = "font-size:20px"><b>ගෙවීමට ඇති මුදල </b></label><br>
    <input type="text" placeholder="Address" name="pendingamount" id="pendingamount" readonly>
	</div>
	
	
	<div class = "b">
	<label style = "font-size:20px"><b>දිනය</b></label><br>
    <input type="date" placeholder="Contact No" name="date1" id="date1" readonly>
	 </div>
	 
	 <div class = "c">
	<label style = "font-size:20px"><b>වාරික මුදල  1 </b></label><br>
    <input type="text" placeholder="Contact No" name="amount1" id="amount1" readonly>
	 </div>
	<br>
	
	
	 <div class = "p">
	 <label class ="searchbtn" onclick="enableInput1()" >edit</label>
	 </div>
	
	<div class = "d">
	<label style = "font-size:20px"><b>දිනය</b></label><br>
    <input type="date" placeholder="Contact No" name="date2" id="date2" readonly>
	 </div>
	 
	 
	 <div class = "e">
	<label style = "font-size:20px"><b>වාරික මුදල  2 </b></label><br>
    <input type="text" placeholder="Contact No" name="amount2" id="amount2" readonly >
	 </div>
	<br>
	
	<div class = "q">
	 <label class ="searchbtn" onclick="enableInput2()" >edit</label>
	 </div>
	
	<div class = "g">
	<label style = "font-size:20px"><b>දිනය</b></label><br>
    <input type="date" placeholder="Contact No" name="date3" id="date3" readonly>
	 </div>
	 
	 <div class = "h">
	<label style = "font-size:20px"><b>වාරික මුදල  3 </b></label><br>
    <input type="text" placeholder="Contact No" name="amount3" id="amount3" readonly>
	 </div>
	<br>
	
	<div class = "r">
	<label class ="searchbtn" onclick="enableInput3()">edit</label>
	 </div>
	
	<div class="f">
    <hr>

    <button type="submit" name = "regbtn" id = "regbtn" class="registerbtn" style = "font-size:20px" hidden>ඇතුලත් කරන්න</button>
 </div>
 
  </div>
</form>


</div>


</body>
</html>
