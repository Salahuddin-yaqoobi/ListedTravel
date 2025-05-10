<?php 
session_start();
include "config.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set proper JSON header
header('Content-Type: application/json');

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
            echo json_encode(['status' => 'error', 'message' => 'This extension is not allowed. Please choose a JPG, JPEG, PNG, or WEBP file.']);
            exit;
        }

        if ($file_size > 2097152) { // File size check: limit to 2MB
            echo json_encode(['status' => 'error', 'message' => 'File size must be 2MB or lower.']);
            exit;
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
            if (!move_uploaded_file($file_tmp, "uploads/" . $file_name)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
                exit;
            }
        }
    } else {
        // If no new image is uploaded, use the old image
        if (isset($_POST['old-image']) && !empty($_POST['old-image'])) {
            $file_name = $_POST['old-image'];
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No image provided. Please upload an image.']);
            exit;
        }
    }

    // Sanitize and retrieve other POST data
    if (isset($_POST['post_id'], $_POST['post_title'], $_POST['postdesc'], $_POST['category'], $_POST['price'])) {
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $title = mysqli_real_escape_string($conn, $_POST['post_title']);
        $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $duration = isset($_POST['duration']) ? mysqli_real_escape_string($conn, $_POST['duration']) : ''; // If duration exists
        $date = date("d M, Y");

        // Update the post
        $sql = "UPDATE post 
                SET title = '{$title}', 
                    description = '{$description}', 
                    category = '{$category}', 
                    price = '{$price}', 
                    duration = '{$duration}', 
                    post_date = '{$date}', 
                    post_img = '{$file_name}',
                    product_status = '{$_POST['product_status']}'
                WHERE post_id = {$post_id}";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'success', 'message' => 'Post updated successfully']);
            exit;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Query Failed: ' . mysqli_error($conn)]);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Form data missing. Required fields: post_id, post_title, postdesc, category, price']);
        exit;
    } 
} else {
    echo json_encode(['status' => 'error', 'message' => 'Form not submitted']);
    exit;
}
?>
