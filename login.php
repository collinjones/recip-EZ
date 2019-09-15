<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="author" content="Collin Jones">
	<meta name="description" content="Login Page for Project">
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
<div align="center" class="container">
	<div class="jumbotron">
		<body>
			<table>
				<h1 align="center">Login</h1>
				<p1>
				  Not a member?<a href="registration_page.php"> Sign Up</a>
				</p1>
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
		</body>
	</div>
</div>
</html>

<?php
if(isset($_POST['send'])){
	include'login_action.php';
}
?>
