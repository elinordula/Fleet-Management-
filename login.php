<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rit_fleet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$email = $_POST['email'];
$phno = $_POST['phno'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM details WHERE email = ? AND ph_no = ?");
$stmt->bind_param("ss", $email, $phno);

// Execute the statement
$stmt->execute();

// Check if there is a matching row
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Check if the credentials match admin credentials
    if ($email === 'admin@ritchennai.edu.in' && $phno === '1234567891') {
        // Redirect to admin page
        header("Location: http://localhost/ZF%20Project/Admin/index2.html");
    } else {
        // Redirect to user page
        header("Location: http://localhost/ZF%20Project/index2.html");
    }
    exit(); // Make sure to stop script execution after redirect
} else {
    // Login failed, redirect back to login page or show an error
    echo "Invalid login credentials.";
    // header("Location: login.html"); // Uncomment to redirect back to login page
}

// Close connections
$stmt->close();
$conn->close();
?>
