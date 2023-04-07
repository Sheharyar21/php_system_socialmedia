<?php
session_start();

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}

?>
<?php
	include 'config.php';

// Check if album ID is provided
if (isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];

    // Query to select album information based on ID
    $query = "SELECT * FROM albums WHERE album_id = $album_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Album found, display information
        $album = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Album Information</title>
            <!-- Bootstrap CSS --><link rel="stylesheet" href="main.css">
            <link rel="stylesheet" href="main.css">
	
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                <h2>Album Information</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Album ID</td>
                            <td><?php echo $album['album_id']; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $album['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Creation</td>
                            <td><?php echo $album['date_of_creation']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Album not found, display error message
        echo "Album not found";
    }
} else {
    // Album ID not provided, display error message
    echo "Please provide an album ID";
}
?>
