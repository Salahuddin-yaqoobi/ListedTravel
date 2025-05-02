<?php
include "header.php";
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control" required>
                           <option disabled selected>Select Category</option>
                           <option value="For Rent">For Rent</option>
                           <option value="For Sale">For Sale</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>

<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    include "config.php";

    $post_title = $_POST['post_title'];
    $postdesc = $_POST['postdesc'];
    $category = $_POST['category'];

    // File upload logic
    if (isset($_FILES['fileToUpload'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    // ✅ Get author from session
    $author = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // 0 if not logged in (fail-safe)
    date_default_timezone_set('Asia/Karachi');
    $date = date('d M, Y');
    $sql = "INSERT INTO post (title, description, category, post_img, post_date)
    VALUES ('$post_title', '$postdesc', '$category', '$target_file', '$date')";    


    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/fancyshop/post.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include "footer.php"; ?>
