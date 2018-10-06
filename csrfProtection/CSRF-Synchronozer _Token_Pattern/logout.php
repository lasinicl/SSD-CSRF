<?php
	session_start();
	session_unset(); 
	session_destroy();	
	unset($_COOKIE['sessionCookie']);
	setcookie('sessionCookie', '', time() - (1000 * 60), '/');
	header("Location: index.php");
?>

