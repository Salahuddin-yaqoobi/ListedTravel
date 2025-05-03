<?php 
session_start();
include "config.php";

if (isset($_POST['submit'])) {
    $error = array();

    // Handle file upload if new image is provided
    if (isset($_FILES['new-image']) && $_FILES['new-image']['error'] == 0) {
        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $parts = explode('.', $file_name);
        $file_ext = strtolower(end($parts));

        $extensions = array("jpg", "jpeg", "png", "webp");

        if (!in_array($file_ext, $extensions)) {
            $error[] = "This extension is not allowed. Please choose a JPG, JPEG, PNG, or WEBP file.";
        }

        if ($file_size > 2097152) { // File size check: limit to 2MB
            $error[] = "File size must be 2MB or lower.";
        }

        if (empty($error)) {
            // If updating an existing post, delete the old image
            if (isset($_POST['old-image']) && !empty($_POST['old-image'])) {
                $old_image_path = $_POST['old-image'];
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);  // Delete old image if exists
                }
            }

            // Move the new image to the uploads directory
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        } else {
            // Handle errors
            print_r($error);
            die();
        }
    } else {
        // If no new image is uploaded, use the old image
        if (isset($_POST['old-image']) && !empty($_POST['old-image'])) {
            $file_name = $_POST['old-image'];
        } else {
            // If no image provided, throw an error
            echo "<div class='alert alert-danger'>No image provided. Please upload an image.</div>";
            die();
        }
    }

    // Sanitize and retrieve other POST data
    if (isset($_POST['post_id'], $_POST['post_title'], $_POST['postdesc'], $_POST['category'])) {
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $title = mysqli_real_escape_string($conn, $_POST['post_title']);
        $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $date = date("d M, Y");

        // Update the post
        $sql = "UPDATE post 
                SET title = '{$title}', 
                    description = '{$description}', 
                    category = '{$category}', 
                    post_date = '{$date}', 
                    post_img = '{$file_name}' 
                WHERE post_id = {$post_id}";

        if (mysqli_query($conn, $sql)) {
            // Redirect to posts page
            header("Location: post.php");
            exit;
        } else {
            // Query failed, show error message
            echo "<div class='alert alert-danger'>Query Failed: " . mysqli_error($conn) . "</div>";
            die();
        }
    } else {
        // If form data is missing
        echo "<div class='alert alert-danger'>Form data missing.</div>";
        die();
    } 
}
?>
