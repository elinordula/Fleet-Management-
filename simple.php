<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default is empty in XAMPP
$dbname = "rit_fleet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
