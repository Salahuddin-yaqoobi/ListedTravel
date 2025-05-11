<?php
include "config.php";
session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
    exit();
}

if(isset($_POST['id'])) {
    $blog_id = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Get image filename before deleting the blog
    $sql = "SELECT blog_img FROM blogs WHERE blog_id = {$blog_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // Delete the blog from database
    $sql = "DELETE FROM blogs WHERE blog_id = {$blog_id}";
    
    if(mysqli_query($conn, $sql)) {
        // Delete the image file
        if($row['blog_img'] && file_exists("upload/".$row['blog_img'])) {
            unlink("upload/".$row['blog_img']);
        }
        
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete blog']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Blog ID not provided']);
}
?>
