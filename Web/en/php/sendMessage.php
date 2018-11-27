<?php

  include 'connection.php';
  session_start();

  $message = mysqli_real_escape_string($connection, $_POST['message']);

  $sql = "INSERT INTO chat (userID, familyID, message) VALUES ('".$_SESSION["userIdSession"]."','".$_SESSION["familyIDSession"]."', '$message')";
	$result = $connection->query($sql);
