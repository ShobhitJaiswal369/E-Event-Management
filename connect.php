<?php
// Database configuration
$host = 'localhost';        // Your database host
$dbname = 'event';          // Your database name
$user = 'root';             // Your database username
$password = '';             // Your database password

// Create connection
$conn = new mysqli("$host", "$user", "$password", "$dbname");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection
$conn->close();

// Sample data processing (for example, handle form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $username = $_POST['txt'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO signup (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
