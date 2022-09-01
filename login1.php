<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = ($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('You have entered an incorrect Email/Password.Please check and try again.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel='icon' href='bg6.webp' type='image/x-icon' /> 

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>GUVI-Login</title>
</head>
<body>

	<div class="container">
		<form action="" method="POST" class="login-email">
		<p class="login-text" style="font-size: 2rem; font-weight: 400;">GUVI</p>
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"required>
			</div>
			
			<input type="checkbox"required <p> Remember me</p></br>
            
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Not a user? <a href="register.php">Register Here</a></p>
		</form>
	</div>
</body>
</html>