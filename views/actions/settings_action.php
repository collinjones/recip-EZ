<?php
	include'connect_action.php';
	$phpUsername = $_SESSION['user'];

	if(isset($_POST['send'])){
		
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

		// --- UPDATING VEGETARIAN SETTINGS ---
		// veg is checked
		if(!empty($_POST['vegetarian'])){
			$veg_query = "UPDATE users
							SET vegetarian = 1
							WHERE usernames = '$phpUsername'";
			mysqli_query($conn, $veg_query);
		}
		// veg is unchecked 
		else{
			$veg_query = "UPDATE users
							SET vegetarian = 0
							WHERE usernames = '$phpUsername'";
			mysqli_query($conn, $veg_query);

		}
	}	
	// -------- VEGETARIAN CHECK (for javascript) ----------
	// must be down here for javascrpt to work properly
	$veg_check_query = "SELECT vegetarian 
					FROM users 
					WHERE usernames = '$phpUsername'";
	foreach($conn->query($veg_check_query) as $row){
		$result = $row['vegetarian'];
	}
?>