<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=width-device, initial-scale=1.0">
		<title>Admin page</title>
		<link href="admin.css" type="text/css" rel="stylesheet">
		<link href="Generate/css/bootstrap.css" type="text/css" rel="stylesheet">
		<script src="Script.js"></script>
	</head>
	<body bgcolor="ghostwhite">
		<div id="top">
			<ul>
				<li>
					<p style="color:cornflowerblue; margin-left:100px; font-size:18px;"> Bradley Projects </p>
				</li>
				<li>
					<p> <a href="logout.php" class="out"> Logout </a> </p>
				</li>
			</ul><br><br><br>
		</div>
		<h2><img src="images/DSC_1181.JPG" class="avatar"> Admin Login for Evelyn Hone Clinic </h2>
		<?php
		include('server.php');
		admin();
		noAccessForDoctor();
		noAccessForNormal();
		?>
		<form action="admin.php" method="post" id="add">
			<h1 style="font-display: fallback;">Add Doctor </h1>
			<label>Full names:</label><br>
			<input type="text" name="dname" required>
			<br><br>
			<label>Email:</label><br>
			<input type="email" name="dmail" required>
			<br><br>
			<label>Password:</label><br>
			<input type="password" name="dpass" required>
			<br><br>
			<button class="gen" onClick="generate()">Generate Password</button><br><br>
			<label>Speciality:</label><br>
			<select required value=1 name="dspec">
				<option value="Audiologist" class="option">Audiologist - Ear Expert</option>
				<option value="Allergist" class="option">Allergist - Allergy Expert</option>
				<option value="Anesthesiologist" class="option">Anesthesiologist - Anesthetic Expert</option>
				<option value="Cardiologist" class="option">Cardiologist - Heart Expert</option>
				<option value="Dentist" class="option">Dentist - Oral Care Expert</option>
				<option value="Dermatologist" class="option">Dermatologist - Skin Expert</option>
				<option value="Endocrinologist" class="option">Endocrinologist - Endocrine Expert</option>
			</select><br><br>
			<input type="submit" name="submit" value="Submit" class="primary">&nbsp;&nbsp;&nbsp;
			<input type="reset" value="Reset" class="danger">
			</hr>
		</form>
	<form method="post" action="admin.php" id="add">
		<h2 style="font-display: fallback;">Delete Doctor </h2>
		<input type="email" name="demail" required><br><br>
		<input type="Submit" name="delete" value="Delete" class="primary">
	</form>
	<p style="margin-left:70%;">Bradley Projects&copy;<?php echo date('Y'); ?></p><br><br><br>
	</body>
</html>