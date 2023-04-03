<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="login.css" />
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"/>
	<title>HolidayHomes Login</title>
</head>


<body>
    <?php
    require("database.php");
    session_start();
    // When form is submitted, check & create user session 
    if (isset($_POST['submit']) && isset($_POST['UserName'])){ 
      $username = stripslashes($_REQUEST['UserName']); // Removes blackslashes
      $username = mysqli_real_escape_string($con, $username);

      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($con, $password);

      // Check if user exists in database 
      $query = "SELECT * FROM  Users WHERE UserName = '$username' AND password='" . md5($password) . "' ";
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
      $rows = mysqli_num_rows($result);
      // if result is true/1
      if ($rows == 1) { 
        $_SESSION['UserName'] = $username;
        // Redirect the user to the home page 
        header("Location: index.html");
      } else { 
        echo "Incorrect username or password.";              
      }
    } else { 
?>

	<nav class="sizeNav">
		<div class="flexBetween">
			<div><img src="./img/logonoback.png" alt="logo" width="187px" height="31px"></div>
			<div class="sizeLinks flexAround">
				<div class="sizeLink flexCenter">
					<a class="decorationNone color-blue" href="./index.html">Home</a></div>
				<div class="sizeLink flexCenter">
					<a class="decorationNone color-blue" href="./about.html">About</a></div>
				<div class="sizeLink flexCenter borderNav">
					<a class="decorationNone color-blue" href="#">Login</a></div>
			</div>
		</div>
	</nav>

	<section>
	<div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
            <input type="text" name="UserName" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"><a href="./forgotpassword.html" style="text-decoration: none">Forgot Password?</a></div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="./register.html">Signup</a>
        </div>
      </form>
    </div>

	</section>
</body>


<footer>
	<p>Author: Group 1 F28CD 2023</p>
	<p>© 2022 Character. All Rights Reserved.</p>
</footer>
