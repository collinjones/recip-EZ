<?php
include'connect.php';
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
?>