<?php
include'session.php';
include'IngredientCodes.php';
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
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="logout.php" class="nav-link">Log Out</a></li>
			</ul>
		</div>
	</nav>

	<!-- MIDDLE CONTENT -->
	<div class="container">
		<div class="row">
			<form method="get">
				<!-- SEARCH -->
				<div class="form-row" style="padding: 20px">	
					<input type="search" class="form-control" id="searchText" placeholder="Search Recipes">
				</div>
				<!-- MEATS SELECTIONS -->
				<label>Meats</label><br>
				<div class="form-row">
					<div class="form-column" style="padding: 5px">
						<button name="1" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Steak
						</button>
					</div>
					<div class="form-column" style="padding: 5px">
						<button name="2" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Chicken
						</button>
					</div>
					<div name="3" class="form-column" style="padding: 5px">
						<button type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Salmon
						</button>
					</div>		
					<div name="4" class="form-column" style="padding: 5px">
						<button type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Pork
						</button>
					</div>
				</div>
				<!-- VEGETABLES SELECTIONS -->
				<label>Vegetables</label><br>
				<div class="form-row">
					<div class="form-column" style="padding: 5px">
						<button name="5" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Green Beens
						</button>
					</div>
					<div class="form-column" style="padding: 5px">
						<button name="6" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Brussel Sprouts
						</button>
					</div>
					<div class="form-column" style="padding: 5px">
						<button name="7" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Zuccinni
						</button>
					</div>
					<div class="form-column" style="padding: 5px">
						<button name="8" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Eggplant
						</button>
					</div>
				</div>
				<!-- SPICES SELECTIONS -->
				<label>Spices</label><br>
				<div class="form-row">
					<div class="form-column" style="padding: 5px">
						<button name="9" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Salt
						</button>
					</div>
					<div class="form-column" style="padding: 5px">
						<button name="10" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
						  Pepper
						</button>
					</div>
				</div>
				<br>
				<div class="form-row">
					<button name="send" type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>

	<!-- FOOTER -->
	<footer id="footer">
		<span id="footer">
			&copy; 2019 Team One
		</span>
	</footer>

</body>
</html>

<?php
    if(isset($_GET['send'])){
        include'homepage_action.php';
    }
?>
