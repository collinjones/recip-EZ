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
	<link rel="stylesheet" type="text/css" href="navbar.css">

	<title> Log In </title>
	<script>
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
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<a href="homepage.php" class="navbar-brand">CSCI3308 Project</a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMenu">
			<ul class="navbar-nav ml-auto">
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="registration_page.php" class="nav-link">Create Account</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="homepage.php" class="nav-link">Home</a></li>
				<li style="list-style-type: none;" class="nav-item"><a align="center" href="about.php" class="nav-link">About Us</a></li>
			</ul>
		</div>
	</nav>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<div align="center" class="container">
		<div class="jumbotron">
			<table>
				<h1 align="center">Login</h1>
				<form name="login_form" action="" onsubmit="return validateForm()" method="post">
				  <tr>
				  <th><input type="text" name="username" placeholder="Username"></th>
				  </tr>
				  <tr>
				  <th><input type="password" name="password" placeholder="Password"></th>
				  </tr>
				  <tr>
				  <th><input type="submit" class="btn btn-success" name="send"></th>
				  </tr>
				</form> 
				<?php
				if(isset($_GET['error'])==true){
				  echo '<font color="#FF0000"><p> Username / Password do not match </p></font color>';
				} 
				?>
			</table>
		</div>
	</div>
</body>
</html>

<?php
if(isset($_POST['send'])){
	include'login_action.php';
}
?>
