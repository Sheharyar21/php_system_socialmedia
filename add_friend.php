
<?php
session_start();

if (!isset($_SESSION['user_id']))
{
header("Location:index.php");

}



include 'config.php';

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'config.php';
    // Retrieve data from form
    $first_person_user_id = $_SESSION['user_id'];
    $second_person_user_id = $_POST['user'];
    // Insert data into friends table
    $sql = "INSERT INTO friends (first_person_user_id, second_person_user_id) VALUES ('$first_person_user_id', '$second_person_user_id')";
    if(mysqli_query($conn, $sql)) {
        echo "Friend added successfully!";
        header("Location:friend.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
