<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: " . APP_URL . "/admin/");
    exit();
}

include "config.php";

if(isset($_POST['submit'])) {
    // Add error logging
    error_log("Form submitted to save-banner.php");
    
    // Get form data
    $banner_header = mysqli_real_escape_string($conn, $_POST['banner_header']);
    $banner_title = mysqli_real_escape_string($conn, $_POST['banner_title']);
    $banner_subtitle = mysqli_real_escape_string($conn, $_POST['banner_subtitle']);
    $banner_button = mysqli_real_escape_string($conn, $_POST['banner_button']);
    
    // Get alignment values
    $title_align = mysqli_real_escape_string($conn, $_POST['title_align']);
    $header_align = mysqli_real_escape_string($conn, $_POST['header_align']);
    $subtitle_align = mysqli_real_escape_string($conn, $_POST['subtitle_align']);
    $button_align = mysqli_real_escape_string($conn, $_POST['button_align']);
    
    // Get colors - Fix the variable name here
    $banner_header_color = mysqli_real_escape_string($conn, $_POST['banner_header_color']);
    $banner_subtitle_color = mysqli_real_escape_string($conn, $_POST['banner_subtitle_color']);
    $banner_title_color = mysqli_real_escape_string($conn, $_POST['banner_title_color']);
    $banner_button_color = mysqli_real_escape_string($conn, $_POST['banner_button_color']);

    $banner_img = ''; // Default empty value for image

    // Handle image upload
    if(isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] == 0) {
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_name = $_FILES['banner_img']['name'];
        $file_tmp = $_FILES['banner_img']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $banner_img = uniqid() . '.' . $file_ext;
        
        move_uploaded_file($file_tmp, $upload_dir . $banner_img);
    }

    // Fix the SQL query - change banner_head_color to banner_header_color
    $sql = "INSERT INTO banner (
        banner_header, banner_title, banner_subtitle, banner_button, banner_img,
        title_align, header_align, subtitle_align, button_align,
        banner_header_color, banner_subtitle_color, banner_title_color, banner_button_color
    ) VALUES (
        '$banner_header', '$banner_title', '$banner_subtitle', '$banner_button', '$banner_img',
        '$title_align', '$header_align', '$subtitle_align', '$button_align',
        '$banner_header_color', '$banner_subtitle_color', '$banner_title_color', '$banner_button_color'
    )";

    // Log the SQL query for debugging
    error_log("SQL Query: " . $sql);

    // Execute query and send proper JSON response
    header('Content-Type: application/json');
    
    if(mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Banner saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
    }
    exit();
}

// If we get here, no form was submitted
header('Content-Type: application/json');
echo json_encode(['success' => false, 'message' => 'No data submitted']);
exit();
?>
