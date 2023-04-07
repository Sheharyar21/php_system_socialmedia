<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My Website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
	
</head>
<body>
	<div class="container">
		<h1>Welcome to My Website</h1>
		<p>Please login to continue.</p>
		<form action="login.php" method="POST">
			<div class="form-group">
				<label for="user_id">User ID:</label>
				<input type="text" class="form-control" id="user_id" name="user_id" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
	<a href="main.php" >Create an Account</a>

		</form>
	</div>
</body>
</html>
