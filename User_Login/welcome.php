<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    // The user is not logged in, redirect to the login page.
    header('Location: login.php');
}

// The user is logged in, display their details.
$username = $_SESSION['username'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$gender = $_GET['gender'];

echo 'Welcome, ' . '<b>'.$username.'</b>';
echo '<br><br>';
echo '<center>'; 
echo '<h1>User Details</h1>';
echo '<br>';    
echo '<hr>';
echo '<b>Name:</b> ' . $name;
echo '<hr>';
echo '<b>Phone:</b> ' . $phone;
echo '<hr>';
echo '<b>Email:</b> ' . $email;
echo '<hr>';
echo '<b>Gender:</b> ' . $gender;

echo '<hr>';
echo '</center>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <center>
    <form action="logout.php" method="post"> 
        <input type="submit" value="Logout">
    </form>
    </center>
</body>
</html>