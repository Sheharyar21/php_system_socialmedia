<?php
session_start();

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Albums </title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">

</head>
<body>
    
<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">My Website</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="dashboard.php">Dashboard</a></li>
				<li ><a href="updateprofile.php">Profile</a></li>
                <li  ><a href="album.php">Album</a></li>
                <li class="active"><a href="friend.php?user_id=<?php echo $_SESSION['user_id'];?>">Add Friend</a></li>
				<li><a href="photo.php">Social Media</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>



	<div class="container mt-5">
		<h2>Add Friend</h2>
		<form method="POST" action="add_friend.php">
			<div class="form-group">
				<label for="user">Select User:</label>
				<select class="form-control" name="user" id="user">
					<option value="">--Select User--</option>
					<!-- Populate dropdown with user data -->
					<?php
					include 'config.php';
                    if (isset($_GET['user_id'])) {
					// Retrieve user data from database
					$sql = "SELECT * FROM users where user_id !=".$_GET['user_id'];
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)) {
						echo '<option value="'.$row['user_id'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
					}
                }
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Add Friend</button>
		</form>
	</div>
</body>
</html>
