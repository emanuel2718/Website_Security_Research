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

<?php

class User{
    public $user_name;
    public $is_admin;

    public function DisplayAdminStatus(){
        if ($this->$is_admin){
            echo $this->$user_name . " is an admin ";
        } else {
            echo $this->$user_name . " is a regualr user";
        }
    }

}

echo $_POST['username'];
echo $_REQUEST['username'] . "request";
echo '\n';

$object = new User();
$object->$user_name = $_REQUEST['username'];
$object->$is_admin = FALSE;

echo '<div contenteditable="true" align="center">';
echo serialize($object);
echo '</div>';



?>


