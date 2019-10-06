<?php
ob_start();
if(!isset($_SESSION))
{
	session_start();
}

// connect to database and server
$db=mysqli_connect('localhost', 'root', '', 'clinic') or die ('could not connect to database');

function secure($data)
    {
        return htmlentities($data);
    }
//registering  the user
function register()
{
	global $db;
	if(isset($_POST['btn']))
{
	if(isset($_POST['names']) && isset($_POST['mails']) && isset($_POST['pwd']) && isset($_POST['pwd1']))
	{
		$names  = $_POST['names'];
		$mails  = $_POST['mails'];
		$pwd    = $_POST['pwd'];
		$pw     = $_POST['pwd1'];
		
		if(!empty($names) && !empty($mails) && !empty($pwd) && !empty($pw))
		{
			if($pwd != $pw)
			{
				echo '<p class="con"> The two passwords do not match! </p>';
			
			} else {
				
				$sql = "SELECT `fullname` FROM `users` WHERE `fullname`='$names'";
				$query_run = mysqli_query($db, $sql);
				
				if (mysqli_num_rows($query_run) == 1){
					
					echo '<p class="con"> The username '.$names. ' already exists.';
					
				} else {
					$password=md5($pwd);// encrypting the password before installing into the DB
					$sql="INSERT INTO users (email,fullname, password) VALUES('$mails', '$names', '$password')";
					mysqli_query($db, $sql);
 
				$_SESSION['names'] = $names;
			    header('Location: patient.php');
			}
		}
	}
	}
  }
}
//login the user
function login()
{
	global $db;
	if(isset($_POST['submit']))
{
	$lemail    = $_POST['email'];
	$lpassword = $_POST['password'];
	$pass_hash = md5($lpassword);
		
	if(!empty($lemail) && !empty($lpassword))
	{
		
		$query="SELECT `email`, `password` FROM `users` WHERE `email`='$lemail' AND `password`='$pass_hash'";
		if($query_run = mysqli_query($db,$query))
		{
			$num_rows = mysqli_num_rows($query_run);
			if($num_rows==0)
			{
				echo '<p class="alert-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sorry! Record did not match </p>';
			}
			elseif($num_rows==1)
			{
				$user_name=mysql_result($query_run, 0, 'fullname');
				$_SESSION['names']=$names;
				header('Location: patient.php');
			}
		}
	}
}
}

//inserting patients  information
function patient_info($full,$age,$weight,$phone,$add)
{
	global $db;
	//if(isset($_POST['sub']))

	$full   = secure($full);
	$age    = secure($age);
	$weight = secure($weight);
	$phone  = secure($phone);
	$add    = secure($add);
	
	
	//if(!empty($full) && !empty($age) && !empty($weight) && !empty($phone) && !empty($add))
	
		$querry="INSERT INTO `patient_info` VALUES( null, '$full', '$age', '$weight', '$phone','$add')";
		
	if($db->query($querry)===TRUE)
	{
		$last = $db->insert_id;
		echo '<p class="alert-success">&nbsp; &nbsp; &nbsp; &nbsp;<strong>Success!</strong> Appointment Successully booked, your Appointment number is '.$last. ' </p>';
		return $db->insert_id;
		
	}
	else
	{
		return 0;
	}
		
}

function appointment($patient_id, $special, $cond)
{
	 global $db; global $last_id;
	 //if(isset($_POST['sub']))
	 
		 $patient_id =secure($patient_id);
		 $special = secure($special);
	 	 $cond    = secure($cond);

	 //if(!empty($special) && !empty($cond))
	 
		 $q="INSERT INTO `appointments` VALUES(null, '$patient_id', '$special', '$cond')";
	if($db->query($q)===TRUE)
	{
		$last = $db->insert_id;
	}
	 
 }
//Log the staff members in.
function staff()
{
	global $db;
	if(isset($_POST['sub']))
	{
		$email = $_POST['email'];
		$pass  = $_POST['password'];
		$type  = $_POST['type'];
		
		if(!empty($email) && !empty($pass) && !empty($type))
		{
			if(isset($_POST['type']))
			{
				switch($type)
			{
					case 'admin';
						$query="SELECT `email`, `password` FROM `admin` WHERE `email`='$email' AND `password`='$pass'";
		if($query_run = mysqli_query($db,$query))
		{
			$num_rows = mysqli_num_rows($query_run);
			if($num_rows==0)
			{
				echo '<p class = "alert-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sorry! Record did not match </p>';
			}
			elseif($num_rows==1)
			{
				
				header('Location: admin.php');
			}
		}
					break;
					case 'doctors';
			$query="SELECT `email`, `password` FROM `doctors` WHERE `email`='$email' AND `password`='$pass'";
						
		if($query_run = mysqli_query($db,$query))
		{
			$num_rows = mysqli_num_rows($query_run);
			if($num_rows==0)
			{
				echo '<p class = "alert-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sorry! Record did not match </p>';
			}
			elseif($num_rows==1)
			{
				$user_name=mysql_result($query_run, 0, 'fullname');
				$_SESSION['user_type']=$email;
				header('Location: appointment.php');
			}
		   }
						break;
						default;
	      }
		 }
		}	
	}
}
function admin()
{
	global $db;
	//Adding A new Doctor by the admin;
	if(isset($_POST['submit']))
	{
		$dname = $_POST['dname'];
		$dmail = $_POST['dmail'];
		$dpass = $_POST['dpass'];
		$dspec = $_POST['dspec'];
	if(!empty($dname&&$dmail&&$dpass&&$dspec))
	{
		$sql="INSERT INTO doctors VALUES('$dmail','$dpass','$dname', '$dspec')";
		mysqli_query($db,$sql);
		echo '<p class="alert-success"><strong>Success!</strong> Doctor Added Successfully! </p>';
	}
	}
	//Deleting A doctor
	if(isset($_POST['delete']))
	{
		$demail=$_POST['demail'];
		if(!empty($demail))
		{
			$sql="DELETE * FROM doctors WHERE email='$demail Limit 1'";
			mysqli_query($db,$sql);
			echo '<p class="alert-success"><strong>Success!</strong> Doctor Deleted Successfully! </p>';
		}
		else
		{
			echo '<strong> Sorry! No records found. </strong>';
		}
	}
}

function noAccessForNormal()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'normal') {
                echo '<script type="text/javascript">window.location = "patient.php"</script>';
            }
        }
    }
    function noAccessForDoctor()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'doctor') {
                echo '<script type="text/javascript">window.location = "patient.php"</script>';
            }
        }
    }

    function noAccessForAdmin()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'admin') {
                echo '<script type="text/javascript">window.location = "admin.php"</script>';
            }
        }
    }

    function noAccessIfLoggedIn()
    {
        if (isset($_SESSION['user-type'])) {
            noAccessForNormal();
            noAccessForAdmin();
            noAccessForDoctor();
        }
    }

    function noAccessIfNotLoggedIn()
    {
        if (!isset($_SESSION['user-type'])) {
            echo '<script type="text/javascript">window.location = "index.php"</script>';
        }
    }
?>