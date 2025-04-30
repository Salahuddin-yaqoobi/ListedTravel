<?php include "header.php"; ?>

<?php
  include "config.php";

  // Check if the 'id' GET parameter exists
  if (isset($_GET['id'])) {
      $sql = "SELECT * FROM user WHERE user_id = {$_GET['id']}";
      $result = mysqli_query($conn, $sql) or die("Query failed");
  }
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="1" <?php if ($row['role'] == 1) echo 'selected'; ?>>Admin</option>
                            <option value="0" <?php if ($row['role'] == 0) echo 'selected'; ?>>Normal User</option>
                        </select>
                    </div>
                    <?php } ?>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>

<?php
// After the form is submitted
if (isset($_POST['submit'])) {
    // Validate the data
    $user_id = $_POST['user_id'];
    $fname = mysqli_real_escape_string($conn, $_POST['f_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['l_name']);
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Update query
    $sql1 = "UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', role = '{$role}' WHERE user_id = {$user_id}";
    $result = mysqli_query($conn, $sql1);

    if ($result) {
        // Perform the redirect after successful update
        header("Location: http://localhost/news-site/admin/users.php");
        exit;  // Exit to make sure no further code is executed
    } else {
        echo "Query failed";
    }
}
?>

<?php include "footer.php"; ?>
