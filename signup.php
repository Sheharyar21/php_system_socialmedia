<?php
	// Replace with your database credentials
	include 'config.php';
//   Replace with your
// 
	// Connect to database
	$conn = new mysqli($servername, $username, $password, $dbname);
// 

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Create table if it doesn't exist
	$sql = "CREATE TABLE IF NOT EXISTS users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		user_id VARCHAR(30) NOT NULL,
		first_name VARCHAR(30) NOT NULL,
		last_name VARCHAR(30) NOT NULL,
		email VARCHAR(50) NOT NULL,
		dob DATE NOT NULL,
		hometown VARCHAR(50) NOT NULL,
		gender VARCHAR(10) NOT NULL,
		password VARCHAR(255) NOT NULL
	)";

	if ($conn->query($sql) === FALSE) {
		echo "Error creating table: " . $conn->error;
	}

	// Insert form data into table
	$user_id = $_POST["user_id"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$email = $_POST["email"];
	$dob = $_POST["dob"];
	$hometown = $_POST["hometown"];
	$gender = $_POST["gender"];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	$sql = "INSERT INTO users (user_id, first_name, last_name, email, dob, hometown, gender, password) VALUES ('$user_id', '$first_name', '$last_name', '$email', '$dob', '$hometown', '$gender', '$password')";

	if ($conn->query($sql) === FALSE) {
		echo "Error inserting data: " . $conn->error;
	}
	else {

		header("Location:index.php");
	}

	// Close connection
	$conn->close();
	// 
?>