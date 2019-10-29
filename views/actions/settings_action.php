<?php
	$phpUsername = $_SESSION['user'];
	if(isset($_POST['send'])){
		include'connect_action.php';

		if($_POST['newUsername'] != ""){
			$newUsername = $_POST['newUsername'];
			$query = "UPDATE users 
					  	SET usernames = '$newUsername' 
    					WHERE usernames = '$phpUsername'";

			mysqli_query($conn, $query);
			$_SESSION['user'] = $newUsername;
			$phpUsername = $newUsername;
		}
	}	
?>