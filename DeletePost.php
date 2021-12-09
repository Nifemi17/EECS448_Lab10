<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$content = $_POST["post_content"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "o931f463", "naiWee4a", "o931f463");

if ($mysqli->connect_errno) {printf("Connect failed: %s\n", $mysqli->connect_error);exit();}
$query = "SELECT * FROM Post WHERE content = '$content'";

if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
      $delete = mysqli_query($mysqli, "DELETE FROM Post WHERE content = '$content'");
      echo "Post successfully deleted, ";
      echo "The post id of the deleted post was: ";
      echo $row["post_id"];
    }
}
$mysqli->close();
?>
