
<?php
session_start();
/*
This script creates a new album in the database. It first checks if the user is logged in by checking if the 'user_id' session variable is set. If not, it redirects the user to the index page. 
 */
if (!isset($_SESSION['user_id']))
{
header("Location:index.php");
// 
}

?>



<?php


include 'config.php';

// Get values from form
$name = $_POST['name'];
$date_of_creation = $_POST['date_of_creation'];

// Insert new album into table
$sql = "INSERT INTO albums (name, date_of_creation) VALUES ('$name', '$date_of_creation')";

if (mysqli_query($conn, $sql)) {
  echo "Album created successfully";
  header("Location:album.php");
} else {
  echo "Error creating album: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>