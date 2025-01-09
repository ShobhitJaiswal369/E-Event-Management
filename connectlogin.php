<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you are posting the form to this PHP file
    if (isset($_POST['txt']) && isset($_POST['email']) && isset($_POST['pswd'])) {
        // For simplicity, we just store the posted data into session variables
        // In a real application, you would store and validate this data in a database

        // Setting session variables
        $_SESSION['name'] = $_POST['txt'];
        $_SESSION['email'] = $_POST['email'];

        // You can redirect to another page after setting the session
        header("Location: welcome.php");
        exit();
    }
}
?>
