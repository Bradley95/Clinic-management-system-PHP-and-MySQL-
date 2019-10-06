<?php
require("server.php");
  noAccessForAdmin();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Book an Appoitnment</title>
		<link rel="stylesheet" type="text/css" href="patient.css">
		<link rel="stylesheet" type="text/css" href="Generate/css/bootstrap.css">
</head>

<body>
	<div id="top">
		<ul>
		<li>
			<p style="color:cornflowerblue; margin-left:100px; font-size:18px;"> Bradley Projects </p>
		</li>
		<li> <p> <a href="logout.php" class="out"> Logout </a> </p> </li>
		</ul>
		<br><br><br>
	</div>

	<h2><?php echo 'welcome'. @$_SESSION['names'].'!';?></h2>
	<h4>Appointments will be booked only for today. Appointment time will be between 10:00 To 15:30 or 16:30 To 20:30 once booked.</h4>
	<h3>Enter Information</h3><br>
	<div id="data">
<?php
		if(isset($_POST['full']))
		{
           $i = patient_info($_POST['full'],$_POST['age'],$_POST['weight'],$_POST['phone'],$_POST['add']);
                appointment($i, $_POST['special'], $_POST['condition']);
                unset($_POST['full']); //unset all post variables
		}
?>
	<form action="patient.php" method="post" class="forms"><br>
		<label>Full Names: </label><br>
		<input type="text" name="full" required>
		<br><br>
		<label>Age: (in years) </label><br>
		<input type="number" name="age" required>
		<br><br>
		<label> Weight: (in kgs) </label><br>
		<input type="number" name="weight" required>
		<br><br>
		<label> Phone No: </label><br>
		<input type="number" name="phone" required>
		<br><br>
		<label> Address: </label><br>
		<input type="text" name="add" required>
		<br><br>
              <label>Doctor Needed:</label><br>
              <select required value=1 name="special">
                <option value="Audiologist" >Audiologist - Ear Expert</option>
                <option value="Allergist" >Allergist - Allergy Expert</option>
                <option value="Cardiologist">Cardiologist - Heart Expert</option>
                <option value="Dentist" >Dentist - Oral Care Expert</option>
                <option value="Dermatologist" >Dermatologist - Skin Expert</option>
                <option value="Endocrinologist" >Endocrinologist - Endocrine Expert</option>
              </select>
		<br><br>

				<label>Medical Condition / Purpose of visit:</label>
				<br>
              <textarea class="form-control" id="pwd" name="condition" required></textarea>
            
		<br><br>
              <input type="submit"  value="Submit" name="sub" class="btn btn-primary" >
              <input type="reset" name="" class="btn btn-danger">
          </form>
		</div>
	<p style="margin-left:80%;">Bradley Projects&copy;<?php echo date('Y'); ?></p>
	<br><br>
		
</body>
</html>