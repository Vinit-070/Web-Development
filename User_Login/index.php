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


echo '<center>'; 
echo '<h1>   Dashboard</h1>';
echo '<hr>';
echo '</center>';

echo '<p>Welcome, ' . '<b>'.$username.'</b></p>';
echo '<form action="logout.php" method="post"> 
<input type="submit" value="Logout">
</form>'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="main">
    <div class="mail-area">
    <?php 
    echo '<h1> User Details</h1>';
    echo '<h3> <b>Name :&nbsp;</b>'.$_GET['name'].'</h3>';
    echo '<h3> <b>Phone :&nbsp;</b>'.$_GET['phone'].'</h3>';
    echo '<h3> <b>Email :&nbsp;</b>'.$_GET['email'].'</h3>';
    echo '<h3> <b>Gender :&nbsp;</b>'.$_GET['gender'].'</h3>';    
    ?>
    </div>
</div>
<br>

    <hr>
    
    <?php include ('email-api.php'); ?>
    <br><hr>
    <center><p>Designed and Developed by Vinit Patel</p></center>           
</body>
</html>