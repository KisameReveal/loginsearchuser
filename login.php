<?php
session_start();
require_once 'core/dbConfig.php';

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Check if user exists and verify password
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['message'] = "Login successful!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($_SESSION['message'])) { ?>
        <p style="color: red;"><?php echo $_SESSION['message']; ?></p>
    <?php unset($_SESSION['message']); } ?>
    <form action="login.php" method="POST">
        <p>Email: <input type="email" name="email" required></p>
        <p>Password: <input type="password" name="password" required></p>
        <p><input type="submit" name="loginBtn" value="Login"></p>
    </form>
    <p><a href="register.php">Create an Account</a></p>
</body>
</html>
