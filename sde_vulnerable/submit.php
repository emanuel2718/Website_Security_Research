<?php
    session_start();
    $_SESSION['name']=$_GET['uname'];
?>


<!DOCTYPE HTML>
    <head>
        <title>Submit Information</title>
    </head>

    <body>
        <h1 style='width=100px;'><a href="home.html">Sensitive Data Exposure - Vulnerable</a></h1>
        <h2>Signed in as: <?php echo $_SESSION['name'];?></h2>
        <div id='panel' style='top:0px;'></div>
    </body>
</html>