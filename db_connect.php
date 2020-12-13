<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "RqYDfm5pYYQShhAf";
$dbname = "aspora survey";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if(!$conn) {
  die('Could not connect: ' . mysql_error());
}
?>