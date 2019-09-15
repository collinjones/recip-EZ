<?php
include'connect.php';

$usr = $_POST["username"];
$pwd = $_POST["password"];

//selecting info from database
$query = "SELECT * FROM users WHERE usernames='$usr' AND passwords = '$pwd' LIMIT 1";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

//Check if equal 
if($count == 1){  
 $_SESSION['loggedin'] = true;
 $_SESSION['user'] = $usr;
 header("Location: homepage.php");
 exit; 
}
else{    
 header("location:login.php?error=1");
 exit;
}
?>