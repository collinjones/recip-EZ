<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="author" content="Collin Jones">
  <meta name="description" content="Sign Up for Project">
  <title>Sign Up</title>
</head>
<body>
  <div align="center" class="container">
    <div class="jumbotron">
      <fieldset style="width:30%">
        <table border="0">
            <h1>Register</h1>

            <form method="post" action="">

            <tr>
                <td>Username:</td><td><input type="text" name="username"></td>
            </tr>

            <tr>
            	<td>Password:</td><td><input type="password" name="password_1"></td>
            </tr>

            <tr>
    	        <td>Confirm Password:</td><td><input type="password" name="password_2"></td>
            <tr>
                <td>&nbsp;</td>
            	<td>
                  <input type="submit" class="btn btn-success" name="send">
            	</td>
          	</tr>
            <?php
       			if(isset($_GET['error_emptyUser'])==true){
          			echo '<font color="#FF0000"><p> Username is required </p></font color>';
       			}
       			if(isset($_GET['error_emptyPass'])==true){
          			echo '<font color="#FF0000"><p> Password is required </p></font color>';
       			}
       			if(isset($_GET['error_missmatch'])==true){
          			echo '<font color="#FF0000"><p> Passwords do not match </p></font color>';
       			}
       			if(isset($_GET['error_exists'])==true){
          			echo '<font color="#FF0000"><p> Username already exists </p></font color>';
       			}
            if(isset($_GET['error_match'])==true){
                echo '<font color="#FF0000"><p> Username and Password cannot match! </p></font color>';
            }
       		?>

            <p>
            Already a member?<a href="login.php">Sign In</a>
            </p>

            </form>
        	</table>
        </fieldset>
      </div>
    </div>
</body>
</html>

<?php

$username = "";
$errors = array();

// check if user submitted register button
if(isset($_POST['send'])){
include'registration_action.php';
}

?>
