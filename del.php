<?php
session_start();
?>
<!doctype html>
<html lang=en>
<head>
<title>Delete a record</title>
</head>
<body>
<h2>Delete a Record</h2>
<?php
require ('server.php');
	
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if ($_POST['sure'] == 'Yes') 
	{
		$q = "DELETE FROM appointments WHERE app_no=app_no LIMIT 1";
		$result = @mysqli_query ($db, $q);
if (mysqli_affected_rows($db ) == 1) 
{
	echo '<h3>The record has been deleted.</h3>';
} 
		else
		{
			echo '<p class="error">The record could not be deleted.<br>Probably
                  because it does not exist or due to a system error.</p>';
            echo '<p>' . mysqli_error($db ) . '<br />Query: ' . $q . '</p>';
		}
} 
	else
	{
		echo '<h3>The user has NOT been deleted.</h3>';
	}
}
	else 
	{
        echo "<h3>Are you sure you want to permanently delete?</h3>";
        echo '<form action="del.php" method="post"> 
              <input id="submit-yes" type="submit" name="sure" value="Yes">
              <input id="submit-no" type="submit" name="sure" value="No">
              <input type="hidden" name="app_no" value="">
              </form>';
	}
mysqli_close($db);
?>
</body>
</html>