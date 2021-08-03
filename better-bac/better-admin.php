<?php
	
	// Begin session
	session_name("sesh");
	session_start();
	
	// If visitor to the page isn't logged in as admin, redirect to login page
	if (isset($_SESSION["admin"])) {
		if ($_SESSION["admin"] != 1) {
			header("Location: http://localhost/better-bac/better-bac-login.php");
			exit();
		}
		
		//If logout post sent, destroy session & cookie
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
	
		<h1 id="Header">Admin Page</h1>
		
		<table id="usertable">
			<tr>
				<td><a id="userfile">Your files</a></td>
				<td><a id="userstuff">Your account</a></td>
			</tr>
			<tr>
				<td><a id="adminfile"><a href="/better-bac/admin/admin-files.php">Admin files</a></td>
				<td><a id="usrmgt"><a href="/better-bac/admin/usr-mgt.php">User Management</a></td>
			</tr>
		</table><br>
		
		<form action="" method="post">
			<input type="hidden" name="Logout" value="1"></input>
			<input type="submit" value="Logout"></input>
		</form>
		
	</body>
</html>