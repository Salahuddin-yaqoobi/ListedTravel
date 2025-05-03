<?php include "header.php"; ?>
<?php 
include "config.php";
$limit = 10;

if (isset($_GET['page'])) {  
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;

if ($_SESSION['role'] == "1") {
    $sql = "SELECT post_id, title, description, post_date, category, post_img, price, duration FROM post ORDER BY post_id DESC LIMIT {$offset}, {$limit}";
} elseif ($_SESSION['role'] == "0") {
    $sql = "SELECT post.post_id, post.title, post.description, post.post_date, post.category, post.post_img, post.price, post.duration FROM post 
            WHERE post.author = {$_SESSION['user_id']}
            ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
}

$result = mysqli_query($conn , $sql) or die("Query failed");
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Posts</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-post.php">Add Post</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th> <!-- New column -->
            <th>Date</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
            if (mysqli_num_rows($result) > 0) {
                $serialNo = $offset + 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = $row['post_img'];
                    if (strpos($imagePath, 'uploads/') === 0) {
                        $imagePath = substr($imagePath, strlen('uploads/'));
                    }

                    // Check category and adjust price display
                    if ($row['category'] == 'For Rent') {
                        $price = number_format($row['price']) . " PKR / " . ucfirst($row['duration']);
                    } else {
                        $price = number_format($row['price']) . " PKR";
                    }
          ?>
            <tr>
              <td><?php echo $serialNo++; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['category']; ?></td>
              <td><?php echo $price; ?> <!-- Updated price column with condition --></td>
              <td><?php echo $row['post_date']; ?></td>
              <td style="text-align: center;">
                <img src="uploads/<?php echo $imagePath; ?>" alt="Post Image" style="height: 80px; width: 100px; object-fit: cover; border: 1px solid #ccc; border-radius: 4px;"><br>
                <small><?php echo basename($imagePath); ?></small>
              </td>
              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
              <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
            </tr>
          <?php }} ?>
          </tbody>
        </table>
        <?php
          $sql1 = "SELECT * FROM post";
          $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
          if (mysqli_num_rows($result1) > 0) {
              $total_records = mysqli_num_rows($result1);
              $total_page = ceil($total_records / $limit);

              echo "<ul class='pagination admin-pagination'>";

              if ($page > 1) {
                  echo '<li><a href="post.php?page=' . ($page - 1) . '">Prev</a></li>';
              }

              for ($i = 1; $i <= $total_page; $i++) {
                  $active = ($i == $page) ? "active" : "";
                  echo '<li class="' . $active . '"><a href="post.php?page=' . $i . '">' . $i . '</a></li>';
              }

              if ($total_page > $page) {
                  echo '<li><a href="post.php?page=' . ($page + 1) . '">Next</a></li>';
              }
              echo "</ul>";
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
