<!-- SESSION START -->
<?php
	ob_start();
	include'actions/session_action.php';
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<title> Add a Recipe </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Rees LaBree">
	<meta name="description" content="Page for adding a recipe to the database.">

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
	<div class="add-recipe-box">
		<form method="post" action="">

			<!-- TODO: Add limiters so users cannot break these forms -->
			<!-- TITLE OF RECIPE -->
			<h4>Name of recipe</h4>
			<input class="form-control" name="recipeName">

            <!-- DECRIPTION OF RECIPE -->
            <h4>Short description of recipe</h4>
			<input class="form-control" name="description">

<<<<<<< HEAD
                        <!-- URL OF IMAGE FOR RECIPE -->
						<input name="recipeimg">						

						<!-- MEATS SELECTIONS -->
						<h4>MEATS</h4>
						<div style="padding: 5%" class="form-row">
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="1" type="checkbox" class="custom-control-input" id="steak">
								    <label class="custom-control-label" for="steak">Steak</label>
								</div>
							</div>
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="2" type="checkbox" class="custom-control-input" id="chicken">
								    <label class="custom-control-label" for="chicken">Chicken</label>
								</div>
							</div>
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="3" type="checkbox" class="custom-control-input" id="salmon">
								    <label class="custom-control-label" for="salmon">Salmon</label>
								</div>
							</div>		
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="4" type="checkbox" class="custom-control-input" id="pork">
								    <label class="custom-control-label" for="pork">Pork</label>
								</div>
							</div>
						</div>
						<!-- VEGETABLES SELECTIONS -->
						<h4>VEGETABLES</h4>
						<div style="padding: 5%" class="form-row">
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="5" type="checkbox" class="custom-control-input" id="green_beans">
								    <label class="custom-control-label" for="green_beans">Green Beans</label>
								</div>
							</div>
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="6" type="checkbox" class="custom-control-input" id="brussel_sprouts">
								    <label class="custom-control-label" for="brussel_sprouts">Brussel Sprouts</label>
								</div>
							</div>
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="7" type="checkbox" class="custom-control-input" id="zuccinni">
								    <label class="custom-control-label" for="zuccinni">Zuccinni</label>
								</div>
							</div>
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="8" type="checkbox" class="custom-control-input" id="eggplant">
								    <label class="custom-control-label" for="eggplant">Eggplant</label>
								</div>
							</div>
						</div>
						<!-- SPICES SELECTIONS -->
						<h4>SPICES</h4>
						<div style="padding: 5%" class="form-row">
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="9" type="checkbox" class="custom-control-input" id="salt">
								    <label class="custom-control-label" for="salt">Salt</label>
								</div>
							</div>
							<div class="form-column" style="padding: 5px">
								<div class="custom-control custom-checkbox">
								    <input name="check_list[]" value="10" type="checkbox" class="custom-control-input" id="pepper">
								    <label class="custom-control-label" for="pepper">Pepper</label>
								</div>
							</div>
						</div>
						<!-- SUBMIT BUTTON -->
						<div style="text-align:center" class="form-group">
	                    	<input name="send" type="submit" class="btnSubmit" value="Submit" />
						</div>
					</form>
				</div>
			</div>
			<!-- RIGHT COLUMN -->
			<div class="flex-column">
				<?php
					if(isset($_POST['send'])){
						include'actions/addrecipe_action.php';
					}
				?>
=======
            <!-- URL FOR RECIPE -->
            <h4>Link to recipe</h4>
			<input class="form-control" name="recipeURL">

            <!-- URL OF IMAGE FOR RECIPE -->
            <h4>URL of image for recipe</h4>
            <p>right click an image and click save target location</p>
            <input class="form-control" name="imgURL">

			<?php include'actions/homepage_checkbox_action_addrecipe.php';?>

			<!-- SUBMIT BUTTON -->
			<div style="text-align:center" class="form-group">
            	<input name="send" type="submit" class="btnSubmit" value="Submit" />
>>>>>>> 6c194c6b50b5b24c311b678aba8ea0c96add25bc
			</div>
		</form>
	</div>

    <!-- FOOTER -->
    <footer>
        <span class="footer-span">&copy; 2019 Team One</span>
    </footer>

</body>
</html>

<?php
					if(isset($_POST['send'])){
						include'actions/addrecipe_action.php';
					}
				?>
