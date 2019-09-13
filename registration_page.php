<!DOCTYPE html>
<html>
<head>
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
					<input type="password" name="password">
				</td>
			</tr>

			<tr>
				<td>Confirm Password:</td>
				<td>
					<input type="password" name="confirm_pass">
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