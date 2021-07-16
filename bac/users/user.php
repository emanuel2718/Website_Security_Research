<?php

	// If URL parameters set, store values. Otherwise, redirect to login page
	if (isset($_GET["id"]) && isset($_GET["un"]) && isset($_GET["admin"])) {
		$user = $_GET["un"];
		$id = $_GET["id"];
		$admin = $_GET["admin"];
	} else {
		header("Location: http://localhost/bac/bac-login.php");
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
			<tr>
				<td><a id="adminfile"></a></td>
				<td><a id="usrmgt"></a></td>
			</tr>
		</table>
		
		<script>
		
		// Get name, id and admin status from the php variables
		var name = <?php echo json_encode("$user", JSON_HEX_TAG); ?>;
		var id = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
		var admin = <?php echo json_encode("$admin", JSON_HEX_TAG); ?>;
		
		// Update the page with the user's links
		document.getElementById("Header").innerHTML = `Hello ${name}`;
		document.getElementById("userfile").href = `/tests/users/ufiles/${id}`;
		document.getElementById("userstuff").href = `/tests/users/ustuff/${id}`;
		
		// Add admin specific links if applicable
		if (parseInt(admin) == 1) {
			document.getElementById("adminfile").href = "/bac/users/admin/admin-files.html";
			document.getElementById("adminfile").innerHTML = "Admin files";
			document.getElementById("usrmgt").href = "/bac/users/admin/admin-usrmgt.html";
			document.getElementById("usrmgt").innerHTML = "User management";
		}
		
		// Source used: https://stackoverflow.com/questions/23740548/how-do-i-pass-variables-and-data-from-php-to-javascript
		</script>
		
	</body>
</html>