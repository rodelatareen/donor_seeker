<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor_seeker2";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
	echo"Connection Failed";
    die("Connection failed: " . mysqli_connect_error());
	
}
else{
	//echo "Successfully Connected";
}

echo "<br> </br>";
?>
