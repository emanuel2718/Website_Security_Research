<?php
    session_start();
    $_SESSION['name']=$_GET['uname'];
?>


<!DOCTYPE HTML>
    <head>
        <title>Submit Information</title>
    </head>

    <body>
        <h1 style='width=100px;'><a href="home.html">Broken Auth</a></h1>
        <h2>Signed in as: <?php echo $_SESSION['name'];?></h2>

        <div id='panel' style='top:0px;'>
        <a href="logout.php"><h2>Log out</h2></a>
        </div>

        <footer style='position:relative; bottom:0px;'>
        Session ID: <?php echo session_id();?>
        </footer>
    </body>

    <script>
        function logout() { return true; }
    </script>
</html>