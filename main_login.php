<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
	
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
	</style>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form method="post" action="login.php">
			<div class="form-group">
				<label for="user_id">User ID:</label>
				<input type="text" class="form-control" id="user_id" name="user_id" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</body>
</html>
