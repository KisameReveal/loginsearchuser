<?php
session_start();
require_once 'core/dbConfig.php'; // Ensure the dbConfig is set correctly

// Check if the form is submitted
if (isset($_POST['registerBtn'])) {
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    try {
        // Check if the user already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch();
        
        if ($existingUser) {
            // User already exists, show a message
            $_SESSION['message'] = "User already exists.";
        } else {
            // Insert the new user into the database
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->execute([$email, $hashed_password]);
            // Set a session message for success
            $_SESSION['message'] = "Registration successful! You can now log in.";
            // Redirect to login page
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        // In case of an error, store the error message
        $_SESSION['message'] = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <?php if (isset($_SESSION['message'])) { ?>
        <p style="color: red;"><?php echo $_SESSION['message']; ?></p>
    <?php unset($_SESSION['message']); } ?>

    <form action="register.php" method="POST">
        <p>Email: <input type="email" name="email" required></p>
        <p>Password: <input type="password" name="password" required></p>
        <p><input type="submit" name="registerBtn" value="Register"></p>
    </form>

    <p><a href="login.php">Already have an account? Login</a></p>
</body>
</html>
