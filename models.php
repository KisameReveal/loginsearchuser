<?php  

require_once 'dbConfig.php';

// Function to get all users
function getAllUsers($pdo) {
    $sql = "SELECT * FROM seaman_job_data ORDER BY first_name ASC";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

// Function to get user by ID
function getUserByID($pdo, $id) {
    $sql = "SELECT * FROM seaman_job_data WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

// Updated search function
function searchForAUser($pdo, $searchQuery) {
    $sql = "SELECT * FROM seaman_job_data WHERE 
            first_name LIKE ? OR 
            last_name LIKE ? OR 
            email LIKE ? OR 
            gender LIKE ? OR 
            address LIKE ? OR 
            state LIKE ? OR 
            nationality LIKE ? OR 
            rank LIKE ? OR 
            vessel_type LIKE ? OR 
            years_of_experience LIKE ? OR 
            certifications LIKE ? OR 
            date_added LIKE ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([
        "%".$searchQuery."%", "%".$searchQuery."%", "%".$searchQuery."%", "%".$searchQuery."%", 
        "%".$searchQuery."%", "%".$searchQuery."%", "%".$searchQuery."%", "%".$searchQuery."%", 
        "%".$searchQuery."%", "%".$searchQuery."%", "%".$searchQuery."%", "%".$searchQuery."%"
    ]);

    if ($executeQuery) {
        return $stmt->fetchAll();
    } else {
        // For debugging: show error
        var_dump($stmt->errorInfo());
    }
}

function insertNewUser(
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
    $years_of_experience,  // Correct name here
    $certifications
) {
    $sql = "INSERT INTO seaman_job_data 
            (
                first_name, last_name, email, gender, 
                address, state, nationality, rank, 
                vessel_type, years_of_experience, certifications
            )
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([
        $first_name, 
        $last_name, 
        $email, 
        $gender, 
        $address, 
        $state, 
        $nationality, 
        $rank, 
        $vessel_type, 
        $years_of_experience,  // Make sure you're passing the right field here
        $certifications
    ]);

    if ($executeQuery) {
        return true;
    } else {
        return false;
    }
}


// Edit existing user
function editUser($pdo, $first_name, $last_name, $email, $gender, $address, $state, $nationality, $rank, $vessel_type, $years_of_experience, $certifications, $id) {
    $sql = "UPDATE seaman_job_data SET 
            first_name = ?, 
            last_name = ?, 
            email = ?, 
            gender = ?, 
            address = ?, 
            state = ?, 
            nationality = ?, 
            rank = ?, 
            vessel_type = ?, 
            years_of_experience = ?, 
            certifications = ? 
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([
        $first_name, 
        $last_name, 
        $email, 
        $gender, 
        $address, 
        $state, 
        $nationality, 
        $rank, 
        $vessel_type, 
        $years_of_experience, 
        $certifications, 
        $id
    ]);

    if ($executeQuery) {
        return true;
    }
}

// Delete user
function deleteUser($pdo, $id) {
    $sql = "DELETE FROM seaman_job_data WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery) {
        return true;
    }
}

?>
