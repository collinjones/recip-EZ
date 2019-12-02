<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title> About us </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Collin Jones">
	<meta name="description" content="about us page for recip-ez">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../resources/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/layout.css">

</head>
<!------------ CONTENT STARTS HERE --------------->
<body>

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
				<!-- Updates Log In / Log Out link based user logged in status -->
				<?php
					if(isset($_SESSION["loggedin"])){
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="homepage.php" class="nav-link">Home</a></li>';
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="addrecipe.php" class="nav-link">Add Recipe </a> </li>';
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="about.php" class="nav-link">About Us</a></li>';
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="user_settings.php" class="nav-link">Account Settings</a></li>';
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="actions/logout_action.php" class="nav-link">Log Out</a></li>';
					}
					else{
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="registration_page.php" class="nav-link">Create Account</a></li>';
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="login.php" class="nav-link">Log In</a></li>';
					}
				?>
			</ul>
		</div>
	</nav>

	<!-- MIDDLE CONTENT -->
	<div class="about-us">
		<h1 style="color:white;"> Website Information</h1>
		<p> Our team decided to develop a recipe searching tool. We are all computer science major's who eat food, so it seemed like a fitting and useful project idea.
		<br><br>
		To get started, either login to your exsisting account, or click create an account if you are a new user. The login feature allows us to save personalized settings and recipes for each user. After logging in, the current user is directed to the home page where the real magic happens.
		<br><br>
		From here the user can either search for a specific recipe, or check boxes of ingredients they currently have and would like to make a meal out of. Our website then populates a list of recipes similar to the ingredients the user included or exluded.
		<br><br>
		The account settings tab will allow the user to specify certain dietary options (i.e vegetarian), change their username, and delete ther account should they choose. To log out of you session click the logout tab.
	</div>

    <!-- FOOTER -->
    <footer>
        <span class="footer-span">&copy; 2019 Team One</span>
    </footer>

</body>
</html>
