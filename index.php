<?php
	session_start();
?>
<!DOCTYPE>
<html>
<?php
	if($_SESSION['login'] == "false"){ //if login in session is not set
		header("Location: loginPage.php");
	}
?>

<head>
	<title>Fitness</title>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="layout.css?<?php echo time(	); ?>">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway'rel='stylesheet' type='text/css'>

	<script type="text/javascript">
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
			var user = document.forms["frm"]["username"].value;
			var pw = document.forms["frm"]["password"].value;
			var pw2 = document.forms["frm"]["password2"].value;
			if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
				alert("Username must be filled out, characters and digits only.");
				return false;
			}
			else if (!(/\w+@\w+\.\w+/.test(email))) {
				alert("Email must be filled out with correct email syntax");
				return false;
			}
			else if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
				alert("Password must be filled out, characters and digits only.");
				return false;
			}
			if(pw !== pw2){
				alert("Passwords do not match. Please try again.");
				return false;
			}



			return true;
		}
	</script>
</head>

<body onload="inactivityTime()">

	<div id="wrapper">
		<?php
            $answer = $_SESSION['user'];
            echo "<h1 id=\"title\">Welcome $answer</h1>"
        ?>
		<div id="nav">
			<ul>
				<li><a href="#index.php">Home</a></li>
				<li><a href="accountPage.php">Account</a></li>
			</ul>
		</div>

		<div id="content">
			<form id="frm" action="result.php" method="post" name="frm" onsubmit="return validateForm()">
				<div class="box">
					<h1>Enter your Sex, Weight, Height, and age below. </h1>
					<p>This will help us accuratly determine your strength compared to other athletes with your same body type.</p>
					<p>
						<label>Gender:</label>
						<select name="listt">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
						<br>
						<label>Weight:</label> <input type="text" name="weight" required> <br>
						<label>Height:</label> <input id="height1" type="text" name="height" placeholder="optional"> <input id="height2" type="text" name="inch"placeholder="optional"> <br>
						<label>Age:</label> <input type="text" name="age" placeholder="optional">
					</p>
				</div>

				<div class="box">
					<h1>Enter your 1 Rep Max below</h1>
					<p>If you compete, put your 95% max to get a more accurate idea of where your strength is at.</p>
					<p>
						<label>Bench:</label> <input type="text" name="bench" placeholder="lbs"  required> <br>
						<label>Squat:</label> <input type="text" name="squat" placeholder="lbs"  required> <br>
						<label>Deadlift:</label> <input type="text" name="deadlift" placeholder="lbs"  required> <br>
						<label>Overhead Press:</label> <input type="text" name="overheadpress" placeholder="lbs"  required> <br>
						<label>Pull up:</label> <input type="text" name="pullup" placeholder="reps"  required>
					</p>
				</div>

				<div class="box">
					<input type="submit" value="Submit"> <input type="reset">
				</div>
			</form>
		</div>

		<script src="radarChart.js"></script>

		<div id="footer">
			<p>Created by Jessy, Alan, & Connor<a id="logout" href="loginPage.php">Logout</a></p>

		</div>
	</div>
</body>
</html>
