<?php

session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $photo_id = $_POST["photo_id"];
    $comment = $_POST["comment"];
    $user_id = $_SESSION["user_id"];
    
    $user_id = 1; // Assuming the user is logged in with user ID 1
    
    // Connect to the database
   include 'config.php';

     
   $sql = "SELECT count(*) cphoto FROM comments ";
   $result = $conn->query($sql);
   $comment_id = 0;
   if ($result->num_rows > 0) {
       
       $comment_id = $result->num_rows+1;
   }

 
   $now = date_create()->format('Y-m-d H:i:s');

    // Prepare and bind the SQL statement
     $sql = "INSERT INTO comments (comment_id,photo_id, user_id, text,date_comment_left) VALUES ($comment_id, $photo_id, $user_id, '$comment','$now');";


    // Execute the statement
    
    if (mysqli_query($conn, $sql)) {
        // Success! Redirect to the photo page
        header("Location: photo.php?id=$photo_id");
        exit();
    } else {
        // Oops! Something went wrong. Display an error message
        $error = "Error adding comment: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    mysqli_close($conn);
}
?>
