<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "busbooking_ezfare";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
else{
	//echo "connected";//
}
?>