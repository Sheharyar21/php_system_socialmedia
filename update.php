<?php
session_start();

include 'config.php';


// Get user ID from session
$user_id = $_SESSION['user_id'];

// Check if form was submitted
if (isset($_POST['submit'])) {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $hometown = $_POST['hometown'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Update user profile in database
    $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', dob = '$dob', hometown = '$hometown', gender = '$gender', password = '$password' WHERE user_id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
        header("Location:dashboard.php");
    } else {
        echo "Error updating profile: " . $conn->error;

    }
}

$conn->close();
?>
