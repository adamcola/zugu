<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Register</title>
	</head>
	<body>
		<form action="authenticate.php" method="post"> <!-- you can use another action if you'd like -->
			<label>Username: </label><br>
			<input type="text" name="username" id="username"><br>
			<label>Password: </label><br />
			<input type="password" name="password" id="password"><br>
	        <label>Confirm: </label><br>
	        <input type="password" name="password2" id="password2"><br>
	        <label>Email address:</label><br>
	        <input type="text" name="email" id="email"><br>
			<input type="submit" name="submit" id="submit" value="Submit">
		</form>
	</body>
</html>