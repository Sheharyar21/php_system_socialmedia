<?php
// Database connection code here
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
                <li  class="active"><a href="album.php">Album</a></li>
                <li><a href="friend.php?user_id=<?php echo $_SESSION['user_id'];?>">Add Friend</a></li>
				<li><a href="photo.php">Social Media</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>




	<div class="container">
		<h2>Albums </h2>
		<!-- Create Album -->
		<div class="panel panel-default">
			<div class="panel-heading">Create Album</div>
			<div class="panel-body">
				<form method="post" action="create_album.php">
					<div class="form-group">
						<label for="name">Album Name:</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="form-group">
						<label for="date_of_creation">Date of Creation:</label>
						<input type="date" class="form-control" id="date_of_creation" name="date_of_creation" required>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>

		<!-- Read Album -->
		<div class="panel panel-default">
			<div class="panel-heading">Read Album</div>
			<div class="panel-body">
				<form method="get" action="read_album.php">
					<div class="form-group">
						<label for="album_id">Album ID:</label>
						<input type="number" class="form-control" id="album_id" name="album_id" required>
					</div>
					<button type="submit" class="btn btn-primary">Search</button>
				</form>
			</div>
		</div>

		<!-- Update Album -->
		<div class="panel panel-default">
			<div class="panel-heading">Update Album</div>
			<div class="panel-body">
				<form method="post" action="update_album.php">
					<div class="form-group">
						<label for="album_id">Album ID:</label>
						<input type="number" class="form-control" id="album_id" name="album_id" required>
					</div>
					<div class="form-group">
						<label for="name">Album Name:</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="form-group">
						<label for="date_of_creation">Date of Creation:</label>
						<input type="date" class="form-control" id="date_of_creation" name="date_of_creation" required>
					</div>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>


        <!-- Delete Album -->
<div class="panel panel-default">
    <div class="panel-heading">Delete Album</div>
    <div class="panel-body">
        <form method="post" action="delete_album.php">
            <div class="form-group">
                <label for="album_id">Album ID:</label>
                <input type="number" class="form-control" id="album_id" name="album_id" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>


	<!-- View Album -->
    <div class="panel panel-default">
			<div class="panel-heading">View all Album</div>
			<div class="panel-body">
				<form method="get" action="view_album.php">
					<button type="submit" class="btn btn-primary">View</button>
				</form>
			</div>
		</div>


