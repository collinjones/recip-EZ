<?php
	include'actions/session_action.php';
	include 'actions/settings_action.php';
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title> Account Settings </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Collin Jones">
	<meta name="description" content="user account settings">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../resources/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/layout.css">
	<script>
		function placeSettings(){

			// grabs variables from settings_action.php
			var username = '<?php echo $phpUsername; ?>';
			var veg_check = '<?php echo $result; ?>';

			//sets placeholder of username based on currently logged in user
			document.getElementById('username').placeholder = username;

			// checks/unchecks vegetarian box
			if(veg_check == 1){
				document.getElementById('veg').checked = true;
				console.log('checked');
			}
			else{
				document.getElementById('veg').checked = false;
				console.log('unchecked');
			}
		}
	</script>

</head>
<!------------ CONTENT STARTS HERE --------------->
<body onload='placeSettings()'>

	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<a href="homepage.php" class="navbar-brand">Recip-Ez</a>

		<!-- Sets the logged status text color -->
		<?php
			if(isset($_SESSION["loggedin"])){
				echo '<span style="color:green"> Logged In </span>';
			}
			else{
				echo '<span style="color:red"> Logged Out </span>';
			}
		?>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMenu">
			<ul class="navbar-nav ml-auto">
				<!-- *NAVBAR LINKS GO HERE* -->
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="homepage.php" class="nav-link">Home</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="addrecipe.php" class="nav-link">Add Recipe </a> </li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="about.php" class="nav-link">About Us</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="user_settings.php" class="nav-link">Account Settings</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="actions/logout_action.php" class="nav-link">Log Out</a></li>
			</ul>
		</div>
	</nav>

	<!-- MIDDLE CONTENT -->
	<div class="container">
		<div class="row">
			<div class="settings-box">
				<form method="post" style="padding:5px; "name="settings-form">
					<div class="form-group">
						<h2>Change Username</h2>
						<input id="username" name="newUsername" type="text" class="form-control" placeholder=''/>
					</div>
					<div class="form-group">
						<h2>Vegetarian?</h2>
						<input id="veg" name="vegetarian" type="checkbox" class="form-control">
					</div>
					<div style="text-align:center" class="form-group">
                    	<input name="send" type="submit" class="btnSubmit" value="Save" />
					</div>

					<!-- ADD DELETE ACCOUNT HERE -->


				</form>
			</div>
		</div>
	</div>

    <!-- FOOTER -->
    <footer>
        <span class="footer-span">&copy; 2019 Team One</span>
    </footer>

</body>
</html>
