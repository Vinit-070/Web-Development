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
</head>
<body>
    <center>
    <h1>Register Here</h1>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="text" name="phone" placeholder="Phone" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="gender" placeholder="Gender" required><br><br>
        <input type="submit" value="Register">
        <input type="reset" value="Reset"><br>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>

    </center>
</body>
</html>
