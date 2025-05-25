<?php
include "config.php"; // Include the database configuration file

$hostname = APP_URL; // Ensure APP_URL is correctly defined in your config file

if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']); // Get the post ID from the URL

    // Step 1: Fetch image name from DB
    $sql = "SELECT post_img FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_name = basename($row['post_img']); // Clean file name to avoid path traversal

        // Step 2: Build full path to the image
        $image_path = $_SERVER['DOCUMENT_ROOT'] . "/listedtravel/uploads/" . $image_name;

        // Step 3: Delete image from the server if it exists
        if (file_exists($image_path)) {
            if (unlink($image_path)) {
                // Image deleted successfully
            } else {
                // Log error if image couldn't be deleted
                error_log("Failed to delete image: " . $image_path);
            }
        }

        // Step 4: Delete post from the DB
        $delete_sql = "DELETE FROM post WHERE post_id = {$post_id}";
        if (mysqli_query($conn, $delete_sql)) {
            // Success: Redirect to the "all-posts.php" page
            header("Location: {$hostname}/all-posts.php?status=success&message=Post deleted successfully");
            exit();
        } else {
            // Error: Log error and show a user-friendly message
            error_log("Error deleting post with ID {$post_id}: " . mysqli_error($conn));
            header("Location: {$hostname}/all-posts.php?status=error&message=Error deleting post");
            exit();
        }
    } else {
        // If the post with the given ID doesn't exist
        header("Location: {$hostname}/all-posts.php?status=error&message=Post not found");
        exit();
    }
} else {
    // If the 'id' is not set in the URL
    header("Location: {$hostname}/all-posts.php?status=error&message=Invalid request");
    exit();
}
?>
