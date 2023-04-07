<?php
$servername = "localhost";
$username = "root";
$password = "ipthr.123";
$dbname = "photo_share";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//  Create   

?>