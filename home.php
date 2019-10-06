<?php
$email='';
$username='root';
$db=mysqli_connect('localhost', 'root', '', 'bradley') or die('could not connect to database');
?>

<html>
<head>
<meta charset="utf-8">
<title>Hospital Management System</title>
<link rel="stylesheet" type="text/css" href="hospital.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="Font-Awesome-master/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	
<div class="top">
	   <br>
  <ul id="brad">
  <li><a href="#"><i class="fa fa-address-book" style="color: beige;"></i> Contact Us </a></li>
  <li><a href="#">About Us</a></li>
  </ul>
</div>
	
<form action="index.php" method="post" class="inside">
	
		<input type="text"     name="fname"    required="required"   placeholder="First name">
		<br><br>
		<input type="text"     name="lname"    required="required"   placeholder="Last name">
		<br><br>
		<input type="email"    name="mail "    required="required"   placeholder="Enter your email">
		<br><br>
		<input type="password" name="password" required="required"   placeholder="Password">
		<br><br>
		<input type="password" name="password2" required="required"  placeholder="confirm password">
		<br><br>
		<input type="submit"   name="submit"    value="submit"><br>
</form>
	
<div class="sidebar">
	<br>
   <center> <img src="images/DSC_1181.JPG" class="avatar"> <h4>Admin</h4><br></center>
<ul id="navmenu">
        <li><a href="index.php"><i class="fas fa-home" style="color: aliceblue;"></i> Home </a></li>
        <li> <div class="dropdown">
		<a href="#"><i class="fa fa-hospital" style="color:aliceblue;"></i> Departments </a>

<div class="dropdown-content">
    <a href="#"> home </a>
        <br>
    <a href="#"> IT </a>
        <br>
   <a href="#"> Production </a>
 </div>
</div></li>
	
     <li>
		 <a href="doctors.php"><i class="fa fa-thermometer" style="color: aliceblue;"></i> Doctors </a
	</li>
			 
     <li>
		 <a href="nurse.php"><i class="fa fa-theater-masks" style="color: aliceblue;"></i> Nurses </a>
	</li>
			 
	 <li>
		 <a href="patients.php"><i class="fa fa-wheelchair" style="color: aliceblue;"></i> Patients </a
	</li>
    <li>
		 <a href="app.php"> Appointments</a>
	</li>
	<br>
        <li><a href="index.php"><button> Log out </button></a></li>
</ul>
</div>
</body>
</html>