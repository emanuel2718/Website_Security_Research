<?php

	// Database credentials
	$servername = "localhost";
	$username = your username;
	$password = your password;
	$dbname = your database name;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// When HTML form is submitted, build and execute SQL query
	if (isset($_POST["name"]) && isset($_POST["password"])) {
		
		$name = $_POST["name"];
		$password = $_POST["password"];
		
		// Prepare SELECT query
		$select = $conn->prepare('SELECT * FROM table_in_yourdb WHERE name = ? AND pword = ?');
		$select->bind_param('ss', $name, $password);
		$select->execute();
		
		// Get credentials from query results and redirect to user's page
		$result = $select->get_result();
		$row = $result->fetch_assoc(); 
		
		if ($row == null) {
			echo "not found";
		} else {
			$id = $row["id"];
			$admin = $row["admin"];
			$uname = $row["name"];
			header("Location: http://localhost/bac/users/user.php?id=$id&admin=$admin&un=$uname");
			exit();
		}
	}
?>

<html>

	<body>
		
		<! -- Login form -->
		<form action="" method="post">
			<label for "name">Username:</label>
			<input type="text" id="name" name="name"></input><br>
			<label for "password">Password:</label>
			<input type="text" id="password" name="password"></input><br>
			<input type="submit" value="Submit"></input>
		</form>
	

	</body>
	
</html>
