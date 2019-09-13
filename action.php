<?php

include'login_config.php';
session_start();

//usr and pwd vars
$usr = $_POST["username"];
$pwd = $_POST["password"];

//selecting info from database
$query = "SELECT * FROM login_information WHERE username='$usr' AND password = '$pwd' LIMIT 1";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

//Check if equal 
if($count == 1){  
    echo "Logging in...";
    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $usr;
    header("refresh:2; homepage.php");
    exit; 
 }
else{ 
	echo "Incorrect password...";
    header("refresh:2; login.php"); 
    exit; 
 }

?>