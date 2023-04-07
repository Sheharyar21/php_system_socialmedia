<?php

session_start();

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}
include 'config.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $dob = $row['dob'];
        $hometown = $row['hometown'];
        $gender = $row['gender'];
    }
} else {
    echo "User not found";
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
	<title>My Update Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
				<li  class="active"><a href="updateprofile.php">Profile</a></li>
                <li><a href="album.php">Album</a></li>
                <li><a href="friend.php?user_id=<?php echo $_SESSION['user_id'];?>">Add Friend</a></li>
                <li><a href="photo.php">Social Media</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<h1>Update Profile</h1>




        <form method="POST" action="update.php">
  <div class="form-group">
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
  </div>
  
  <div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
  </div>
  
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
  </div>
  
  <div class="form-group">
    <label for="dob">Date of Birth:</label>
    <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>">
  </div>
  
  <div class="form-group">
    <label for="hometown">Hometown:</label>
    <input type="text" class="form-control" name="hometown" value="<?php echo $hometown; ?>">
  </div>
  
  <div class="form-group">
    <label for="gender">Gender:</label>
    <select class="form-control" name="gender">
      <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option>
      <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option>
      <option value="other" <?php if($gender == 'other') echo 'selected'; ?>>Other</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Update Profile</button>
</form>


    </div>
    </body>


</html>