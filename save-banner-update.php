<?php
session_start();
include "config.php";

if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

if(isset($_POST['submit'])) {
    $banner_id = mysqli_real_escape_string($conn, $_POST['banner_id']);
    $banner_title = mysqli_real_escape_string($conn, $_POST['banner_title']);
    $banner_header = mysqli_real_escape_string($conn, $_POST['banner_header']);
    $banner_subtitle = mysqli_real_escape_string($conn, $_POST['banner_subtitle']);
    $banner_button = mysqli_real_escape_string($conn, $_POST['banner_button']);
    $old_image = $_POST['old_image'];
    $title_align = mysqli_real_escape_string($conn, $_POST['title_align']);
    $header_align = mysqli_real_escape_string($conn, $_POST['header_align']);
    $subtitle_align = mysqli_real_escape_string($conn, $_POST['subtitle_align']);
    $button_align = mysqli_real_escape_string($conn, $_POST['button_align']);
    $banner_title_color = mysqli_real_escape_string($conn, $_POST['banner_title_color']);
    $banner_header_color = mysqli_real_escape_string($conn, $_POST['banner_header_color']);
    $banner_subtitle_color = mysqli_real_escape_string($conn, $_POST['banner_subtitle_color']);
    $banner_button_color = mysqli_real_escape_string($conn, $_POST['banner_button_color']);
    $banner_img = $old_image;
    if(isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] == 0) {
        $file_name = $_FILES['banner_img']['name'];
        $file_tmp = $_FILES['banner_img']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $banner_img = uniqid('banner_') . '.' . $file_ext;
        
        if(move_uploaded_file($file_tmp, "uploads/" . $banner_img)) {
            if(!empty($old_image) && file_exists("uploads/" . $old_image)) {
                unlink("uploads/" . $old_image);
            }
        }
    }

    $sql = "UPDATE banner SET 
            banner_title = '$banner_title',
            banner_header = '$banner_header',
            banner_subtitle = '$banner_subtitle',
            banner_button = '$banner_button',
            banner_img = '$banner_img',
            title_align = '$title_align',
            header_align = '$header_align',
            subtitle_align = '$subtitle_align',
            button_align = '$button_align',
            banner_title_color = '$banner_title_color',
            banner_header_color = '$banner_header_color',
            banner_subtitle_color = '$banner_subtitle_color',
            banner_button_color = '$banner_button_color'
            WHERE banner_id = '$banner_id'";

    if(mysqli_query($conn, $sql)) {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            echo json_encode(['success' => true]);
            exit();
        }
        $_SESSION['banner_success'] = "Banner updated successfully";
        header("Location: all-banners.php");
        exit();
    } else {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
            exit();
        }
        $_SESSION['banner_error'] = "Error updating banner: " . mysqli_error($conn);
        header("Location: update-banner.php?id=" . $banner_id);
        exit();
    }
} else {
    header("Location: all-banners.php");
    exit();
}
?>
<script>
    console.log($banner_id);
</script>
