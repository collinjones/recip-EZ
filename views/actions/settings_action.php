<?php
	$username = $_SESSION['user'];
	if(isset($_POST['send'])){
		include'connect_action.php';

		if(isset($_POST['newUsername'])){
			$newUsername = $_POST['newUsername'];
			$newUsername = trim($newUsername);
			$query = "UPDATE users SET `usernames` = $newUsername WHERE (`usernames` = $username)";
			echo $query;
			mysqli_query($conn, $query);
		}
	}	
?>