<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

include "config.php";

if(isset($_POST['submit'])) {
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
    
    // Get colors
    $banner_head_color = mysqli_real_escape_string($conn, $_POST['banner_header_color']);
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

    // Always insert a new record
    if(!empty($banner_img)) {
        $sql = "INSERT INTO banner (
            banner_header, banner_title, banner_subtitle, banner_button, banner_img,
            title_align, header_align, subtitle_align, button_align,
            banner_head_color, banner_subtitle_color, banner_title_color, banner_button_color
        ) VALUES (
            '$banner_header', '$banner_title', '$banner_subtitle', '$banner_button', '$banner_img',
            '$title_align', '$header_align', '$subtitle_align', '$button_align',
            '$banner_head_color', '$banner_subtitle_color', '$banner_title_color', '$banner_button_color'
        )";
    } else {
        $sql = "INSERT INTO banner (
            banner_header, banner_title, banner_subtitle, banner_button,
            title_align, header_align, subtitle_align, button_align,
            banner_head_color, banner_subtitle_color, banner_title_color, banner_button_color
        ) VALUES (
            '$banner_header', '$banner_title', '$banner_subtitle', '$banner_button',
            '$title_align', '$header_align', '$subtitle_align', '$button_align',
            '$banner_head_color', '$banner_subtitle_color', '$banner_title_color', '$banner_button_color'
        )";
    }

    // Execute query
    if(mysqli_query($conn, $sql)) {
        $_SESSION['banner_success'] = true;
        header("Location: banner.php");
        exit();
    } else {
        $_SESSION['banner_error'] = mysqli_error($conn);
        header("Location: banner.php");
        exit();
    }
}

header("Location: banner.php");
?>
