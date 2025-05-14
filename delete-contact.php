<?php
session_start();
include "config.php";

if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
    exit();
}


// Set proper JSON header
header('Content-Type: application/json');

if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $sql = "DELETE FROM contacts WHERE id = {$id}";
    
    if(mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Contact form deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete contact form: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
}
?> 