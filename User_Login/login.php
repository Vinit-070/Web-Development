<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the MySQL database.
    $conn = new mysqli('localhost', 'root', '', 'details');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Check if the username and password exist in the database.
    $sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // The username and password exist, so the user is logged in.
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Get the user details from the database.
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $gender = $row['gender'];

        // Redirect the user to the page that displays the logged user details.
        header('Location: welcome.php?name=' . $name . '&phone=' . $phone . '&email=' . $email . '&gender=' . $gender);
    } else {
        echo 'Invalid username or password.';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <center>
    <h1>Login here</h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login"><br><br>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </center>
</body>
</html>
