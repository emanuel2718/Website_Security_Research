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
<h1 align="center"> Employee Class Serialized:</h1>
<br>

<table align="center">
<tr><td>
<form action="vulnerable.php" method="get">
	<input type="text" name="username" placeholder="search" />
	<input type="submit" value="Search" />
</form>
</td></tr>
</table>
<table align="center">
<tr><td>
<form action="vulnerable.php" method="get">
	<input type="text" name="danger" placeholder="Danger" />
	<input type="submit" value="Danger" />
</form>
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


$object = new User();
$object->user_name = $_GET["username"];
$object->is_admin = TRUE;

echo '<div align="center">';
echo "User name: " . $object->user_name . ", ";
echo $object->DisplayAdminStatus();
echo "<br>";
echo "Serialized data: " . serialize($object);



$danger_object = unserialize($_GET['danger']);
echo "<br>";
echo "User name: " . $danger_object->user_name . ", ";
echo $danger_object->DisplayAdminStatus();
echo "<br>";
echo "Serialized data: " . serialize($danger_object);
echo '</div>';


?>


