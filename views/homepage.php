<?php
	include'actions/session_action.php';
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Collin Jones">
	<meta name="description" content="Login Page for Project">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../resources/css/normalize.css">	
	<link rel="stylesheet" type="text/css" href="../resources/css/layout.css">

	<title> Homepage </title>
	<style>
		table, th{
			border-collapse:collapse;
		}
		.form-row {
			max-width: 500px;
		}
	</style>
</head>
<!------------ CONTENT STARTS HERE --------------->
<body>

	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="actions/logout_action.php" class="nav-link">Log Out</a></li>
			</ul>
		</div>
	</nav>

	<!-- MIDDLE CONTENT -->
	<div class="container">
		<div class="row">
			<form method="post" action="">
				<!-- SEARCH -->
				<div class="form-row" style="padding: 20px">	
					<input type="search" class="form-control" id="searchText" placeholder="Search Recipes">
				</div>
				<!-- MEATS SELECTIONS -->
				<div style="padding: 20px" class="form-row">
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='1' type="checkbox">Steak
					</div>
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='2' type="checkbox">Chicken
					</div>
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='3' type="checkbox">Salmon
					</div>		
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='4' type="checkbox">Pork
					</div>
				</div>
				<!-- VEGETABLES SELECTIONS -->
				<div style="padding: 20px" class="form-row">
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='5' type="checkbox">Green Beans
					</div>
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='6' type="checkbox">Brussel Sprouts
					</div>
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='7' type="checkbox">Zuccinni
					</div>
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='8' type="checkbox">Eggplant
					</div>
				</div>
				<!-- SPICES SELECTIONS -->
				<div style="padding: 20px" class="form-row">
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='9' type="checkbox">Salt
					</div>
					<div class="form-column" style="padding: 5px">
						<input name='check_list[]' value='10' type="checkbox">Pepper
					</div>
				</div>
				<div class="form-row" style="padding: 20px">
					<div class="dropdown">
					  	<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Dropdown button
					  	</button>
					  	<div style="width:auto"class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					  		<input name='exclusion_list[]' value='1' type="checkbox">
					  		Steak
					  		<input name='exclusion_list[]' value='2' type="checkbox">Chicken
					  		<input name='exclusion_list[]' value='3' type="checkbox">Salmon
					  		<input name='exclusion_list[]' value='4' type="checkbox">
					  		Pork
					  		<input name='exclusion_list[]' value='5' type="checkbox">Green Beans
					  		<input name='exclusion_list[]' value='6' type="checkbox">Brussel Sprouts
					  		<input name='exclusion_list[]' value='7' type="checkbox">Zuccinni
					  		<input name='exclusion_list[]' value='8' type="checkbox">
					  		Eggplant
					  		<input name='exclusion_list[]' value='9' type="checkbox">
					  		Salt
					  		<input name='exclusion_list[]' value='10' type="checkbox">
					  		Pepper
					  	</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col text-center">
						<button name="send" type="submit" class="btn btn-primary center-block">Submit</button>
					</div>
				</div>
			</form>
		</div>	
	</div>

	<!-- FOOTER -->
	<footer id="footer">
		<div id="container">
			<span>&copy; 2019 Team One</span>
		</div>
	</footer>

</body>
</html>

<?php
	if(isset($_POST['send'])){
		include'homepage_action.php';
	}
?>