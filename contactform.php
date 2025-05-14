<?php
// Set header to return JSON response
include "config.php";
header('Content-Type: application/json');



// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
    }

    // Close statement
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close connection
$conn->close();
?> 