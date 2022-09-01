<?php 

include 'config.php';
error_reporting(0);


session_start();

if (isset($_SESSION['username'])) {
    header("Location: login1.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email,dob,mobile,password)
					VALUES ('$username', '$email','$dob','$mobile','$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo"<script>alert('Thank You! For registering with us.Please Login now.')</script>";
				$username = "";
				$email = "";
				$age = "";
				$mobile = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Went wrong.Please try again.')</script>";
			}
		} else {
			echo  "<script>alert('Email-id already registered.Login now')</script>";
		}
		
	} else {
		echo "<script>alert('Password Does Not Matched')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	
<link rel='icon' href='bg6.webp' type='image/x-icon' /> 

<link rel="stylesheet" type="text/css" href="style.css">

<title>GUVI-Signup</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register Here</p>
			<div class="input-group">
				<input type="text" placeholder="Full Name" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
            </div>
			
			<div class="input-group">
				<input type="mobile" placeholder="Mobile Number" name="mobile" value="<?php echo $mobile; ?>"required>
			</div>
			<div class="input-group">
				<input type="dob" placeholder="Date of Birth" name="dob" value="<?php echo $dob; ?>"required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" required>
			</div>
			<input type="checkbox"required <p> I have accept the terms and conditions.</p></br>
			
			<div class="input-group">
				<button name="submit" class="btn">Sign up</button>
			</div>
			<p class="login-register-text">Already Registered? <a href="login1.php">Login</a></p>
		</form>
	</div>
</body>
</html>