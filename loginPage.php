<?php
	if($_SESSION['login'] == "false"){ //if login in session is not set
		header("Location: loginPage.php");
	}

session_destroy();
session_start();
$_SESSION["login"] = "false";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weight</title>
    <meta charset="utf-8">
    <meta name="author" content="Weight">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    //JS code that checks if the user is idle for 15 minutes
    var inactivityTime = function () {
        var t;
        window.onload = resetTimer;

        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;

        function logout() {
            alert("You are now logged out.")
            location.href = 'loginPage.php'
        }

        function resetTimer() {
            clearTimeout(t);
            t = setTimeout(logout, 15 * 60 * 1000) //set timeout time to 15 minutes of idle
        }
    };
    function validateForm() {
        var email = document.forms["loginForm"]["email"].value;
        var pw = document.forms["loginForm"]["password"].value;
        if (!(/\w+@\w+\.\w+/.test(email))) {
            alert("Email must be filled out with correct email syntax");
            return false;
        }
        else if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
            alert("Password must be filled out, characters and digits only.");
            return false;
        }

        return true;
    }
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="loginForm" action="loginVerification.php" method="post" class="loginForm" onsubmit="return validateForm()">
        <div class="container">
            <h2>Sign In</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <label class="labe" for="email"><b>Email</b></label>
            <?php
            if(!isset($_COOKIE['email'])) {
                echo "<input class=\"textin\" type=\"text\" placeholder=\"Enter Email\" name=\"email\" required>";
            } else {
                $answer = $_COOKIE['email'];
                echo "<input class=\"textin\" type=\"text\" placeholder=\"Enter Email\" name=\"email\" value=\"$answer\"required>";
            }
            ?>


            <label class="labe" for="psw"><b>Password</b></label>
            <?php
            $_SESSION["login"] = "false";
            $fff = $_SESSION["login"];

            if(!isset($_COOKIE['pass'])) {
                $answer = $_COOKIE['pass'];
                echo "<input class=\"textin\" type=\"password\" placeholder=\"Enter Password\" name=\"password\"required>";
            } else {
                $answer = $_COOKIE['pass'];
                echo "<input class=\"textin\" type=\"password\" placeholder=\"Enter Password\" name=\"password\" value=\"$answer\"required>";
            }

            ?>


            <div class="submitbar">
                <button class="login" type="submit">Login</button>
                <label class="check">
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            <div class="accountbar">
                <a href="createAccount.php">Create Account</a>
                ---
                <a href="forgotPassword.php">Forgot Password?</a>
            </div>
        </div>
    </form>
</body>
</html>
