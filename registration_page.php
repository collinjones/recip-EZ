<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration system using PHP & MySQL</title>
</head>
<body>
	<fieldset style="width:30%">
		<table border="0">
			<h1>Register</h1>

			<form method="post" action="registration_config.php">

			<tr>
				<td>Username:</td>
				<td>
					<input type="text" name="username">
				</td>
			</tr>

			<tr>
				<td>Password:</td>
				<td>
					<input type="password" name="password_1">
				</td>
			</tr>

			<tr>
				<td>Confirm Password:</td>
				<td>
					<input type="password" name="password_2">
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<button  type="submit" class="btn" name="reg">Register</button>
				</td>
			</tr>

			<p>
				Already a member?<a href="login.php">Sign In</a>
			</p>

			</form>
		</table>
	</fieldset>
</body>
</html>