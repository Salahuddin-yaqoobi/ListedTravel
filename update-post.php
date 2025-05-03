<?php include "header.php"; ?>
<?php
  include "config.php";

  if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
    $sql = "SELECT * FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    } else {
      echo "<h2>No data found for the given post ID.</h2>";
      exit;
    }
  }
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h1 class="admin-heading">Update Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
          <form action="save-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">
              <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">

              <div class="form-group">
                  <label for="exampleInputTitle">Title</label>
                  <input type="text" name="post_title" class="form-control" value="<?php echo $row['title']; ?>" required>
              </div>

              <div class="form-group">
                  <label for="exampleInputDescription">Description</label>
                  <textarea name="postdesc" class="form-control" rows="5" required><?php echo $row['description']; ?></textarea>
              </div>

              <div class="form-group">
                  <label for="exampleInputCategory">Category</label>
                  <select name="category" class="form-control" id="category" required>
                      <option value="For Rent" <?php if($row['category'] == 'For Rent') echo 'selected'; ?>>For Rent</option>
                      <option value="For Sale" <?php if($row['category'] == 'For Sale') echo 'selected'; ?>>For Sale</option>
                  </select>
              </div>

              <!-- Price Field -->
              <div class="form-group" id="price-group">
                  <label for="price">Price</label>
                  <input type="number" name="price" class="form-control" value="<?php echo $row['price']; ?>" required>
              </div>

              <!-- Duration Field for For Rent Category -->
              <div class="form-group" id="duration-group" style="display: <?php echo ($row['category'] == 'For Rent' ? 'block' : 'none'); ?>;">
                  <label for="duration">Duration</label>
                  <select name="duration" class="form-control">
                      <option value="per day" <?php if($row['duration'] == 'per day') echo 'selected'; ?>>Per Day</option>
                      <option value="per month" <?php if($row['duration'] == 'per month') echo 'selected'; ?>>Per Month</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="">Post image</label>
                  <input type="file" name="new-image" id="imageInput" onchange="previewImage(event)">
                  <br>
                  <!-- Image preview section -->
                  <img id="imagePreview" src="<?php echo $row['post_img']; ?>" height="150px" alt="Post Image" style="display: block; margin-top: 10px;">
              </div>

              <input type="submit" name="submit" class="btn btn-primary" value="Update" />
          </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>

<script>
  // Function to show image preview when the file is selected
  function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function(){
          var output = document.getElementById('imagePreview');
          output.src = reader.result;  // Update image preview with selected file
      };
      reader.readAsDataURL(event.target.files[0]);
  }

  // Show/hide duration field based on category selection
  document.getElementById('category').addEventListener('change', function() {
      var category = this.value;
      if (category === 'For Rent') {
          document.getElementById('duration-group').style.display = 'block';
      } else {
          document.getElementById('duration-group').style.display = 'none';
      }
  });

  // Initialize category selection
  window.onload = function() {
      var category = document.getElementById('category').value;
      if (category === 'For Rent') {
          document.getElementById('duration-group').style.display = 'block';
      } else {
          document.getElementById('duration-group').style.display = 'none';
      }
  };
</script>
