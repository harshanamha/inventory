<?php 
 session_start();
 

if($_SESSION['status']!="Active")
{
    header("location:index.html");
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #9f9da7;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}



.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #111;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:  #9f9da7;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #111;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body style = "background-color: #D9D9D6; overflow: hidden;">

<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="city.php" target="targetframe">Create City</a></li>
  <div class="dropdown">
    <button class="dropbtn">Hardware 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="createHardware.php" target="targetframe">Create Hardware</a>
     <a href="searchHardware.php" target="targetframe">Edit Hardware</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Delivery Note 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="deliveryNote.php" target="targetframe">Create Delivery Note</a>
     <a href="searchDeliveryNote.php" target="targetframe">Edit Delivery Note</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Sales 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="addSells.php" target="targetframe">Create Sales</a>
     <a href="searchSells.php" target="targetframe">Edit Sales</a>
     <a href="searchInvoice.php" target="targetframe">Create Invoice</a>
     <a href="editinvoice.php" target="targetframe">Edit Invoice</a>
     <a href="findInvoice.php" target="targetframe">Find Invoice</a>
    </div>
  </div>
  <li><a href="genReport.php" target="targetframe">Summary Reports</a></li>
  <div class="dropdown">
    <button class="dropbtn">Detail Reports 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="genCityReport.php" target="targetframe">City Detail Report</a>
     <a href="genHardReport.php" target="targetframe">Hardware Detail Report</a>
    </div>
  </div>
  <li><a href="deliveryNoteReport.php" target="targetframe">Delivery Note Report</a></li>
  <li style = "position: relative; left: 520px"> <a href="logout.php">LogOut </a></li>
</ul>
<hr style = "background-color: blue; height: 2px">
<div>
   <iframe src="" height="2000" width="1500" name ="targetframe" ></iframe>
  </div>
</body>
</html>