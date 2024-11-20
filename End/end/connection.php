<?php
	//establish database connection
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "end";
	
	$conn = mysqli_connect($server, $user, $password, $database);
	
	//if $conn is false
	if(!$conn){
		die("Something went wrong");
	}
?>