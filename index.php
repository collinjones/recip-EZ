<?php
	// heroku looks for an index page in the root folder to work properly, without it will result in 403 forbidden access. 
	header("Location: views/login.php");
?>