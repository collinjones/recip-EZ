<?php
	// Will check if user has logged out or not.
	// Put at top of every page that user should be logged into
	session_start(); 
	if(!isset($_SESSION['user'])){
	  header("location: login.php");
	  die();
	}
?>