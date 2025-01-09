<?php
session_start(); // Start the session

// Database connection
$servername = "localhost";
$username = "root"; // Default username for WAMP
$password = "root"; // Default password for WAMP (usually empty)
$dbname = "booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data was posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serviceData = json_decode(file_get_contents('php://input'), true); // Get JSON data
    $useremail = $_SESSION['email']; // Assuming these session variables are set
    $username = $_SESSION['name'];
    $package = $_SESSION['package'];

    // Prepare SQL statement
    $sql = "INSERT INTO bookings (username, useremail, package, Staffing, Food_Service, Hall_Service, Decoration_Service, Invitation_Card, Photos_and_Music) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $staffing = $foodService = $hallService = $decorationService = $invitationCard = $photosAndMusic = 0;

    foreach ($serviceData as $service) {
        switch ($service['service']) {
            case 'Staff Service 🤵':
                $staffing = $service['price'];
                break;
            case 'Food Service 🥤🥪':
                $foodService = $service['price'];
                break;
            case 'Hall Service 🏢':
                $hallService = $service['price'];
                break;
            case 'Decoration Service 🎉':
                $decorationService = $service['price'];
                break;
            case 'Invitation Card 📜':
                $invitationCard = $service['price'];
                break;
            case 'Photos & Music 🎶':
                $photosAndMusic = $service['price'];
                break;
        }
    }

    $stmt->bind_param("ssiiiiiii", $username, $useremail, $package, $staffing, $foodService, $hallService, $decorationService, $invitationCard, $photosAndMusic);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
