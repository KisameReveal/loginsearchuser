<?php  
// Check if session is already started, if not, start it
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$password = "";
$dbname = "mallorca";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    // Establish the PDO connection with error handling
    $pdo = new PDO($dsn, $user, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set the time zone
    $pdo->exec("SET time_zone = '+08:00';");
} catch (PDOException $e) {
    // Error handling in case of failure
    die("Connection failed: " . $e->getMessage());
}
?>
