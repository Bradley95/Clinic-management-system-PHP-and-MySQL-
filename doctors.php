<?php
include("server.php");
staff();
noAccessForAdmin();
noAccessForNormal();
?>
<!doctype html>
<html>
<head>
<title>Doctors</title>
<link href="index.css" type="text/css" rel="stylesheet">

</head>
<body bgcolor="ghostwhite" onLoad="hello()">
	<div id="top">
		<ul>
		<li>
			<p style="color:cornflowerblue; margin-left:100px; font-size:18px;"> Bradley Projects </p>
		</li>
		<li> <p> <a href="logout.php" class="out"> Logout </a> </p> </li>
		</ul>
		<br><br><br>
	</div>
	<br><br>
		<div id="bar">
			<ul>
				<li>Navigation Bar:</li>
				<li><a href="patient.php">Add Patient </a></li>
				<li><a href="appointment.php">Upcoming Appointments </a></li>
			</ul>			
		</div>
	</body>
	</html>

		
