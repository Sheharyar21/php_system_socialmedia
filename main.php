<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS --><link rel="stylesheet" href="main.css">
	
	<style type="text/css">
		body {
			background-color: #f8f9fa;
		}
		.container {
			background-color: #ffffff;
			margin-top: 50px;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}
		h1 {
			text-align: center;
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Sign Up</h1>
		<form method="POST" action="signup.php">
			<div class="form-group">
				<label for="user_id">User ID:</label>
				<input type="text" class="form-control" id="user_id" name="user_id">
			</div>
			<div class="form-group">
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" id="first_name" name="first_name">
			</div>
			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" id="last_name" name="last_name">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="dob">Date of Birth:</label>
				<input type="date" class="form-control" id="dob" name="dob">
			</div>
			<div class="form-group">
				<label for="hometown">Hometown:</label>
				<input type="text" class="form-control" id="hometown" name="hometown">
			</div>
			<div class="form-group">
				<label for="gender">Gender:</label>
				<select class="form-control" id="gender" name="gender">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Sign Up</button>
		</form>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
