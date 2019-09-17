<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Collin Jones">
    <meta name="description" content="Sign Up for Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="layout.css">
    <link rel="stylesheet" type="text/css" href="normalize.css">

    <title>Sign Up</title>

    <style>
    table, th{
    border-collapse:collapse;
    }
    </style>

</head>
<!-------- CONTENT STARTS HERE --------------->
<body>
  <!-- Navbar UI -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a href="homepage.php" class="navbar-brand">Recip-Ez</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ml-auto">
        <li style="list-style-type: none;" class="nav-item"><a align="center" href="login.php" class="nav-link">Log in</a></li>
        <li style="list-style-type: none;" class="nav-item"><a align="center" href="about.html" class="nav-link">About Us</a></li>
      </ul>
      </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- 100% Height of browser -->
  <div id="container">
    <!-- Content of website -->
    <div id="main">
      <!-- Create Account UI -->
      <div align="center" class="container">
        <div class="jumbotron">
            <table>
                <h1>Create Account</h1>

                <form method="post" action="">

                <tr>
                    <th>Username:</th><th><input type="text" name="username"></th>
                </tr>

                <tr>
                	<th>Password:</th><th><input type="password" name='password_1'></th>
                </tr>

                <tr>
        	        <th>Confirm<br>Password:</th><th><input type="password" name='password_2'></th>
                <tr>
                    <th>&nbsp;</th>
                	<th>
                      <input type="submit" class="btn btn-success" name="send">
                	</th>
              	</tr>

                <!-- PHP Error checking for account creation -->
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
                </form>
            </table>
          </div>
        </div> 
      </div>
    </div>
      <!-- Gets pushed down -->
  <footer id="footer">
    <span id="footer">Created by Team 1</span>
  </footer>

</body>
</html>

<?php

$username = "";
$errors = array();
if(isset($_POST['send'])){
  include'registration_action.php';
}

?>
