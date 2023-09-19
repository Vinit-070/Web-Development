<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['gender'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Connect to the MySQL database.
    $conn = new mysqli('localhost', 'root', '', 'details');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Insert the data into the database.
    $sql = 'INSERT INTO users (username, password, name, phone, email, gender) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $username, $password, $name, $phone, $email, $gender);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    // Redirect the user to the login page.
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <center>
    <div class="mail-area">
    <h1>Register Here</h1>
    <form action="register.php" method="post">
        <input type="text" name="username" class="input" pattern="^[a-z]+[0-9]+$" placeholder="Username" title="Username should only start with lowercase letters. e.g. john09 and can contain only digits other than letters" required> 
        <input type="password" name="password" class="input" placeholder="Password" required> 
        <input type="text" name="name" class="input" placeholder="Name" pattern="[a-zA-Z]+" title="Name should only contain alphabets" required> 
        <input type="text" name="phone" class="input" pattern="[0-9]{10}" placeholder="Phone" title="phone number should only contain 10 digits" required>   
        <input type="email" name="email" class="input" placeholder="Email" required>  
        <!-- <input type="text" name="gender" class="input" placeholder="Gender" required>  -->
        
  <select name="gender" class="input" required>
  <option value="">Gender</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
  </select>



        <div>
        <input class="input btn" type="submit" value="Register">
        <input class="input btn" type="reset" value="Reset">
        </div>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</div>
    </center>
    <center><p><hr>Designed and Developed by Vinit Patel</p></center>  
</body>
</html>
