<?php
session_start();
require 'db_setup.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = 'admin';
    $admin_password = 'admin123';

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_panel.php');
        exit;
    } else {
        $message = 'Invalid login credentials.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <?php if (!empty($message)) { echo '<p>' . $message . '</p>'; } ?>
    <form method="post" action="admin_login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
