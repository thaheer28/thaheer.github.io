<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login1.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel='icon' href='bg6.webp' type='image/x-icon' /> 

    <title>GUVI-Online Learning Platform</title>
<style>
    h1 {text-align: center;}
    h2 {text-align: center;}
    h3 {text-align: center;}
    p {text-align: center;}
    
</style>
</head>
<body>
    <?php echo "<h1>Hi! " . $_SESSION['username'] . "</h1>"; ?>
    <h1>Welcome to GUVI - A Online Learning Platform</h1>
    <h2>Thank you! For regestering with us.</h2>
    <h3>Currently this site is under development.Kindly visit us after sometime.</h3> 
    <h2>Regards GUVI team</h2>
    
    
            <p><a href="logout.php">Logout</a></p>
</body>
</html>