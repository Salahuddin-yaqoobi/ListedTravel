<?php
session_start();
include "config.php";

if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

if(isset($_POST['banner_id']) && isset($_POST['status'])) {
    $banner_id = mysqli_real_escape_string($conn, $_POST['banner_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Check if there are already 3 main banners when trying to set as main
    if($status == 'main') {
        $check_sql = "SELECT COUNT(*) as count FROM banner WHERE banner_status = 'main' AND banner_id != '$banner_id'";
        $result = mysqli_query($conn, $check_sql);
        $row = mysqli_fetch_assoc($result);
        
        if($row['count'] >= 3) {
            echo json_encode(['success' => false, 'message' => 'Maximum 3 main banners allowed']);
            exit();
        }
    }

    // Update the banner status
    $sql = "UPDATE banner SET banner_status = '$status' WHERE banner_id = '$banner_id'";
    
    if(mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
}
?>
