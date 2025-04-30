<?php
include "config.php";
$hostname = "http://localhost/fancyshop";

if(isset($_GET['id']) && isset($_GET['catid'])){
    $post_id = intval($_GET['id']);  // Secure ID
    $cat_id = intval($_GET['catid']);  // Secure Category ID

    // Fetch post details before deletion
    $sql1 = "SELECT post_img FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $image_path = "upload/" . $row['post_img'];

        // Check if file exists before deleting
        if(file_exists($image_path) && !empty($row['post_img'])){
            unlink($image_path);
        }

        // Delete post and update category count
        $sql = "DELETE FROM post WHERE post_id = {$post_id};";
        $sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$cat_id}";

        if(mysqli_multi_query($conn, $sql)){
            header("Location: {$hostname}/post.php");
        } else {
            echo "Query Failed";
        }
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
}

?>
<?php
// include "config.php";

// // Debugging: Print GET variables
// echo "Post ID: " . $_GET['id'] . "<br>";
// echo "Category ID: " . $_GET['catid'] . "<br>";

// if(isset($_GET['id']) && isset($_GET['catid'])){
//     $post_id = intval($_GET['id']);  
//     $cat_id = intval($_GET['catid']);  

//     echo "Post ID after sanitization: " . $post_id . "<br>";
//     echo "Category ID after sanitization: " . $cat_id . "<br>";
// }
?>
