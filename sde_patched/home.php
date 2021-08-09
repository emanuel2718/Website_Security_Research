<!DOCTYPE html>
    <head>
        <title>Sensitive Data Exposure - Secured</title>
    </head>

    <body>
        <header>
            <h1><a href="home.html">Sensitive Data Exposure - Secured</a></h1>
            <a href="register.php" style="color:white;"><button class="buttons1">Register</button></a>
        </header>
    </body>

    <script>
        if (window.location.href.substring(0, 8) != "https://") {
            window.location = location.href.replace(/^http:/, 'https:');
        }
    </script>
</html>
