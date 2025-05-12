<?php
session_start();
include "config.php";

if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

if(isset($_POST['banner_id'])) {
    $banner_id = mysqli_real_escape_string($conn, $_POST['banner_id']);
    
    // Get image filename before deleting
    $img_sql = "SELECT banner_img FROM banner WHERE banner_id = '$banner_id'";
    $result = mysqli_query($conn, $img_sql);
    $row = mysqli_fetch_assoc($result);
    
    // Delete the record
    $sql = "DELETE FROM banner WHERE banner_id = '$banner_id'";
    
    if(mysqli_query($conn, $sql)) {
        // Delete the image file if it exists
        if(!empty($row['banner_img'])) {
            $image_path = 'uploads/' . $row['banner_img'];
            if(file_exists($image_path)) {
                unlink($image_path);
            }
        }
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
}
?>
