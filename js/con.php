<?php
	$servername = "localhost";
	$username = "root";
	$password = "admin123";
	$db="ajax_crudtest";
	$conn = mysqli_connect($servername, $username, $password,$db);
	if($conn->connect_error){
		die("not connected".$conn->connect_error);
	}