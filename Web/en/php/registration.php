<?php

	include 'connection.php';
	session_start();

  $firstname = mysqli_real_escape_string($connection, $_POST['firstnameInput']);
  $lastname = mysqli_real_escape_string($connection, $_POST['lastnameInput']);
  $username = mysqli_real_escape_string($connection, $_POST['usernameRegInput']);
  $password = mysqli_real_escape_string($connection, $_POST['passwordRegInput']);
  $email = mysqli_real_escape_string($connection, $_POST['emailInput']);
  $position = mysqli_real_escape_string($connection, $_POST['positionInput']);

  $hash = password_hash($password, PASSWORD_BCRYPT);

  $query = "INSERT INTO users (First_Name, Last_Name, Username, Password, Email, Position, Online) VALUES ('$firstname', '$lastname', '$username', '$hash', '$email', '$position', 0)";
  $connection->query($query);
  
  header("location:../index.php");
