<?php
	session_start();
	session_unset(); 
	session_destroy();	
	unset($_COOKIE['sessionCookie']);
	setcookie('sessionCookie', '', time() - (60 * 1000), '/');
	unset($_COOKIE['csrfCookie']);
    setcookie('csrfCookie', '', time() - (60 * 1000), '/');

	header("Location: index.php");	
?>

