<?php
$name = $_POST["uname"];
$post_content = $_POST["post"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "o931f463", "naiWee4a", "o931f463");
$check_existence = mysqli_query($mysqli,"SELECT user_id FROM Users WHERE user_id ='$name'");

	/* check connection */
	if ($mysqli->connect_errno)
	{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
	}
  if ($name == ''){
		echo("Please enter a username <br>");
	}
	else if ($post_content == ''){
		echo("Please make a post <br>");
	}
  else if (mysqli_num_rows($check_existence) >0)
  {

    //$query = "INSERT INTO Post(author_id,content) VALUES ('$name' , '$post_content')";
		$result = "INSERT INTO Post(author_id, content) VALUES ('$name' , '$post_content')";
    if ($mysqli->query($result) == TRUE)
		{
			echo("Valid Username!\n");
			echo "Your post was posted to the message board succesfully\n";
		}
		else
		{
	  	echo "Error: Lost connection or invalid input <br>" . $mysqli->error;
		}
  }
  else
  {
    echo("Sorry your username is not in our system, please enter a valid username.\n");
  }

$mysqli->close();
?>
