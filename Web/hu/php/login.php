<?php

	include 'connection.php';
	session_start();

	$username = mysqli_real_escape_string($connection, $_POST['usernameInput']);
	$password = mysqli_real_escape_string($connection, $_POST['passwordInput']);

	$sql = "SELECT Id, First_Name, Last_Name, Username, Password, Email, Position FROM users WHERE Username='".$username."'";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if(password_verify($password ,$row['Password'])){
					$sql2 = "UPDATE users SET Online = 1 WHERE Username='".$username."'";
					$connection->query($sql2);
					$_SESSION["userIdSession"] = $row['Id'];
					$_SESSION["firstnameSession"] = $row['First_Name'];
					$_SESSION["lastnameSession"] = $row['Last_Name'];
					$_SESSION["emailSession"] = $row['Email'];
					$_SESSION["usernameSession"] = $row['Username'];
					$_SESSION["positionSession"] = $row['Position'];
					$_SESSION["isLoggedInSession"] = true;
					header("location:../loggedin.php");
				}
    }
		echo "Rossz jelszót adott meg.";
	}else{
		echo "Rossz felhasználónevet adott meg.";
	}
