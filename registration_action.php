<?php
include'connect.php';
// error check flag
$eflag = false;

/*  Grabs username and both submitted passwords from
    from html form 
*/

$username = $_POST['username'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];

/*  Error checking for username & password form 
    * Cannot have empty username
    * Cannot have empty password
    * Password confirmation must match
    * Username cannot be the same as password
*/
if (empty($username)) { 
  $eflag = true;
  header("location:registration_page.php?error_emptyUser=1");
  exit;
} 
if (empty($password_1)) { 
  $eflag = true;
  header("location:registration_page.php?error_emptyPass=1");
  exit;
} 
if ($password_1 != $password_2) {
  $eflag = true;
  header("location:registration_page.php?error_missmatch=1");
  exit;
}
if ($username == $password_1){
  $eflag = true;
  header("location:registration_page.php?error_match=1");
  exit;
}
/*  Query to select from the users table where the
    username is the same as the username entered and 
    limit to 1, then save username into $user if found
*/
$user_check_query = "SELECT * FROM users WHERE usernames='$username' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);
if($user){
  $eflag = true;
  header("location:registration_page.php?error_exists=1");
  exit;
}


if($eflag == false){
  // hash the password
  // remove white space
  // query to insert into database
  // connection to database
  $password = password_hash($password_1, PASSWORD_DEFAULT);
  $password = trim($password);
  $query = "INSERT INTO `heroku_b2b63234c9694dc`.`users` (`usernames`, `passwords`) VALUES ('$username', '$password')";
  mysqli_query($conn, $query);

  // set the session user and redirect to homepage
  $_SESSION['user'] = $username;
  header('Location: homepage.php');
  exit;
}
?>