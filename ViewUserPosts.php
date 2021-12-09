<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$name = $_POST["users"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "o931f463", "naiWee4a", "o931f463");

if ($mysqli->connect_errno) {printf("Connect failed: %s\n", $mysqli->connect_error);exit();}

$query = "SELECT * FROM Post WHERE author_id = '" .$_POST["users"] . "';";
if ($result = $mysqli->query($query))
{
  if($result->num_rows == 0)
  {
    echo "Oops! this person has no post";
  }
  else
  {
    echo "<table border = '1'>";
    echo "<tr>";
    echo "<th> Author </th> ";
    echo "<th> Post </th> ";
    echo "</tr>";

    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>";
        echo "$name";
        echo "</td>";
        echo "<td>";
        echo $row["content"];
        echo "</td>";
        echo "</tr>";
    }

  }
}
echo "<table>";
$mysqli->close();

?>
