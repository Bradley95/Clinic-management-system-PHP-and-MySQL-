<!doctype html>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Staff Login</title>
		<link href="staff.css" type="text/css" rel="stylesheet">
		
	</head>
	
	<body bgcolor="ghostwhite">
		
		<h2 style="color: cornflowerblue; margin-left: 200px;"> Bradley Projects </h2><br>
		
		<div class="container">	
			
			<h1 align=center>Staff Login for Evelyn Hone Clinic</h1>
			
			<?php
			session_start();
			include('server.php');
			staff();
			noAccessIfLoggedIn()
			?>
			
			<div class="row">
				<div align="center">
					
					<form action="staff.php" method="POST">
						<label>Username:</label>
						<br>
						<input type="text" name="email" style="width: 500px; padding: 10px;" require>
						<br><br>
						<label>Password:</label>
						<br>
						<input type="password" name="password" style="width:500px; padding: 10px;" required>
						<br><br>
						<label>User Type:</label>
						<br>
						<select required value=1 name="type" style="width: 520px; padding: 10px;">
							<option value="admin" class="option">Admin</option>
							<option value="doctors" class="option">Doctor</option>
						</select>
						<br><br>
						<input type="submit" name="sub" class="btn-primary" value="Login"> &nbsp;&nbsp;&nbsp;
						<input type="reset" name="" class="btn-danger">
					</form>
				</div>
			</div>
		</div>
		<br>
		<a href="staff.php" class="staff"> Staff Login </a>
		<p style="margin-left:70%;">Bradley Projects&copy;<?php echo date('Y'); ?></p>
	</body>
</html>