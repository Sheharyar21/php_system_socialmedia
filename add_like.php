<?php

session_start();
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the photo ID from the form
    $photo_id = $_POST["photo_id"];
$user_id = $_SESSION["user_id"];
    // Connect to the database
include 'config.php';
    // Insert the like into the database
    $sql = "INSERT INTO likes (user_id,photo_id) VALUES ($photo_id,$user_id)";

    if (mysqli_query($conn, $sql)) {
        // If the like was added successfully, redirect back to the previous page
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
