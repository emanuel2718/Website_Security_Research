<?php
	session_start();
	if (!isset($_SESSION["admin"])) {
		header("Location: http://localhost/bac/better-bac-login.php");
	} else {
		if ($_SESSION["admin"] != 1) {
			header("Location: http://localhost/bac/better-bac-login.php");
		}
	}
?>

<html>
	<body>
		<h2> You should only be here if you're an admin! </h2>
	</body>
</html>