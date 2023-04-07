<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
   include 'config.php';
    // Get the file details
    $file_name = $_FILES['photo']['name'];
    $file_size = $_FILES['photo']['size'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_type = $_FILES['photo']['type'];

    // Get the caption from the form
    $caption = $_POST['caption'];

    // Check if the file is an image
    if (strpos($file_type, 'image/') === false) {
        echo "Error: File is not an image";
        exit;
    }

    // Generate a unique filename for the photo
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $new_filename = uniqid() . '.' . $file_ext;

    // Upload the file to the server
    $upload_path = 'uploads/' . $new_filename;
    move_uploaded_file($file_tmp, $upload_path);

    // Save the photo details to the database
    
    $sql = "SELECT count(*) cphoto FROM photos ";
	$result = $conn->query($sql);
    $photo_id = 0;
	if ($result->num_rows > 0) {
		
		$photo_id = $result->num_rows+1;
	}

  


    
    $sql = "INSERT INTO photos (photo_id,caption, data) VALUES ($photo_id,'$caption','$new_filename')";
    echo $sql;
    

    if (mysqli_query($conn, $sql)) {
        echo "Photo uploaded successfully";
        header("Location:photo.php");
    } else {
        echo "Error uploading photo: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Error: Form was not submitted";
    exit;
}
?>
