<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Seaman Record</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php 
		$getUserByID = getUserByID($pdo, $_GET['id']); 
		if (!$getUserByID) {
			echo "<h2>Record not found!</h2>";
			exit;
		}
	?>
	<h1>Edit the Seaman Record!</h1>
	<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name" value="<?php echo htmlspecialchars($getUserByID['first_name']); ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="last_name" value="<?php echo htmlspecialchars($getUserByID['last_name']); ?>">
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" name="email" value="<?php echo htmlspecialchars($getUserByID['email']); ?>">
		</p>
		<p>
			<label for="gender">Gender</label> 
			<input type="text" name="gender" value="<?php echo htmlspecialchars($getUserByID['gender']); ?>">
		</p>
		<p>
			<label for="address">Address</label> 
			<input type="text" name="address" value="<?php echo htmlspecialchars($getUserByID['address']); ?>">
		</p>
		<p>
			<label for="state">State</label> 
			<input type="text" name="state" value="<?php echo htmlspecialchars($getUserByID['state']); ?>">
		</p>
		<p>
			<label for="nationality">Nationality</label> 
			<input type="text" name="nationality" value="<?php echo htmlspecialchars($getUserByID['nationality']); ?>">
		</p>
		<p>
			<label for="rank">Rank</label> 
			<input type="text" name="rank" value="<?php echo htmlspecialchars($getUserByID['rank']); ?>">
		</p>
		<p>
			<label for="vesselType">Vessel Type</label> 
			<input type="text" name="vessel_type" value="<?php echo htmlspecialchars($getUserByID['vessel_type']); ?>">
		</p>
		<p>
			<label for="experience">Years of Experience</label> 
			<input type="number" name="years_of_experience" value="<?php echo htmlspecialchars($getUserByID['years_of_experience']); ?>">
		</p>
		<p>
			<label for="certifications">Certifications</label> 
			<input type="text" name="certifications" value="<?php echo htmlspecialchars($getUserByID['certifications']); ?>">
		</p>
		<p>
			<input type="submit" value="Save" name="editUserBtn" style="padding: 10px; background-color: #4CAF50; color: white; border: none;">
		</p>
	</form>
</body>
</html>
