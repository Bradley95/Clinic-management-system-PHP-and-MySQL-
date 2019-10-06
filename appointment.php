<?php
 include('doctors.php');
?>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="app.css" type="text/css">
		<title>Upcoming Appointments</title>
	</head>
	<body>
		<div class = 'container'>
			<div id="content">
				<h2 class="page">&nbsp;&nbsp;&nbsp; All Appointments</h2>
				<?php
				global $db;
				$sql="SELECT app_no, speciality,fullname, weight, phone_no, address, medical_condition FROM patient_info, appointments WHERE app_no=app_no AND patient_info.patient_id = appointments.patient_id";
				$result=mysqli_query($db,$sql);
				if ($result)
				{
					echo '<table class="table"><tr class="heading">
					<td class="col head"><b>Appointment No</b></td>
					<td class="col head"><b>FullName</b></td>
					<td class="col head"><b>Medical Condition</b></td>
					<td class="col head"><b>Doctor Needed</b></td>';
					// Fetch and print all the records: 
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
					{
						echo '<tr class="heading2">
						<td class="col">' .$row['app_no'].'</td>
						<td class="col">' .$row['fullname'].'</td>
						<td class="col">' .$row['medical_condition'].'</td>
						<td class="col">' .$row['speciality'].'</td>
						<td class="last1">
						<a href="del.php?id='.$row['app_no'].'">Delete</a>
						</td></tr>';
						echo '<br>';
					}
					echo '</table>';
					mysqli_free_result ($result); // Free up the resources.
				}
				else
				{
					// If there was an error.
					echo '<p>' . mysqli_error($db) . '<br><br>Query: ' . $q . '</p>';
				}
				mysqli_close($db); // Close the database connection.
				?>
			</div>
		</div>
		<br>
		<p style="margin-left:60%;">Bradley Projects&copy;<?php echo date('Y'); ?></p>
	</body>
</html>