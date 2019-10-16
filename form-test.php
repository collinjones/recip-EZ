<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Form testing</title>
  <meta name="description" content="test">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
	<form action='' method='post'>
		<input type='checkbox' name='ingredient' value='steak'>Steak
		<input type='submit' name='send'>
	</form>
</body>
</html>

<?php
	if(isset($_POST['send'])){
		$x = $_POST['ingredient'];
		echo $x;
	}
?>