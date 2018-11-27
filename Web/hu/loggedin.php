<?php
	include 'php/connection.php';
	session_start();


	if(!$_SESSION["isLoggedInSession"]){
		header("location:index.php");
	}

	$query = "SELECT * FROM familytouser INNER JOIN familys ON familytouser.familyID = familys.familyID WHERE userID = ".$_SESSION['userIdSession'];
	$result = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <!-- Required metas -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Family Manager - Familys</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png" />
  <!-- Font awesome css link -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="../css/resume.css" rel="stylesheet">
	  <!-- Logged in page style css -->
  <link rel="stylesheet" type="text/css" href="../css/loggedin.css"/>
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
				<p align="center"><?php echo $_SESSION["usernameSession"]." (".$_SESSION["firstnameSession"]." ".$_SESSION["lastnameSession"].")" ?></p>
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
            <a class="nav-link active" href="loggedin.php"><i class="fas fa-users"></i> Család</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="routine.php"><i class="fas fa-calendar-alt"></i> Napi rutin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="programs.php"><i class="fas fa-child"></i> Családi programok</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exercises.php"><i class="fas fa-list-ul"></i> Feladatok</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.php"><i class="fas fa-images"></i> Családi galléria</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="chatroom.php"><i class="fas fa-comments"></i> Társalgó</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/logout.php"><i class="fas fa-sign-out-alt"></i> Kijelentkezés</a>
          </li>
        </ul>
      </div>
    </nav>
		<!-- Main content div -->
		<div class="container" id="contentDiv">
			<?php
				if ($result->num_rows == 0){
					echo "
					<div class='row' id='cardHolderDiv'>
						<div class='card col-lg-5 createDiv'>
								<img class='card-img-top' src='../img/createFamilyCard.png' alt='Card image cap'>
								<div class='card-body'>
									<h5 class='card-title'>Család létrehozása</h5>
									<p class='card-text'>Létrehozhatod a családod csoportját.</p>
									<a href='#' class='btn btn-primary' data-toggle='modal' data-target='#createFamilyModal'><i class='fas fa-users-cog'></i> Család létrehozása</a>
								</div>
							</div>
							<div class='card col-lg-5 createDiv'>
								<img class='card-img-top' src='../img/connectFamilyCard.png' alt='Card image cap'>
								<div class='card-body'>
									<h5 class='card-title'>Csatlakozás egy családhoz</h5>
									<p class='card-text'>Csatlakozz hozzá egy már meglévő családhoz.</p>
									<a href='#' class='btn btn-primary' data-toggle='modal' data-target='#connectFamilyModal'><i class='fas fa-plug'></i> Csatlakozás családhoz</a>
								</div>
							</div>
						</div>";
				}else{


					$row = $result->fetch_assoc();

					$_SESSION["familyIDSession"] = $row['familyID'];

					echo "<div class='card' id='familyDiv' style='width: 14rem; height: 20rem;'>
							<img class='card-img-top' src='https://via.placeholder.com/100' alt='Card image cap'>
							<div class='card-body'>
								<h5 class='card-title'>".$row['familyName']."</h5>
								<p class='card-text'>Tagok száma: ".$row['Members']."</p>
								<a href='#' class='btn btn-primary' data-toggle='modal' data-target='#connectFamilyModal'><i class='fas fa-cogs'></i> Kezelés</a>
							</div>
						</div>
						<div class='container table-hover table-responsive ' id='tableDiv'>
						<table class='table table-bordered table-light'>
						  <thead>
							<tr>
							  <th scope='col'>#</th>
							  <th scope='col'>Vezetéknév</th>
							  <th scope='col'>Keresztnév</th>
							  <th scope='col'>Szerepkör</th>
							  <th scope='col'>Státusz</th>
							</tr>
						  </thead>
						  <tbody>
							<tr>
							  <th scope='row'>1</th>
							  <td>Mark</td>
							  <td>Otto</td>
							  <td>@mdo</td>
							  <td>@mdo</td>
							</tr>
							<tr>
							  <th scope='row'>2</th>
							  <td>Jacob</td>
							  <td>Thornton</td>
							  <td>@fat</td>
							  <td>@mdo</td>
							</tr>
							<tr>
							  <th scope='row'>3</th>
							  <td>Larry</td>
							  <td>the Bird</td>
							  <td>@twitter</td>
							  <td>@mdo</td>
							</tr>
						  </tbody>
						</table>
						</div>
						";

				}
			?>
		</div>
	</div>

	   <!-- Create family modal -->
  <div class="modal fade" id="createFamilyModal" tabindex="-1" role="dialog" aria-labelledby="createFamilyModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#E9967A;">
            <h5 class="modal-title" id="registerModalLabel"> <i class="fas fa-user-plus"></i> Család létrehozása</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
			<form method="POST" action="php/createFamily.php">
				<fieldset>
					<legend>Név</legend>
					<input onkeyup="validateFamilyname()" type="text" placeholder="Család neve:" class="form-control" name="familyNameInput" id="familyNameInput"/></br>
				</fieldset>
				<button id="createFamilyBTN"  type="submit" disabled="disabled" class="btn btn-primary"><i class="fas fa-user-plus"></i> Létrehozás</button>
			</form>
		  </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Mégse</button>
          </div>
        </div>
      </div>
    </div>

		   <!-- Connect to family modal -->
  <div class="modal fade" id="connectFamilyModal" tabindex="-1" role="dialog" aria-labelledby="connectFamilyModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#E9967A;">
            <h5 class="modal-title" id="registerModalLabel"> <i class='fas fa-plug'></i> Csatlakozás családhoz</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
			<form method="POST" action="php/connectToFamily.php">
				<fieldset>
					<legend>Keresés családnév alapján:</legend>
					<input type="text" placeholder="Family name:" class="form-control" name="familyNameInput" id="familyNameInput"/></br>
				</fieldset>
				<button  type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Keresés</button>
			</form><br>
			<div id="foundedFamilyDiv">
				<p>Találat:</p>
			</div>
		  </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Mégse</button>
          </div>
        </div>
      </div>
    </div>
<script src="js/loggedinScript.js"></script>
<!-- Bootstrap js, jquery links -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="../js/loggedinScript.js"></script>
</body>
</html>
