<!DOCTYPE html>
<html>
<head>
    <title>Weight</title>
    <meta charset="utf-8">
    <meta name="author" content="Weight">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    function validateForm() {
        var email = document.forms["pwForm"]["email"].value;
        if (!(/\w+@\w+\.\w+/.test(email))) {
            alert("Email must be filled out with correct email syntax");
            return false;
        }
        notifyUser();
        return true;
    }
    function notifyUser() {
        var email = document.forms["pwForm"]["email"].value;
        alert("An email has been sent to " + email + ". Please check your inbox.");
    }
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="pwForm" action="loginPage.php" method="post" class="loginForm" onsubmit="return validateForm()">
        <div class="container">
            <h2>Verify Account</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Enter the code sent to your email in the following box to verify your account.</p>

            <label class="labe" for="verify"><b>Verification Code</b></label>
            <input class="textin" type="text" placeholder="Code" name="verify" required>

            <div class="submitbar">
                <button class="login" type="submit">Verify Account</button>
            </div>
            <div class="accountbar">
                <a href="loginPage.php">Return to login</a>
            </div>
        </div>
    </form>
</body>
</html>
