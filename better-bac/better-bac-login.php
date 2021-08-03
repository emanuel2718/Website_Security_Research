<?php

	session_name("sesh");
	session_start();
	
	// If session variables are set, redirect user to their page
	if (isset($_SESSION["username"]) && isset($_SESSION["admin"]) && isset($_SESSION["id"])) {
		if ($_SESSION["admin"] == 1) {
			header("Location: http://localhost/better-bac/better-admin.php");
			exit();
			
		} else {
			header("Location: http://localhost/better-bac/better-user.php");
			exit();
		}
	}
	
	
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
				
				$_SESSION["id"] = $new_usr_id;
				$_SESSION["username"] = $name;
				$_SESSION["admin"] = 0;
				
				header("Location: http://localhost/better-bac/better-user.php");
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
				$_SESSION["id"] = $row["id"];
				$_SESSION["admin"] = $row["admin"];
				$_SESSION["username"] = $row["username"];
				
				if ($row["admin"] == 1) {
					header("Location: http://localhost/better-bac/better-admin.php");
					exit();
					
				} else {
					header("Location: http://localhost/better-bac/better-user.php");
					exit();
				}
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
			<input type="text" id="name" name="name" autocomplete="new-password"></input><br>
			<label for "password">Password:</label>
			<input type="password" id="password" name="password" autocomplete="new-password"></input><br>
			<input type="submit" value="Submit"></input>
		</form>
		
		<! -- Create account & log in form -->
		<h3> Or Create an Account and Log in </h3>
		<form id="create" action="" method="post">
			<label for "name">Username:</label>
			<input type="text" id="name" name="name" autocomplete="new-password"></input><br>
			<label for "password">Password:</label>
			<input type="password" id="password" name="password" autocomplete="new-password"></input><br>
			<input type="hidden" name="create" value="1"></input>
			<input type="submit" value="Submit"></input>
		</form>	
	</body>
	
</html>