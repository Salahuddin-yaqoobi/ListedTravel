<?php
include "config.php";

$hostname = "http://localhost/fancyshop";

if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);

    // Step 1: Fetch image name from DB
    $sql = "SELECT post_img FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_name = basename($row['post_img']); // Clean file name

        // Step 2: Build full path
        $image_path = $_SERVER['DOCUMENT_ROOT'] . "/fancyshop/uploads/" . $image_name;

        // Step 3: Delete image if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Step 4: Delete post from DB
        $delete_sql = "DELETE FROM post WHERE post_id = {$post_id}";
        mysqli_query($conn, $delete_sql);
    }
    
    // Redirect after deletion
    header("Location: {$hostname}/post.php");
    exit();
} else {
    // Invalid request, redirect anyway
    header("Location: {$hostname}/post.php");
    exit();
}
?>
