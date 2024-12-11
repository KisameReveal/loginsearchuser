<?php  

require_once 'dbConfig.php';
require_once 'models.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insertUserBtn'])) {
    // Sanitize and get the POST values
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);
    $state = htmlspecialchars($_POST['state']);
    $nationality = htmlspecialchars($_POST['nationality']);
    $rank = htmlspecialchars($_POST['rank']);
    $vessel_type = htmlspecialchars($_POST['vessel_type']);
    $experience = intval($_POST['experience']);  // Ensure this is treated as an integer
    $certifications = htmlspecialchars($_POST['certifications']);

    // Call the insertNewUser function
    $result = insertNewUser(
        $pdo, 
        $first_name, 
        $last_name, 
        $email, 
        $gender, 
        $address, 
        $state, 
        $nationality, 
        $rank, 
        $vessel_type, 
        $experience,  // Pass years of experience
        $certifications
    );

    if ($result) {
        $_SESSION['message'] = "Application submitted successfully!";
        header("Location: ../index.php");  // Redirect back to index or a confirmation page
    } else {
        $_SESSION['message'] = "Error submitting application.";
        header("Location: ../insert.php");  // Redirect back to the form on error
    }
}

if (isset($_POST['editUserBtn'])) {
    $editUser = editUser(
        $pdo,
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['gender'],
        $_POST['address'],
        $_POST['state'],
        $_POST['nationality'],
        $_POST['rank'],
        $_POST['vessel_type'],
        $_POST['years_of_experience'],
        $_POST['certifications'],
        $_GET['id']
    );

    if ($editUser) {
        $_SESSION['message'] = "Successfully edited!";
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['deleteUserBtn'])) {
    $deleteUser = deleteUser($pdo, $_GET['id']);

    if ($deleteUser) {
        $_SESSION['message'] = "Successfully deleted!";
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_GET['searchBtn'])) {
    $searchForAUser = searchForAUser($pdo, $_GET['searchInput']);
    foreach ($searchForAUser as $row) {
        echo "<tr> 
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['address']}</td>
                <td>{$row['state']}</td>
                <td>{$row['nationality']}</td>
                <td>{$row['rank']}</td>
                <td>{$row['vessel_type']}</td>
                <td>{$row['years_of_experience']}</td>
                <td>{$row['certifications']}</td>
              </tr>";
    }
}

?>
