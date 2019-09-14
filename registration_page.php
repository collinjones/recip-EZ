<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration system using PHP & MySQL</title>
</head>
<body>
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
          		<button  type="submit" class="btn" name="reg">Register</button>
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
   		?>

        <p>
        Already a member?<a href="login.php">Sign In</a>
        </p>

        </form>
    	</table>
    </fieldset>
</body>
</html>

<?php
include'login_config.php';

$username = "";
$errors = array();

// check if user submitted register button
if(isset($_POST['reg'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  if (empty($username)) { 
    header("location:registration_page.php?error_emptyUser=1");
    exit;
  }
  elseif(empty($password_1)) { 
    header("location:registration_page.php?error_emptyPass=1");
    exit;
  }
  if ($password_1 != $password_2) {
    header("location:registration_page.php?error_missmatch=1");
    exit;
  }

  $user_check_query = "SELECT * FROM users WHERE usernames='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if($user){
    array_push($errors, "Username already exists");
    header("location:registration_page.php?error_exists=1");
    exit;
  }
  $count_errors = sizeof($errors);
  if($count_errors == 0){
    $password = md5($password_1);
    $query = "INSERT INTO `heroku_b2b63234c9694dc`.`users` (`usernames`, `passwords`) VALUES ('$username', '$password_1')";
    mysqli_query($conn, $query);
    $_SESSION['user'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: homepage.php');
    exit;
  }

}

?>
