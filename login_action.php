<?php
include'connect.php';

$usr = $_POST['username'];
$pwd = $_POST['password'];

//selecting info from database
$query = "SELECT * FROM users WHERE usernames='$usr' LIMIT 1";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
//$hashed = password_hash($pwd, PASSWORD_DEFAULT);
//Check if equal 
if($count == 1){ // User found 
	$userRow = mysqli_fetch_assoc($result);
	$hashedPass = $userRow['passwords'];
	if(password_verify($pwd, $hashedPass)){
		$_SESSION['loggedin'] = true;
		$_SESSION['user'] = $usr;
		header("Location: homepage.php");
		exit; 
	}
	else{    
		header("Location: login.php?error=1");
		exit;		
	}
}
?>