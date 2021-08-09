<?php
    session_start();
    session_regenerate_id();
    if (isset($_POST['uname'])) {
        $_SESSION['name'] = $_POST['uname'];
    }
    else {
        if (!isset($_SESSION['name'])) {
            header('location:exit.php');
        }
    }
?>


<!DOCTYPE HTML>
    <head>
        <title>Submit Information</title>
    </head>

    <script>
        function connection() {
            var status = <?php if (isset($_SESSION['name'])) { echo 1; } else { echo 0; }?>;
            console.log(status);
        }
        document.addEventListener('DOMContentLoaded', function() { connection(); });
    </script>

    <body>
        <h1 style='width=100px;'><a href="home.html">Broken Auth - Secured</a></h1>


        <div id='panel' style='top:0px;'>
        <a href="logout.php"><h2>Log out</h2></a>
        </div>

        <footer style='position:relative; bottom:-10px;'>
        Logged in as: <?php echo $_SESSION['name'];?>
        </footer>
        <footer style='position:relative; bottom:-20px;'>
        Session ID: <?php echo session_id();?>
        </footer>
    </body>

    <script>
        function logout() {
            return true;
        }

        if (window.history.replaceState) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>