<!DOCTYPE html>
<html>
<title> CS467 Insecure Deserialization </title>
<head>
 <meta name="author" content="Ray Franklin">
 <meta name="Reference source" 
 content=https://blog.convisoappsec.com/en/introduction-to-insecure-deserialization-in-php/
 content="https://makitweb.com/create-simple-login-page-with-php-and-mysql/">
</head>
<body>
<h1 align="center"> Insecure Deserialization:</h1>
<br>

<table align="center">
<tr><td>
<form action="insecure.php" method="get">
	<input type="text" name="username" placeholder="Username" />
	<input type="submit" value="Create User" />
</form>
</td></tr>
</table>
<div align="center">
Enter a user name in the first box to create a user object.
<br>
Then enter the serialzied data into the second box.
Change the 0 to 1 in b:0; to see the admin status change.
</div>
<table align="center">
<br>
<tr><td>
<form action="insecure.php" method="get">
	<input type="text" name="danger" placeholder="Drop Serialized Data Here" />
	<input type="submit" value="Insecure Accept" />
</form>
<div align="center">
<div>
</td></tr>
</table>

<?php

class User{
    public $user_name;
    public $is_admin;

    public function DisplayAdminStatus(){
        if ($this->is_admin){
            echo $this->$user_name . " is an admin ";
        } else {
            echo $this->$user_name . " is a regular user";
        }
    }

}

if (isset($_REQUEST["username"])) {
$object = new User();
$object->user_name = $_GET["username"];
$object->is_admin = FALSE;

echo '<div align="center">';
echo "User name: " . $object->user_name . ", ";
echo $object->DisplayAdminStatus();
echo "<br>";
echo "Serialized data: " . serialize($object);
echo '</div>';
}

if (isset($_REQUEST["danger"])) {
$danger_object = unserialize($_GET['danger']);
echo '<div align="center">';
echo "<br>";
echo "User name: " . $danger_object->user_name . ", ";
echo $danger_object->DisplayAdminStatus();
echo "<br>";
echo "Serialized data: " . serialize($danger_object);
echo '</div>';
}

?>


