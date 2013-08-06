<?php 
session_start();
if(!isset($_SESSION['username']) || !isset($_SESSION['sid']) ||!isset($_SESSION['ip'])) {
	header("Location: login.php");
	exit;
}
echo "Welcome, " . $_SESSION['username'] . "<br>";
echo "You can only access this page if you are logged in.";
?>