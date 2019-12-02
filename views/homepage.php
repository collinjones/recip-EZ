<?php
	include'actions/session_action.php';
	include'actions/connect_action.php';
	$usr = $_SESSION['user'];

	/* check if user logging in is currently set as vegetarian
		(for purpose of updating homepage of current settings)*/
	$veg_check_query = "SELECT vegetarian
						FROM users
						WHERE usernames = '$usr'";
	foreach($conn->query($veg_check_query) as $row){
		$result = $row['vegetarian'];
	}
	if($result == 1){
		$_SESSION['vegetarian'] = true;
	}
	else{
		$_SESSION['vegetarian'] = false;
	}
	$vegetarian = $_SESSION['vegetarian'];
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<title> Homepage </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Collin Jones">
	<meta name="description" content="homepage for recip-ez">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../resources/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/layout.css">
</head>
<!------------ CONTENT STARTS HERE --------------->
<body onload="placeHomepageSettings()">

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
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="homepage.php" class="nav-link">Home</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="addrecipe.php" class="nav-link">Add Recipe </a> </li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="about.php" class="nav-link">About Us</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="user_settings.php" class="nav-link">Account Settings</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="actions/logout_action.php" class="nav-link">Log Out</a></li>
			</ul>
		</div>
	</nav>

	<!-- MIDDLE CONTENT -->
	<div class="filter-container" style="padding-bottom:10px">
		<div class="row">
			<!-- LEFT COLUMN -->
			<div class="column">
				<div class="filter-form-box">
					<form class="filter-form" method="post" action="">
						<h2 class='filter-form'>Ingredient Filter</h2>
						<br>
						<!-- echoed out inside homepage_checkbox_action.php -->
						<?php include'actions/homepage_checkbox_action.php';?>
						<script>
							function showExclusions(numberOfElements) {
								var x = document.getElementById("exclusion").style.visibility;
								document.getElementById("exclusion").style.visibility = x == "visible" ? "collapse" : "visible";
								document.getElementById("exclusion").style.height = x == "visible" ? "0px" : "auto";
				    	}
						</script>
						<!-- SUBMIT BUTTON -->
						<div style="text-align:center" class="form-group">
	                    	<input name="send" type="submit" class="btnSubmit" value="Submit" />
						</div>
					</form>
				</div>
			</div>
			<!-- RIGHT COLUMN -->
			<div class="flex-parent">
				<?php
					if(isset($_POST['send'])){
						include'actions/homepage_action.php';
					}
				?>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<footer>
		<!-- please leave class as footer-span -->
		<span class="footer-span"> &copy; 2019 Team One</span>
	</footer>

</body>
</html>
