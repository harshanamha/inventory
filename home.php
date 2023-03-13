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
  <li><a href="type.php" target="targetframe">Create Type</a></li>
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
    <button class="dropbtn">Invoice 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="addSells.php" target="targetframe">Create Invoice</a>
     <a href="searchSells.php" target="targetframe">Edit Invoice</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Recept 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="searchInvoice.php" target="targetframe">Create Recept</a>
     <a href="editinvoice.php" target="targetframe">Edit Recept</a>
     <a href="findInvoice.php" target="targetframe">Find Recept</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Summary Reports
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="genReport.php" target="targetframe">Sells Summary Reports</a>
     <a href="genprofitReport.php" target="targetframe">Profit Summary Report</a>
     <a href="genDNprofitReport.php" target="targetframe">Deliver Note Summary Report</a>
    </div>
  </div>
  
  <div class="dropdown">
    <button class="dropbtn">Detail Reports 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="genCityReport.php" target="targetframe">City Detail Report</a>
     <a href="genHardReport.php" target="targetframe">Hardware Detail Report</a>
     <a href="gentypesumReport.php" target="targetframe">Type Detail Report</a>
     <a href="collectmoney.php" target="_blank">Collect Money Report</a>
    </div>
  </div>
  <li><a href="deliveryNoteReport.php" target="targetframe">Delivery Note Report</a></li>
  
  <div class="dropdown">
    <button class="dropbtn">Payroll 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	<a href="employee.php" target="targetframe">Add Employee</a>
     <a href="addSalary.php" target="targetframe">Add Salary</a>
     <a href="editsalary.php" target="targetframe">Edit Salary</a>
     <a href="searchsalary.php" target="targetframe">Search Salary</a>
    </div>
  </div>
  
  <div class="dropdown">
    <button class="dropbtn">Vehicle 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	<a href="vehicle.php" target="targetframe">Add Vehicle</a>
     <a href="createRepair.php" target="targetframe">Add Repair</a>
	 <a href="searchrepair.php" target="targetframe">Search Repair</a>
     <a href="addfuel.php" target="targetframe">Add Fuel</a>
     <a href="searchfuel.php" target="targetframe">Search Fuel</a>
     <a href="other.php" target="targetframe">Other</a>
     <a href="searchother.php" target="targetframe">Search Other Cost</a>
    </div>
  </div>
  
  <li style = "position: relative; left: 160px"> <a href="logout.php">LogOut </a></li>
</ul>
<hr style = "background-color: blue; height: 2px">
<div>
   <iframe src="" height="2000" width="1500" name ="targetframe" ></iframe>
  </div>
</body>
</html>