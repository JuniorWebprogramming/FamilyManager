<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "familymanager";
	
	$connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	
	if (!$connection->set_charset("utf8")) {
		echo"Error loading character set utf8: %s\n".$connection->error;
		exit();
	}
	
