<?php
	session_name("sesh");
	session_start();
	
	if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
		header("Location: http://localhost/better-bac/better-admin.php");
	} else {
		header("Location: http://localhost/better-bac/better-bac-login.php");
	}
?>