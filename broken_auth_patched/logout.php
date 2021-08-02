<?php 
    session_start();
    session_unset();
    session_destroy();
    unset($_POST['uname']);
    unset($_SESSION['name']);
    header("Location:exit.php");
?>