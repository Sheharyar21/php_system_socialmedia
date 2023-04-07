<?php
session_start();

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}

?>

<?php
	include 'config.php';

// Delete album by album_id
if(isset($_POST['album_id'])) {
  $album_id = $_POST['album_id'];
  $sql = "DELETE FROM albums WHERE album_id='$album_id'";

  if ($conn->query($sql) === TRUE) {
    echo "Album deleted successfully";
    header("Location:album.php");
  } else {
    echo "Error deleting album: " . $conn->error;
  }
}

$conn->close();
?>
