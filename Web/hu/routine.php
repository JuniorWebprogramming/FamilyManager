<?php
	include 'php/connection.php';
	session_start();

	if(!$_SESSION['isLoggedInSession']){
		header('location:index.php');
	}

	$sql = 'SELECT userID, exerciseName, exerciseCell FROM exercises WHERE userID ='.$_SESSION['userIdSession'];
	$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang='hu'>
<head>
  <!-- Required metas -->
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <title>Family Manager - Routine</title>
  <link rel='shortcut icon' type='image/x-icon' href='../img/icon.png' />
  <!-- Font awesome css link -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>
  <!-- Bootstrap css -->
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
	<link href='../css/resume.css' rel='stylesheet'>
	  <!-- Logged in page style css -->
  <link rel='stylesheet' type='text/css' href='../css/routine.css'/>
</head>
<body>
<!-- Main container div -->
	<div class='container-fluid' id='mainContainerDiv'>
		<!-- Menu div -->
		<nav class='navbar navbar-expand-lg navbar-dark bg-primary fixed-top' id='sideNav'>
		<a class='navbar-brand' style='color:white;'><i class='fas fa-users'></i> Family Manager</a>
			<a class='navbar-brand' href='#page-top'>
        <span class='d-none d-lg-block'>
          <img class='img-fluid img-thumbnail mx-auto mb-2' src='https://via.placeholder.com/150' alt='ProfilePicture'>
        </span>
      </a>
			<span class='d-none d-lg-block'>
			<div id='profDetailsDiv'>
				<p align='center'><?php echo $_SESSION['usernameSession'].' ('.$_SESSION['firstnameSession'].' '.$_SESSION['lastnameSession'].')' ?></p>
				<p align='center'><?php echo $_SESSION['emailSession'] ?></p>
				<p align='center'><?php echo $_SESSION['positionSession'] ?></p>
			</div>
			</span>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav'>
          <li class='nav-item'>
            <a class='nav-link' href='loggedin.php'><i class='fas fa-users'></i> Család</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link active' href='routine.php'><i class='fas fa-calendar-alt'></i> Napi rutin</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='programs.php'><i class='fas fa-child'></i> Családi programok</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='exercises.php'><i class='fas fa-list-ul'></i> Feladatok</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='gallery.php'><i class='fas fa-images'></i> Családi galléria</a>
          </li>
					<li class='nav-item'>
            <a class='nav-link' href='chatroom.php'><i class='fas fa-comments'></i> Társalgó</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='php/logout.php'><i class='fas fa-sign-out-alt'></i> Kijelentkezés</a>
          </li>
        </ul>
      </div>
    </nav>
		<!-- Main content div -->
		<div class='container' id='contentDiv'>
			<div class='table-responsive' id='tableDiv'>
				<table class='table table-hover table-bordered table-condensed table-striped' style='height:95%; margin-top:1%;'>
					<thead>
						<tr>
							<th>Napszak</th>
							<th>Hétfő</th>
							<th>Kedd</th>
							<th>Szerda</th>
							<th>Csütörtök</th>
							<th>Péntek</th>
							<th>Szombat</th>
							<th>Vasárnap</th>
						</tr>
					</thead>
					<tbody>
								<tr>
									<td>Reggel</td>
									<td><div class='row_data' edit_type='click' col_name='mondayMorning'><?php while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'mondayMorning'){ echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='tuesdayMorning'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'tuesdayMorning'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='wednesdayMorning'><?php $result = $connection->query($sql); while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'wednesdayMorning'){ echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='thursdayMorning'><?php $result = $connection->query($sql); while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'thursdayMorning'){ echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='fridayMorning'><?php $result = $connection->query($sql); while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'fridayMorning'){ echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='saturdayMorning'><?php $result = $connection->query($sql); while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'saturdayMorning'){ echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='sundayMorning'><?php $result = $connection->query($sql); while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'sundayMorning'){ echo $row['exerciseName'];}} ?></div></td>
								</tr>
								<tr>
									<td>Délelőtt</td>
									<td><div class='row_data' edit_type='click' col_name='mondayForenoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'mondayForenoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='tuesdayForenoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'tuesdayForenoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='wednesdayForenoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'wednesdayForenoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='thursdayForenoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'thursdayForenoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='fridayForenoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'fridayForenoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='saturdayForenoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'saturdayForenoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='sundayForenoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'sundayForenoon'){  echo $row['exerciseName'];}} ?></div></td>
								</tr>
								<tr>
									<td>Ebédidő</td>
									<td><div class='row_data' edit_type='click' col_name='mondayNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'mondayNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='tuesdayNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'tuesdayNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='wednesdayNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'wednesdayNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='thursdayNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'thursdayNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='fridayNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'fridayNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='saturdayNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'saturdayNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='sundayNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'sundayNoon'){  echo $row['exerciseName'];}} ?></div></td>
								</tr>
								<tr>
									<td>Kora délután</td>
									<td><div class='row_data' edit_type='click' col_name='mondayEAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'mondayEAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='tuesdayEAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'tuesdayEAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='wednesdayEAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'wednesdayEAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='thursdayEAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'thursdayEAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='fridayEAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'fridayEAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='saturdayEAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'saturdayEAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='sundayEAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'sundayEAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
								</tr>
								<tr>
									<td>Késő délután</td>
									<td><div class='row_data' edit_type='click' col_name='mondayLAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'mondayLAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='tuesdayLAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'tuesdayLAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='wednesdayLAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'wednesdayLAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='thursdayLAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'thursdayLAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='fridayLAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'fridayLAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='saturdayLAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'saturdayLAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='sundayLAfterNoon'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'sundayLAfterNoon'){  echo $row['exerciseName'];}} ?></div></td>
								</tr>
								<tr>
									<td>Este</td>
									<td><div class='row_data' edit_type='click' col_name='mondayEvening'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'mondayEvening'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='tuesdayEvening'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'tuesdayEvening'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='wednesdayEvening'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'wednesdayEvening'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='thursdayEvening'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'thursdayEvening'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='fridayEvening'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'fridayEvening'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='saturdayEvening'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'saturdayEvening'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='sundayEvening'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'sundayEvening'){  echo $row['exerciseName'];}} ?></div></td>
								</tr>
								<tr>
									<td>Éjszaka</td>
									<td><div class='row_data' edit_type='click' col_name='mondayNight'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'mondayNight'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='tuesdayNight'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'tuesdayNight'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='wednesdayNight'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'wednesdayNight'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='thursdayNight'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'thursdayNight'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='fridayNight'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'fridayNight'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='saturdayNight'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'saturdayNight'){  echo $row['exerciseName'];}} ?></div></td>
									<td><div class='row_data' edit_type='click' col_name='sundayNight'><?php $result = $connection->query($sql);  while($row = $result->fetch_assoc()){if($row['exerciseCell'] == 'sundayNight'){  echo $row['exerciseName'];}} ?></div></td>
								</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<!-- Bootstrap js, jquery links -->
<script src='https://code.jquery.com/jquery-3.1.1.min.js'  crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
<script src='../js/routine.js'></script>
</body>
</html>
