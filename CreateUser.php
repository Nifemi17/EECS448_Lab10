<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$name = $_POST["uname"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "o931f463", "naiWee4a", "o931f463");
$check_username = mysqli_query($mysqli,"SELECT user_id FROM Users WHERE user_id ='$name'");

	/* check connection */
	if ($mysqli->connect_errno)
	{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
	}
	if ($name == ''){
		echo("Please enter a username <br>");
	}
	else if(mysqli_num_rows($check_username) > 0){
			echo("Sorry, this username already exists!");
	}
	else{
		$query = "INSERT INTO Users(user_id) VALUES ('$name')";
		if ($mysqli->query($query) == TRUE)
		{
			echo "Your account was created succesfully";
		}
		else
		{
			echo "Error: Lost connection <br>" . $mysqli->error;
		}
	}
$mysqli->close();
?>
