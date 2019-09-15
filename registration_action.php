<?php
include'connect.php';
$username = $_POST['username'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];
$errors = array();

if (empty($username)) { 
  header("location:registration_page.php?error_emptyUser=1");
  exit;
} 
if (empty($password_1)) { 
  header("location:registration_page.php?error_emptyPass=1");
  exit;
} 
if ($password_1 != $password_2) {
  header("location:registration_page.php?error_missmatch=1");
  exit;
}
if ($username == $password_1){
  header("location:registration_page.php?error_match=1");
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
  $password = password_hash($password_1, PASSWORD_DEFAULT);
  $password = trim($password);
  $query = "INSERT INTO `heroku_b2b63234c9694dc`.`users` (`usernames`, `passwords`) VALUES ('$username', '$password')";
  mysqli_query($conn, $query);
  $_SESSION['user'] = $username;
  $_SESSION['success'] = "You are now logged in";
  header('Location: homepage.php');
  exit;
}
?>