<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seaman Job Application</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Seaman Job Application Form</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label>
			<input type="text" name="first_name" placeholder="Enter First Name" required>
		</p>
		<p>
			<label for="lastName">Last Name</label>
			<input type="text" name="last_name" 
			placeholder="Enter Last Name" required>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="Enter Email Address" required>
		</p>
		<p>
			<label for="gender">Gender</label>
			<select name="gender" required>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Other">Other</option>
			</select>
		</p>
		<p>
			<label for="address">Address</label>
			<input type="text" name="address" placeholder="Enter Current Address" required>
		</p>
		<p>
			<label for="state">State</label>
			<input type="text" name="state" placeholder="Enter State/Region" required>
		</p>
		<p>
			<label for="nationality">Nationality</label>
			<input type="text" name="nationality" placeholder="Enter Nationality" required>
		</p>
		<p>
			<label for="rank">Rank</label> 
			<input type="text" name="rank" placeholder="Enter Rank" required>
		</p>
		<p>
			<label for="vesselType">Preferred Vessel</label>
			<input type="text" name="vessel_type" placeholder="Enter Preferred Vessel Type (e.g., Tanker, Cargo)">
		</p>
		<p>
			<label for="experience">Years of Experience</label>
			<input type="number" name="experience" placeholder="Enter Years of Experience" required>
		</p>
		<p>
			<label for="certifications">Certifications</label>
			<input type="text" name="certifications" placeholder="Enter Certifications (e.g., STCW, GMDSS)">
		</p>
		<p>
			<input type="submit" name="insertUserBtn" value="Submit Application">
		</p>
	</form>
</body>
</html>

