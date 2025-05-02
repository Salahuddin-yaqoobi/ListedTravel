<?php
include "config.php";
$hostname = "http://localhost/fancyshop";

if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);  // Secure post ID

    // Get post image filename
    $sql1 = "SELECT post_img FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $sql1) or die("Query Failed: Select post image");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_path = "uploads/" . $row['post_img'];

        // Delete the image file if it exists
        if (file_exists($image_path) && !empty($row['post_img'])) {
            unlink($image_path);
        }

        // Delete the post from the database
        $sql = "DELETE FROM post WHERE post_id = {$post_id}";
        if (mysqli_query($conn, $sql)) {
            header("Location: {$hostname}/post.php");
            exit();
        } else {
            echo "Error deleting post.";
        }
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
}
?>
