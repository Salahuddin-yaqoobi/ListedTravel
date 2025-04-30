<?php include "header.php"; ?>
<?php
 include "config.php";
 $cat_id = $_GET['id'];
 $sql = "SELECT * FROM category WHERE category_id = {$cat_id}";
 $result = mysqli_query($conn, $sql) or die("Query Failed");
 $row = mysqli_fetch_assoc($result); 
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
<?php
if(isset($_POST['sumbit'])){
    include "config.php";
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    $sql1 = "UPDATE category SET category_name = '{$cat_name}' WHERE category_id = {$cat_id}";
    if(mysqli_query($conn , $sql1)){
        header("Location: http://localhost/news-site/admin/category.php");
    }
} 
?>
