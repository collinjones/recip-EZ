<?php
include'actions/connect_action.php';

$usr = $_POST['username'];
$pwd = $_POST['password'];

//selecting info from database
$query = "SELECT * FROM users WHERE usernames='$usr' LIMIT 1";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

//Username was a match
if($count == 1){ 
	
	$userRow = mysqli_fetch_assoc($result);
	$hashedPass = $userRow['passwords'];
	//Password match
	if(password_verify($pwd, $hashedPass)){
		//set session variables (super globals) 
		$_SESSION['loggedin'] = true;
		$_SESSION['user'] = $usr;

		// redirect to homepage
		header("Location: homepage.php");
		exit; 
	}
	//Password not a match
	else{    
		header("Location: login.php?error=1");
		exit;		
	}
}
//Username not a match
else{
	header("Location: login.php?error=1");
	exit;
}
?>