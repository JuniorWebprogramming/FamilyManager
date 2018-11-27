<?php 

	include 'connection.php';
	session_start();

	$familyname =$_POST['familyNameInput'];
	
	$query = "INSERT INTO familys (familyName, Members) VALUE ('".$familyname."', ". 1 .")";
	$result = $connection->query($query);
	
	$query2 = "SELECT familyID FROM familys WHERE familyName = '".$familyname."'";
	$result2 = $connection->query($query2);
	
	$row = $result2->fetch_assoc();
	
	$query3 = "INSERT INTO familytouser (familyID, userID) VALUE (".$row['familyID'].", ".$_SESSION["userIdSession"].")";
	$result3 = $connection->query($query3);
	
	header("location:../loggedin.php");