<?php

include 'config.php';	$user_id = $_POST["user_id"];
	$password = $_POST["password"];


	$sql = "SELECT * FROM users WHERE user_id='$user_id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		if (password_verify($password, $row["password"])) {
			
			session_start();
			$_SESSION["user_id"] = $user_id;
			header("Location: dashboard.php");
			exit();
		}
	}

	$error = "Invalid user ID or password";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Error</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			background-color: #f7f7f7;
		}

		.container {
			margin-top: 50px;
			background-color: #fff;
			padding: 30px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
	}

	h1 {
		text-align: center;
		margin-bottom: 30px;
	}

	.error-message {
		color: #f00;
		font-weight: bold;
		margin-top: 10px;
		text-align: center;
	}
</style>
</head>
<body>
	<div class="container">
		<h1>Login Error</h1>
		<p class="error-message"><?php echo $error; ?></p>
		<a href="index.php" class="btn btn-primary">Back to Login Page</a>
	</div>
</body>
</html>