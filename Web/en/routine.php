<?php
	include 'php/connection.php';
	session_start();

	if(!$_SESSION["isLoggedInSession"]){
		header("location:index.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required metas -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Family Manager - Routine</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
  <!-- Font awesome css link -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="../css/resume.css" rel="stylesheet">
	  <!-- Logged in page style css -->
  <link rel="stylesheet" type="text/css" href="../css/routine.css"/>
</head>
<body>
<!-- Main container div -->
	<div class="container-fluid" id="mainContainerDiv">
		<!-- Menu div -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
		<a class="navbar-brand" style="color:white;"><i class='fas fa-users'></i> Family Manager</a>
			<a class="navbar-brand" href="#page-top">
        <span class="d-none d-lg-block">
          <img class="img-fluid img-thumbnail mx-auto mb-2" src="https://via.placeholder.com/150" alt="ProfilePicture">
        </span>
      </a>
			<span class="d-none d-lg-block">
			<div id="profDetailsDiv">
				<p align="center"><?php echo $_SESSION["usernameSession"] ?></p>
				<p align="center"><?php echo "(".$_SESSION["firstnameSession"]." ".$_SESSION["lastnameSession"].")" ?></p>
				<p align="center"><?php echo $_SESSION["emailSession"] ?></p>
				<p align="center"><?php echo $_SESSION["positionSession"] ?></p>
			</div>
			</span>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="loggedin.php"><i class="fas fa-users"></i> Family</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="routine.php"><i class="fas fa-calendar-alt"></i> Daily routine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="programs.php"><i class="fas fa-child"></i> Family programs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exercises.php"><i class="fas fa-list-ul"></i> Exercises</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.php"><i class="fas fa-images"></i> Family gallery</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="chatroom.php"><i class="fas fa-comments"></i> Chatroom</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
		<!-- Main content div -->
		<div class="container" id="contentDiv">

		</div>
	</div>


<!-- Bootstrap js, jquery links -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/loggedinScript.js"></script>
</body>
</html>
