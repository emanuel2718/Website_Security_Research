
<?php
    session_start();
?>


<!DOCTYPE HTML>

    <head>
        <header>
            <h1 class=website>Broken Auth</h1>
        </header>

        <form action='submit.php' method='POST' class='formplace' name='yes' onsubmit='return validate()'>

        <h2>First Name</h2>
        <input type="text" name='fname' class='ip'>

        <h2>Last Name</h2>
        <input type="text" name='lname' class='ip'>

        <h2>Username</h2>
        <input type="text" name='uname' class='ip'>

        <h2>Password</h2>
        <input type="password" name='pwd0' class='ip'>

        <h2>Re-Enter Password</h2>
        <input type="password" name='pwd1' class='ip'>

        <br>

        <input type="submit" value='Submit' class='sub'>
        </form>

    </head>

    <script>
        function validate() {
            if (document.forms['yes']['fname'].value == '') {
                alert('You must enter your first name');
                return false;
            }
            if (document.forms['yes']['lname'].value == '') {
                alert('You must enter your last name');
                return false;
            }
            if (document.forms['yes']['uname'].value == '') {
                alert('You must enter your username');
                return false;
            }
            if (document.forms['yes']['pwd0'].value == '') {
                alert('You must enter your password');
                return false;
            }

            if (document.forms['yes']['pwd0'].value != document.forms['yes']['pwd1'].value) {
                alert('Passwords must match');
                return false;
            }
            if (!(/[a-z A-z]*\d[a-z A-z]*/.test(document.forms['yes']['pwd0'].value))|!/^.{4,15}$/.test(document.forms['yes']['pwd0'].value)) {
                alert("Password must be between 4 and 15 characters long. Must contain at least one number.");
                return false;
            }
        }
        //window.history.forward();
    </script>


</html>