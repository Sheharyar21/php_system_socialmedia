
<?php
session_start();

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}

?>

<?php



include 'config.php';
//  Include  
if ($_SERVER["REQUEST_METHOD"] == "POST") {



  $album_id = $_POST["album_id"];
  $name = $_POST["name"];
  $date_of_creation = $_POST["date_of_creation"];

  $sql = "UPDATE albums SET name='$name', date_of_creation='$date_of_creation' WHERE album_id='$album_id'";

  if ($conn->query($sql) === TRUE) {
    echo "Album updated successfully";
    header("Location: album.php");
  } else {
    echo "Error updating album: " . $conn->error;
  }
}
?>