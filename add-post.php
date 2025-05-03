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

                    <!-- Dynamic fields based on category selection -->
                    <div id="dynamic-fields"></div> <!-- Placeholder for dynamic fields -->

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

    // Price and duration logic based on category
    if ($category == 'For Rent') {
        $price = $_POST['price'];
        $duration = $_POST['duration'] ? $_POST['duration'] : null; // Set to null if duration is not selected
    } elseif ($category == 'For Sale') {
        $price = $_POST['price'];
        $duration = null; // Not applicable for 'For Sale'
    }

    // Date logic
    date_default_timezone_set('Asia/Karachi');
    $date = date('d M, Y');

    // Insert query (No author field)
    $sql = "INSERT INTO post (title, description, category, post_img, post_date, price, duration)
    VALUES ('$post_title', '$postdesc', '$category', '$target_file', '$date', '$price', '$duration')";    

    if (mysqli_query($conn, $sql)) {
        header("Location: post.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<script>
  // JavaScript to dynamically show fields based on category selection
  const categorySelect = document.querySelector('select[name="category"]');
  const dynamicFields = document.getElementById('dynamic-fields');

  categorySelect.addEventListener('change', function() {
    const category = this.value;
    dynamicFields.innerHTML = ''; // Clear any existing fields

    if (category === 'For Rent') {
      // Show price and duration fields with default null value for duration
      dynamicFields.innerHTML = `
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="duration">Duration</label>
          <select name="duration" class="form-control">
            <option value="" selected>Choose Duration</option> <!-- Default to null -->
            <option value="per_day">Per Day</option>
            <option value="per_month">Per Month</option>
          </select>
        </div>
      `;
    } else if (category === 'For Sale') {
      // Show price field only for "For Sale"
      dynamicFields.innerHTML = `
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control" required>
        </div>
      `;
    }
  });
</script>

<?php include "footer.php"; ?>
