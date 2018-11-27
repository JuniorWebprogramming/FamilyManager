<?php
	include 'php/connection.php';
	session_start();

	if($_SESSION["isLoggedInSession"]){
		header("location:loggedin.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required metas -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
  <title>Family Manager</title>
  <!-- Font awesome css link -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Index page style css -->
  <link rel="stylesheet" type="text/css" href="../css/index.css"/>
</head>
<body>
  <!-- Main container div -->
  <div class="container-fluid" id="bgImg"></div>
  <div class="container-fluid row" id="mainContainerDiv">
    <div id="headerDiv" class="container-fluid row">
		<a href="index.php" class="align-self-center"><h1><i class='fas fa-users'></i> Family Manager</h1></a>
		<select class="form-control" id="langSelector" onchange="changeLang()">
			<option>HU</option>
			<option selected>EN</option>
		</select>
	</div>
	<section class="col-lg-6" id="textSection">
		<div id="paragraphsDiv" class="container">
			<div class="container" id="goalsHeader">
				<h3>Goals of the site:</h3>
			</div>
		</div>
	</section>
	<section class="col-lg-6" id="formsSection">
		<div id="loginDiv" class="container">
			<div class="container" id="userIconDiv">
				<i class="fa fa-user-circle fa-8x" aria-hidden="true"></i>
			</div>
			<form class="justify-content-center row" id="loginForm" method="POST" action="php/login.php">
					<input onkeyup="validateLoginForm()" type="text" placeholder="Username:" class="form-control col-8" name="usernameInput" id="usernameInput"/>
				<input onkeyup="validateLoginForm()" type="password" placeholder="Password:" class="form-control col-8" name="passwordInput" id="passwordInput"/>
				<button type="submit" class="btn btn-primary col-8" disabled="disabled" id="loginButton"><i class="fas fa-sign-in-alt"></i> Login</button></br>
				<button type="button" class="btn btn-danger col-8" id="registerButton" onclick="getRegisterForm()"><i class="fas fa-user-plus"></i> Sign up</button>
			</form>
		</div>
		<div id="registerDiv" class="container">
			<form method="POST" action="php/registration.php">
				<fieldset>
					<legend>Names</legend>
					<input onkeyup="validateRegisterFormFirstname(true)" data-toggle="popover" data-trigger="focus"  title="First name" data-content="- minimum 3 character<br>- start with uppercase letter" type="text" placeholder="First Name:" class="form-control" name="firstnameInput" id="firstnameInput"/></br>
					<input onkeyup="validateRegisterFormLastname(true)" type="text" placeholder="Last Name:" class="form-control" name="lastnameInput" id="lastnameInput"/></br>
					<input onkeyup="validateRegisterFormUsername(true)" type="text" placeholder="Username:" class="form-control" name="usernameRegInput" id="usernameRegInput"/></br>
				</fieldset>
				<fieldset>
				<legend>Details</legend>
				<input onkeyup="validateRegisterFormPassword(true)" type="password" placeholder="Password:" class="form-control" name="passwordRegInput" id="passwordRegInput"/></br>
				<input onkeyup="validateRegisterFormEmail(true)" type="email" placeholder="E-mail:" class="form-control" name="emailInput" id="emailInput"/></br>
				<select class="form-control" id="positionInput" name="positionInput">
					<option>Father</option>
					<option>Mother</option>
					<option>Grandfather</option>
					<option>Grandmother</option>
					<option>Step father</option>
					<option>Step mother</option>
					<option>Sister</option>
					<option>Brother</option>
				</select>
				</fieldset></br>
				<button  type="submit" id="signUpBTN" class="btn btn-primary" disabled="disabled"><i class="fas fa-user-plus"></i> Sign up</button>
				<button type="button" class="btn btn-danger" id="cancelButton" onclick="getLoginForm()"><i class="fas fa-cancel"></i> Cancel</button>
			</form>
		</div>
	</section>
  </div>
<script src="../js/indexPage.js"></script>
<script>
	function getRegisterForm(){
		document.getElementById("loginDiv").style.display="none";
		document.getElementById("registerDiv").style.display="block";
	}

	function getLoginForm(){
		document.getElementById("registerDiv").style.display="none";
		document.getElementById("loginDiv").style.display="block";
	}
</script>
<script>
		function changeLang(){
		var lang = document.getElementById("langSelector").value;

		if(lang == "HU"){
			window.location.assign("../hu/index.php");
		}
	}
</script>
<!-- Bootstrap js, jquery links -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
