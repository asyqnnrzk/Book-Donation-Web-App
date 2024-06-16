<?php
$hostname = "localhost";
$username = "b032110286";
$password = "020112-08-0526";
$dbname = "student_b032110286";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) 
{
	die("Connection failed: " . mysqli_connect_error());
};

?>