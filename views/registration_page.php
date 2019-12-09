<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="author" content="Collin Jones">
    <meta name="description" content="Registration Page for Project">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../resources/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/layout.css">

</head>
<!-------- CONTENT STARTS HERE --------------->
<body onload="checkPass();">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../resources/js/pwd_check_script.js"></script>
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
            </ul>
        </div>
    </nav>

    <!-- Registration UI -->
    <div class="login-container">
        <div class="row">
            <div class="col-md-6 login-form">
                <br><h3>Create an Account</h3>
                <form action=""  method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="username" />
                    </div>
                    <div class="form-group">
                        <input id="psw" name="password_1" type="password" class="form-control" placeholder="password" />
                    </div>
                    <div class="form-group">
                        <input id="cpsw" name="password_2" type="password" class="form-control" placeholder="confirm password" />
                    </div>
                    <!-- Password requirements -->
                   <div id="message" style="display:block">
                        <h3>Password must contain the following:</h3>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            <p id="match" class="invalid">Password and Confirm Password Match</p>
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
                    ?>
                    <div style="text-align:center" class="form-group">
                        <input name="send" type="submit" class="btnSubmit" value="Submit" />
                    </div>
                    <div style="text-align:center" class="form-group">
                        <a href="login.php" class="btn-info">Returning user?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
            <span class="footer-span">&copy; 2019 Team One</span>
    </footer>

</body>
</html>

<?php

    $username = "";
    if(isset($_POST['send'])){
        include'actions/registration_action.php';
    }

?>
