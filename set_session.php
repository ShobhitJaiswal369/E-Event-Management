<?php
session_start(); // Start the session

// Get the JSON data from the POST request
$data = json_decode(file_get_contents('php://input'), true);

// Check if packageTitle is set
if (isset($data['packageTitle'])) {
    // Set the session variable
    $_SESSION['package'] = $data['packageTitle'];

    // Return a success response
    echo json_encode(['message' => 'Session variable set successfully', 'packageTitle' => $_SESSION['package']]);
} else {
    // Return an error response
    echo json_encode(['message' => 'No package title provided']);
}
?>
