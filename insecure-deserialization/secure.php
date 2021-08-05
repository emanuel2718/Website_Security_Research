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
<form action="secure.php" method="get">
	<input type="text" name="username" placeholder="Username" />
	<input type="submit" value="Create User" />
</form>
</td></tr>
</table>
<div align="center">
The best defense is said best by OWASP: <br>
"The only safe architectural pattern is not to accept serialized objects from untrusted sources or<br>
 to use serialization mediums that only permit primitive data types."
<br><br>
Here we've removed the option from the user to enter the serialized data.
<br>
See OWASP for further reading:
<a href="https://owasp.org/www-project-top-ten/2017/A8_2017-Insecure_Deserialization">10 steps to avoid insecure deserialization</a>
</div>
<table align="center">

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


?>


