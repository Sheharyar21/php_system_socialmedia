<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Social Network - Add Content</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">My Website</a>
			</div>
			<ul class="nav navbar-nav">
				<li ><a href="dashboard.php">Dashboard</a></li>
				<li><a href="updateprofile.php">Profile</a></li>
						<li><a href="album.php">Album</a></li>
                        
                        
                        <li><a href="friend.php?user_id=<?php echo $_SESSION['user_id'];?>">Add Friend</a></li>
                        <li class="active"><a href="photo.php">Social Media</a></li>


			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>



	<div class="container">
		<h1>Add Content</h1>

		<!-- Upload Photo Form -->
		<h3>Upload a Photo</h3>
		<form method="post" action="uploadphoto.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="caption">Caption:</label>
				<input type="text" class="form-control" id="caption" name="caption">
			</div>
			<div class="form-group">
				<label for="photo">Photo:</label>
				<input type="file" class="form-control" id="photo" name="photo">
			</div>
			<button type="submit" class="btn btn-primary">Upload</button>
		</form>

		<!-- Add Comment Form -->
		<h3>Add a Comment</h3>
		<form method="post" action="add_comment.php">
			<div class="form-group">
				<label for="photo_id">Photo:</label>
				<select class="form-control" id="photo_id" name="photo_id">
					<?php
						// Connect to the database
					include 'config.php';
						// Query to get all photos
						$sql = "SELECT * FROM photos";

						$result = mysqli_query($conn, $sql);

						// Loop through all photos and create an option in the select dropdown for each one
						while($row = mysqli_fetch_assoc($result)) {
                         
							echo "<option value='" . $row['photo_id'] . "'>" . $row['caption'] . "</option>";
                            
						}

						mysqli_close($conn);
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="comment">Comment:</label>
				<input type="text" class="form-control" id="comment" name="comment">
			</div>
			<button type="submit" class="btn btn-primary">Add Comment</button>
		</form>

		<!-- Add Like Form -->
		<h3>Add a Like</h3>
		<form method="post" action="add_like.php">
			<div class="form-group">
				<label for="photo_id">Photo:</label>
				<select class="form-control" id="photo_id" name="photo_id">
					<?php
						// Connect to the database
						include 'config.php';
						// Query to get all photos
						$sql = "SELECT * FROM photos";

						$result = mysqli_query($conn, $sql);

						// Loop through all photos and create an option in the select dropdown for each one
						while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['photo_id'] . "'>" . $row['caption'] . "</option>";
                        
						}

                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">User:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        <?php
                            // Connect to the database
                           include 'config.php';
                            // Query to get all users
                            $sql = "SELECT * FROM users";
        
                            $result = mysqli_query($conn, $sql);
        
                            // Loop through all users and create an option in the select dropdown for each one
                            while($row = mysqli_fetch_assoc($result)) {

                                echo "<option value='" . $row['user_id'] . "'>" . $row['first_name'] . "</option>";
                            }
        
                            mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Like</button>
            </form>
        
        </div>
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>