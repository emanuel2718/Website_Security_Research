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
        <h1 style='width=100px;'><a href="home.php">Sensitive Data Exposure - Secured</a></h1>

        <footer style='position:relative; bottom:-10px;'>
        Logged in as: <?php echo $_SESSION['name'];?>
        </footer>
    </body>

    <script>
        if (window.location.href.substring(0, 8) != "https://") {
            window.location = location.href.replace(/^http:/, 'https:');
        }

        function logout() {
            return true;
        }

        if (window.history.replaceState) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>