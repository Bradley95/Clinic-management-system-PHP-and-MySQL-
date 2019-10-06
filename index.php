<!DOCTYPE html>
<html>
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="index.css" type="text/css">
		<!--<link rel="stylesheet" href="Generate/css/bootstrap.css" type="text/css">-->
		<title>Clinic Management System</title>
		<script>
			function gen(){
				window.location="generate/home.html"
			}
		</script>
	</head>
	<body>
		
		<div class="container-fluid">
		<center>
			<h1 style="color: cornflowerblue"> Welcome to Bradley Projects Clinic Management System </h1>
		</center>
		<p class="block-quote">Our aim has always been to bring world–class medical care within the reach of common man.</p>
		<p><?php include("slideshow.php");?></p>
		<h3>&nbsp;&nbsp;  Login or Register to be able to book an Appointment </h3>
		<br><br>
		<?php
		include("server.php");
		login();
		register();
		?>
	<!-- Log in form -->
		<form action="index.php" method="post" class="middle">
			<h4 style="color:black; float: left; position: relative; font-size: 30px;"> Log in </h4>
			<br>
			<input type="email" name="email" placeholder="Email" required>
			<br><br>
			<input type="password" name="password" placeholder="Password" required>
			<br><br>
			<input type="submit" name="submit" value="Login" class="primary" > &nbsp;&nbsp;&nbsp;
			<input type="reset" name="reset"  value="Reset" class="danger">
		</form>
		<div class="side">
			<!-- registration form -->
			<form action="index.php" method="post" class="reg">
				<h4 style="font-size: 30px;">Registration</h4><br>
				<br>
				<input type="text" name="names" placeholder="Full Names" required>
				<br><br>
				<input type="email" name="mails" placeholder="Email" required>
				<br><br>
				<input type="password" name="pwd" placeholder="Pasword" required>
				<br><br>
				<input type="password" name="pwd1" placeholder="Confirm Pasword" required>
				<br><br>
				<input type="submit" name="btn" class="primary" value="Submit">&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reset" class="danger" value="Reset">&nbsp;&nbsp;&nbsp;
				<button class="gen" onClick="gen()">Generate Password</button>
				<br><br>
				<a href="staff.php" class="staff"> Staff Login </a><br>
				<p style="margin-left:70%;">Bradley Projects&copy;<?php echo date('Y'); ?></p>
			</form>
		</div>
		<br><br>
		</div>
	</body>	
</html>