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

			// update the session username
			$_SESSION['user'] = $newUsername;
			// update the php username so the js can populate the 	   phlaceholder with new username
			$phpUsername = $newUsername;
		}
	}	
?>