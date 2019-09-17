<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Collin Jones">
	<meta name="description" content="Login Page for Project">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="normalize.css">	
	<link rel="stylesheet" type="text/css" href="layout.css">

	<title> Log In </title>
	<script>
		// Error checking popup script
		function validateForm() {
			var formUsr = document.forms["login_form"]["username"].value;
			var formPwd = document.forms["login_form"]["password"].value;
			if (formUsr == "" && formPwd == "") {
				alert("Please enter a username and password");
				return false;
			}
			else if (formUsr == ""){
				alert("Please enter a username");
				return false;
			}
			else if (formPwd == ""){
				alert("Please enter a password");
				return false;
			}
		}
	</script>
	<style>
	table, th{
	border-collapse:collapse;
	}
	</style>
</head>
<!------------ CONTENT STARTS HERE --------------->
<body onload="logged();">

   <!-- Navbar -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<a href="homepage.php" class="navbar-brand">Recip-Ez</a>
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
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="about.php" class="nav-link">About Us</a></li>
				<?php 
					if(isset($_SESSION["loggedin"])){
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="logout.php" class="nav-link">Log Out</a></li>';
					}
					else{
						echo '<li style="list-style-type: none;" class="nav-item"><a align="center" href="login.php" class="nav-link">Log In</a></li>';
					}
				?>
			</ul>
		</div>
	</nav>


	<!-- 100% Height of browser -->
	<div id="container">
		<!-- Content of website -->
		<div id="main">

		</div>
	</div>
	<!-- Gets pushed down -->
	<footer id="footer">
		<span id="footer">Created by Team 1</span>
	</footer>

</body>
</html>
