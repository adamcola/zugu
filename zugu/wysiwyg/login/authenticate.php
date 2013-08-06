<?php 
// Include the database connection file.
include("connection.php");
// Check if a person has clicked on submit.
if(isset($_POST['submit'])) { 
	// Check if a person has filled every form.
	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['email'])) {
		echo "You have to fill in everything in the form."; // Display the error message.
		header("Location: register.php"); // Redirect to the form.
		exit; // Stop the code to prevent the code running after redirecting.
	}
	// Create variables from each $_POST.
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$email = $_POST['email'];
	
	// Now, compare passwords and check if they're the same.
	
	if($password != $password2) {
		// If the passwords are NOT the same. Again display an error message and redirect.
		echo "Sorry, wrong password.";
		header("Location: register.php");
		exit;
	}
	// Secure the password using an md5 hash.
	$password = md5($password);
	
	// Create a variable containing the SQL query.
	$query = "INSERT INTO `users` (username, password, email) VALUES ('$username', '$password', '$email')";
	// Perform the SQL query on the database.
	$result = mysql_query($query);
	// If the query failed, display an error.
	if(!$result) { 
		echo "Your query failed. " . mysql_error(); // The dot seperates PHP code and plain text.
	} else {
		// Display a success message!
		echo "Welcome " . $username . " You are now registered";
	}
}
?>