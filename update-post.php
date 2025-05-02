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
              <div class="form-group">
                  <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">
              </div>
              <div class="form-group">
                  <label for="exampleInputTitle">Title</label>
                  <input type="text" name="post_title" class="form-control" value="<?php echo $row['title']; ?>">
              </div>
              <div class="form-group">
                  <label for="exampleInputDescription">Description</label>
                  <textarea name="postdesc" class="form-control" rows="5"><?php echo $row['description']; ?></textarea>
              </div>
              <div class="form-group">
                  <label for="exampleInputCategory">Category</label>
                  <input type="text" name="category" class="form-control" value="<?php echo $row['category']; ?>">
              </div>
              <div class="form-group">
                  <label for="">Post image</label>
                  <input type="file" name="new-image">
                  <img src="uploads/<?php echo $row['post_img']; ?>" height="150px" alt="Post Image">
                  <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">
              </div>
              <input type="submit" name="submit" class="btn btn-primary" value="Update" />
          </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
