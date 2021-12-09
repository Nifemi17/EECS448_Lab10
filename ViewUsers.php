<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "o931f463", "naiWee4a", "o931f463");
if ($mysqli->connect_errno)
{
printf("Connect failed: %s\n", $mysqli->connect_error);
exit();
}
$query = $mysqli->query("SELECT user_id FROM Users");
echo ("Here are the honourable members of your site<br>");
if($query->num_rows > 0)
{
  echo "<table border = '1'>";
  echo "<tr>";
  echo "<th> Username </th> ";
  echo "</tr>";
  while($row = $query->fetch_assoc())
  {
    echo "<tr>";
    echo "<td>";
    echo $row["user_id"];
    echo "</td>";
    echo "</tr>";
  }
}
else {
  echo "No usernames!";
}
echo "<table>";
$mysqli->close();
?>
