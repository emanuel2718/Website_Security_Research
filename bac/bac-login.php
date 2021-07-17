<?php

	// Database credentials
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

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
		
		//Creating new user
		if (isset($_POST["create"])) {
			
			//Will need to determine what new user's id in the db will be
			$id_query = $conn->query("SELECT MAX(id) AS max FROM testtable");
			$max_id = $id_query->fetch_assoc();
			$new_usr_id = $max_id["max"] + 1;
			
			//Insert new user and redirect to their page
			$query = $conn->prepare('INSERT INTO testtable (username, pwd, admin) VALUES (?, ?, 0)');
			$query->bind_param('ss', $name, $password);
			
			if ($query->execute()) {
				header("Location: http://localhost/bac/users/user.php?id=$new_usr_id&admin=0&un=$name");
				exit();
			} else {
				echo "Could not add account"; 
			}
			
		} else {
		
			// Prepare SELECT query
			$query = $conn->prepare('SELECT * FROM testtable WHERE username = ? AND pwd = ?');
			$query->bind_param('ss', $name, $password);
			$query->execute();
		
			// Get credentials from query results and redirect to user's page
			$result = $query->get_result();
			$row = $result->fetch_assoc(); 
		
			if ($row == null) {
				echo "not found";
			} else {
				$id = $row["id"];
				$admin = $row["admin"];
				$uname = $row["username"];
				header("Location: http://localhost/bac/users/user.php?id=$id&admin=$admin&un=$uname");
				exit();
			}
		}
	}
?>

<html>

	<body>
		
		<! -- Login form -->
		<h3> Log in </h3>
		<form id="login" action="" method="post">
			<label for "name">Username:</label>
			<input type="text" id="name" name="name"></input><br>
			<label for "password">Password:</label>
			<input type="password" id="password" name="password"></input><br>
			<input type="submit" value="Submit"></input>
		</form>
		
		<! -- Create account & log in form -->
		<h3> Or Create an Account and Log in </h3>
		<form id="create" action="" method="post">
			<label for "name">Username:</label>
			<input type="text" id="name" name="name"></input><br>
			<label for "password">Password:</label>
			<input type="password" id="password" name="password"></input><br>
			<input type="hidden" name="create" value="1"></input>
			<input type="submit" value="Submit"></input>
		</form>	
	</body>
	
</html>
