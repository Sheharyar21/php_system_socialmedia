<?php
session_start();

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}

?>
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


    <?php

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}

?>

<?php

include 'config.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve all albums
$sql = "SELECT * FROM albums";
$result = mysqli_query($conn, $sql);
?>
<table class="table">
	<thead>
		<tr>
			<th>Album ID</th>
			<th>Name</th>
			<th>Date of Creation</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['album_id']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['date_of_creation']."</td>";
			echo "<td><a href='read_album.php?album_id=".$row['album_id']."' class='btn btn-primary'>Read</a> </td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>




<?php// Close connection
mysqli_close($conn);

?>
