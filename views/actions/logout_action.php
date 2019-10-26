<?php
	session_start();
	unset($_SESSION['user']);
	session_destroy();
	echo "Logging out...";
	header("Location: ../login.php");
?>