<?php include "header.php"; ?>
<?php
  include "config.php";

  // Check if the 'id' GET parameter exists
  if (isset($_GET['id'])) {
    $sql = "SELECT category.category_id, category.category_name , post.title , post.description , post.post_img , post.post_id
    FROM post 
    JOIN category ON post.category = category.category_id
    WHERE post.post_id = {$_GET['id']}";

      $result = mysqli_query($conn, $sql) or die("Query failed");
  }

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="save-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername"  value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <!-- <?php if ($row['category_name'] == "Entertainment") echo 'Entertain'; ?> -->
                <option value="Entertainment" <?php if ($row['category_name'] == "Entertainment") echo 'selected'; ?>>Entertainment</option>
                <option value="Sports" <?php if ($row['category_name'] == "Sports") echo 'selected'; ?>>Sports</option>
                <option value="Politics" <?php if ($row['category_name'] == "Politics") echo 'selected'; ?>>Politics</option>
                <option value="Business" <?php if ($row['category_name'] == "Buisness") echo 'selected'; ?>>Business</option>

                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img src="/upload/<?php echo $row['post_img']; ?>" height="150px" alt="image not found">
                <!-- <?php echo $row['post_img']?> -->
                <input type="hidden" name="old-image" value="">
            </div>
            <?php } ?>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
