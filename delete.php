<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Seaman Record</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this seaman record?</h1>
	<?php 
		$getUserByID = getUserByID($pdo, $_GET['id']); 
		if (!$getUserByID) {
			echo "<h2>Record not found!</h2>";
			exit;
		}
	?>
	<div class="container" style="border-style: solid; border-color: red; background-color: #ffcbd1; padding: 20px;">
		<h2>First Name: <?php echo htmlspecialchars($getUserByID['first_name']); ?></h2>
		<h2>Last Name: <?php echo htmlspecialchars($getUserByID['last_name']); ?></h2>
		<h2>Email: <?php echo htmlspecialchars($getUserByID['email']); ?></h2>
		<h2>Gender: <?php echo htmlspecialchars($getUserByID['gender']); ?></h2>
		<h2>Address: <?php echo htmlspecialchars($getUserByID['address']); ?></h2>
		<h2>State: <?php echo htmlspecialchars($getUserByID['state']); ?></h2>
		<h2>Nationality: <?php echo htmlspecialchars($getUserByID['nationality']); ?></h2>
		<h2>Rank: <?php echo htmlspecialchars($getUserByID['rank']); ?></h2>
		<h2>Vessel Type: <?php echo htmlspecialchars($getUserByID['vessel_type']); ?></h2>
		<h2>Years of Experience: <?php echo htmlspecialchars($getUserByID['years_of_experience']); ?></h2>
		<h2>Certifications: <?php echo htmlspecialchars($getUserByID['certifications']); ?></h2>

		<div class="deleteBtn" style="margin-top: 20px;">
			<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<input type="submit" name="deleteUserBtn" value="Delete" style="background-color: #f69697; border-style: solid; padding: 10px;">
			</form>			
		</div>	
	</div>
</body>
</html>
