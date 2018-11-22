<?php

$servername = "localhost";
$database = "dbschool";
$username = "root";
$password = "";
// Create connection
$dbcon = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$dbcon) {
	echo"<script>alert('fudeu')</script>";
	die("Connection failed: " . mysqli_connect_error());
}


/*$dbcon=mysqli_connect("localhost","root","","dbschool");
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL:" . mysqli_connect_error();
}*/

// mysqli_select_db($dbcon,"dbschool");

?>