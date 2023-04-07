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
	<title>My Dashboard</title>
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
				<li class="active"><a href="dashboard.php">Dashboard</a></li>
				<li><a href="updateprofile.php">Profile</a></li>
						<li><a href="album.php">Album</a></li>
                        
                        <li><a href="friend.php?user_id=<?php echo $_SESSION['user_id'];?>">Add Friend</a></li>
						<li ><a href="photo.php">Social Media</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h1>Dashboard</h1>
		<p>Welcome to your dashboard, <?php echo $first_name . " " . $last_name; ?>!</p>
		<p>You can view your profile and update your settings using the links in the navigation bar above.</p>
	</div>
</body>
</html>
