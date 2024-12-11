<?php
session_start();
require_once 'core/dbConfig.php';
require_once 'core/models.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Destroy the session to log the user out
    session_unset(); // Removes all session variables
    session_destroy(); // Destroys the session
    header("Location: login.php"); // Redirect to login page
    exit();
}

if (isset($_SESSION['message'])) { ?>
    <h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">
        <?php echo $_SESSION['message']; ?>
    </h1>
<?php unset($_SESSION['message']); }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seaman Job Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!</h1>

    <!-- Logout link -->
    <p><a href="index.php?logout=true">Logout</a></p>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <input type="text" name="searchInput" placeholder="Search here" value="<?php echo isset($_GET['searchInput']) ? htmlspecialchars($_GET['searchInput']) : ''; ?>">
        <input type="submit" name="searchBtn" value="Search">
    </form>

    <p><a href="index.php">Clear Search Query</a></p>
    <p><a href="insert.php">Insert New Seaman</a></p>

    <table style="width:100%; margin-top: 20px; border-collapse: collapse; border: 1px solid #ddd;">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>State</th>
            <th>Nationality</th>
            <th>Rank</th>
            <th>Vessel Type</th>
            <th>Years of Experience</th>
            <th>Certifications</th>
            <th>Date Added</th>
            <th>Actions</th>
        </tr>

        <?php 
        $getAllUsers = isset($_GET['searchBtn']) ? searchForAUser($pdo, $_GET['searchInput']) : getAllUsers($pdo);
        
        if ($getAllUsers) {
            foreach ($getAllUsers as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo htmlspecialchars($row['state']); ?></td>
                    <td><?php echo htmlspecialchars($row['nationality']); ?></td>
                    <td><?php echo htmlspecialchars($row['rank']); ?></td>
                    <td><?php echo htmlspecialchars($row['vessel_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['years_of_experience']); ?></td>
                    <td><?php echo htmlspecialchars($row['certifications']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } 
        } else { ?>
            <tr>
                <td colspan="13" style="text-align: center;">No records found.</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
