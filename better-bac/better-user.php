<?php

	session_name("sesh");
	session_start();
	
	// If session parameters set, store values. Otherwise, redirect to login page
	if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && isset($_SESSION["admin"])) {
		$user = $_SESSION["username"];
		$id = $_SESSION["id"];
		$admin = $_SESSION["admin"];
		
		// If logout post sent, destroy session & cookie
		// Source for code: https://www.php.net/manual/en/function.session-destroy.php
		if (isset($_POST["Logout"])) {
			$_SESSION = array();
			
			$params = session_get_cookie_params();
			setcookie("sesh", "", time() - 42000, $params["path"], $params["domain"],
				$params["secure"], $params["httponly"]);
				
			session_destroy();
			header("Location: http://localhost/better-bac/better-bac-login.php");
			exit();
		}
		
	} else {
		header("Location: http://localhost/better-bac/better-bac-login.php");
		exit();
	}
	
?>

<html>
	<body>
	
		<h1 id="Header"></h1>
		
		<table id="usertable">
			<tr>
				<td><a id="userfile">Your files</a></td>
				<td><a id="userstuff">Your account</a></td>
			</tr>
		</table><br>
		
		<form action="" method="post">
			<input type="hidden" name="Logout" value="1"></input>
			<input type="submit" value="Logout"></input>
		</form>
		
		<script>
		
		// Get name, id and admin status from the php variables
		var name = <?php echo json_encode("$user", JSON_HEX_TAG); ?>;
		var id = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
		var admin = <?php echo json_encode("$admin", JSON_HEX_TAG); ?>;
		
		// Update the page with the user's links
		document.getElementById("Header").innerHTML = `Hello ${name}`;
		document.getElementById("userfile").href = `/tests/users/ufiles/${id}`;
		document.getElementById("userstuff").href = `/tests/users/ustuff/${id}`;
		
		// Source used: https://stackoverflow.com/questions/23740548/how-do-i-pass-variables-and-data-from-php-to-javascript
		</script>
		
	</body>
</html>