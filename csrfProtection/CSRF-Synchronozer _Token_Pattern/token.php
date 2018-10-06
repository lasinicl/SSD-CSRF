<?php
	session_start();
	if(isset($_POST["request"]))
	{
		$data["token"] = $_SESSION['csrfToken'];
		echo json_encode($data);	
	}
?>

