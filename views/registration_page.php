<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="author" content="Collin Jones">
    <meta name="description" content="Registration Page for Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../resources/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/layout.css">

</head>
<!-------- CONTENT STARTS HERE --------------->
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
                <li style="list-style-type: none;" class="nav-item"><a align="center" href="about.php" class="nav-link">About Us</a></li>
                <li style="list-style-type: none;" class="nav-item"><a align="center" href="login.php" class="nav-link">Log In</a></li>
            </ul>
        </div>
    </nav>

    <!-- Log in UI -->
    <div class="container filter-container">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Create an Account</h3>
                    <form action=""  method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="username" value="" />
                        </div>
                        <div class="form-group">
                            <input name="password_1" type="password" class="form-control" placeholder="password" value="" />
                        </div>
                        <div class="form-group">
                            <input name="password_2" type="password" class="form-control" placeholder="confirm password" value="" />
                        </div>
                        <div style="text-align:center" class="form-group">
                            <input name="send" type="submit" class="btnSubmit" value="Create Account" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

    <!-- FOOTER -->
    <footer id="footer">
        <div id="container">
            <span>&copy; 2019 Team One</span>
        </div>
    </footer>

</body>
</html>

<?php

    $username = "";
    if(isset($_POST['send'])){
        include'actions/registration_action.php';
    }

?>
