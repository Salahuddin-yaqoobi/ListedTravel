<?php
session_start();
include "config.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != '1') {
    header("Location: " . APP_URL . "/admin/");
    exit();
}

$side_images = [];

if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
    $sql = "SELECT * FROM post WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (!empty($row['side_img']) && $row['side_img'] !== 'null') {
            $decodedImages = json_decode($row['side_img'], true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedImages)) {
                $side_images = $decodedImages;
            } else {
                error_log("JSON Decode Error: " . json_last_error_msg());
                $side_images = [];
            }
        }
    } else {
        echo "<h2>No data found for the given post ID.</h2>";
        exit();
    }
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $post_id = intval($_GET['id']);
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $postdesc = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $product_status = mysqli_real_escape_string($conn, $_POST['product_status']);

    $existingImages = isset($_POST['existing_side_images']) ? $_POST['existing_side_images'] : [];
    $deletedImages = isset($_POST['remove_images']) ? $_POST['remove_images'] : [];

    $newSideImages = [];

    if (isset($_FILES['side_images'])) {
        foreach ($_FILES['side_images']['name'] as $key => $filename) {
            $filename = basename($filename);
            $file_tmp = $_FILES['side_images']['tmp_name'][$key];
            $upload_path = "uploads/" . $filename;

            if (move_uploaded_file($file_tmp, $upload_path)) {
                $newSideImages[] = $filename;
            }
        }
    }

    $allSideImages = array_merge($existingImages, $newSideImages);
    $finalSideImages = array_values(array_diff($allSideImages, $deletedImages)); // clean index

    $sideImagesJson = count($finalSideImages) ? json_encode($finalSideImages) : json_encode($side_images);

    $sql = "UPDATE post SET 
                title = '{$post_title}', 
                description = '{$postdesc}', 
                category = '{$category}', 
                price = '{$price}', 
                duration = '{$duration}', 
                product_status = '{$product_status}', 
                side_img = '{$sideImagesJson}' 
            WHERE post_id = {$post_id}";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Post updated successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating post in database.']);
    }

    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post - Listed Transport</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
</head>
<body>
<!-- Dashboard Layout -->
<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="img/logo.png" alt="Logo" class="logo">
        </div>
        <nav class="sidebar-nav">
        <ul>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'post.php') ? 'class="active"' : ''; ?>>
                <a href="post.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'all-posts.php') ? 'class="active"' : ''; ?>>
                <a href="all-posts.php"><i class="fa fa-newspaper-o"></i> <span>All Posts</span></a>
            </li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'add-post.php') ? 'class="active"' : ''; ?>>
                <a href="add-post.php"><i class="fa fa-plus"></i> <span>Add Post</span></a>
            </li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'all-blogs.php') ? 'class="active"' : ''; ?>>
                <a href="all-blogs.php"><i class="fa fa-rss"></i> <span>All Blogs</span></a>
            </li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'add-blog.php') ? 'class="active"' : ''; ?>>
                <a href="add-blog.php"><i class="fa fa-pencil"></i> <span>Add Blog</span></a>
            </li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'all-banners.php') ? 'class="active"' : ''; ?>>
                <a href="all-banners.php"><i class="fa fa-plus"></i> <span>All Banner</span></a>
            </li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'banner.php') ? 'class="active"' : ''; ?>>
                <a href="banner.php"><i class="fa fa-plus"></i> <span>Add Banner</span></a>
            </li>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == '1') { ?>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'users.php') ? 'class="active"' : ''; ?>>
                <a href="users.php"><i class="fa fa-users"></i> <span>Profile</span></a>
            </li>
            <?php } ?>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contactforms.php') ? 'class="active"' : ''; ?>>
                <a href="contactforms.php"><i class="fa fa-envelope"></i> <span>Contact Forms</span></a>
            </li>
            <li class="logout-item">
                <a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
            </li>
        </ul>
        </nav>
    </div>

     <!-- Main Content -->
     <div class="main-content">
        <div class="content-area">
            <div class="page-header">
                <h1><i class="fa fa-edit"></i> Update Post</h1>
            </div>
            <form id="postForm" action="all-posts.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="post-form">
            <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle"><i class="fa fa-heading"></i> Title</label>
                        <input type="text" name="post_title" class="form-control" value="<?php echo $row['title']; ?>" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputCategory"><i class="fa fa-tag"></i> Category</label>
                        <select name="category" class="form-control" id="category" required>
                            <option value="For Rent" <?php if($row['category'] == 'For Rent') echo 'selected'; ?>>For Rent</option>
                            <option value="For Sale" <?php if($row['category'] == 'For Sale') echo 'selected'; ?>>For Sale</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescription"><i class="fa fa-align-left"></i> Description</label>
                    <textarea name="postdesc" class="form-control" rows="5" required><?php echo $row['description']; ?></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6" id="price-group">
                        <label for="price"><i class="fa fa-money"></i> Price</label>
                        <div class="input-group">
                            <span class="input-group-text">AED</span>
                            <input type="number" name="price" class="form-control" value="<?php echo $row['price']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6" id="duration-group" style="display: <?php echo ($row['category'] == 'For Rent' ? 'block' : 'none'); ?>;">
                        <label for="duration"><i class="fa fa-clock-o"></i> Duration</label>
                        <select name="duration" class="form-control">
                            <option value="per day" <?php if($row['duration'] == 'per day') echo 'selected'; ?>>Per Day</option>
                            <option value="per month" <?php if($row['duration'] == 'per month') echo 'selected'; ?>>Per Month</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for=""><i class="fa fa-image"></i> Post Image</label>
                    <div class="image-upload-container">
                        <input type="file" name="new-image" id="imageInput" class="form-control" onchange="previewImage(event)">
                        <div class="image-preview-container">
                            <img id="imagePreview" src="<?php echo $row['post_img']; ?>" alt="Post Image">
                        </div>
                    </div>
                </div>


<style>
   .preview-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
}

.preview-container img {
    width: 120px; /* Fixed width */
    height: 120px; /* Fixed height */
    object-fit: contain; /* Ensure the full image is visible within the container */
    border: 1px solid #ccc;
    padding: 4px;
    border-radius: 4px;
}

.side-image-container {
    position: relative;
}

.cross-btn {
    position: absolute;
    top: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 16px;
    padding: 3px;
    cursor: pointer;
    visibility: hidden;
}

.side-image-container:hover .cross-btn {
    visibility: visible;
}

</style>



<div class="form-group">
            <label for="side_images" id="side-images-label">Side Images</label>
            <input type="file" id="side_images" name="side_images[]" multiple>
     <!-- Displaying Side Images (Thumbnails) -->
<div id="side-image-preview" class="preview-container">
    <?php
    // Check if there are images
    if (!empty($side_images)) {
        // Loop through and display each side image
        foreach ($side_images as $image) {
            $image = trim($image);  // Trim the image name for safety
            if (!empty($image)) {
                // Display image with its remove button
                $encodedImage = 'uploads/' . rawurlencode($image);
                echo '<div class="side-image-container" data-filename="' . htmlspecialchars($image) . '">';
                echo '<img src="' . $encodedImage . '" alt="Side Image" class="side-image">';
                echo '<button class="remove-image cross-btn" data-filename="' . htmlspecialchars($image) . '">&times;</button>';
                echo '</div>';
            }
        }
    } else {
        echo "<p>No side images found.</p>"; // Fallback message if no images
    }
    ?>
</div>


        </div>



        <script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('postForm');
    const sideImageInput = document.getElementById('side_images');
    const sideImagePreview = document.getElementById('side-image-preview');
    const allSideImages = [];
    const deletedImages = [];

    // Fetch existing images from HTML (data-filename attribute)
    document.querySelectorAll('.side-image-container[data-filename]').forEach(container => {
        const filename = container.dataset.filename;
        allSideImages.push(filename);

        const crossBtn = container.querySelector('.cross-btn');
        if (crossBtn) {
            crossBtn.addEventListener('click', function () {
                container.remove();
                const index = allSideImages.indexOf(filename);
                if (index !== -1) {
                    allSideImages.splice(index, 1);
                    deletedImages.push(filename);
                }
            });
        }
    });

    // Handle new image uploads
    sideImageInput.addEventListener('change', function () {
        Array.from(this.files).forEach(file => {
            const alreadyExists = allSideImages.some(img => (typeof img === 'string' ? img : img.name) === file.name);
            if (!alreadyExists) {
                allSideImages.push(file);

                const container = document.createElement('div');
                container.classList.add('side-image-container');

                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    container.appendChild(img);

                    const crossBtn = document.createElement('button');
                    crossBtn.classList.add('cross-btn');
                    crossBtn.textContent = 'X';
                    crossBtn.addEventListener('click', function () {
                        container.remove();
                        const index = allSideImages.findIndex(f => (typeof f === 'string' ? f : f.name) === file.name);
                        if (index !== -1) {
                            allSideImages.splice(index, 1);
                        }
                    });

                    container.appendChild(crossBtn);
                    sideImagePreview.appendChild(container);
                };
                reader.readAsDataURL(file);
            }
        });

        this.value = ''; // Clear input
    });

    // Handle form submission
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;

        const formData = new FormData(form);

        allSideImages.forEach(image => {
            if (image instanceof File) {
                formData.append('side_images[]', image);
            } else {
                formData.append('existing_side_images[]', image);
            }
        });

        deletedImages.forEach(img => {
            formData.append('remove_images[]', img);
        });

        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
        Swal.fire({
        icon: 'success',
        title: 'Updated!',
        text: 'Post updated successfully!',
        timer: 1500,
        showConfirmButton: false
        });

        Swal.fire({
    icon: 'success',
    title: 'Updated!',
    text: 'Post updated successfully!',
    timer: 1500,
    showConfirmButton: false
}).then(() => {
    // ✅ Redirect to all-posts.php after success
    window.location.href = 'all-posts.php';
});

            } else {
                alert(data.message || 'An error occurred.');
                submitButton.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error during fetch:', error);
            submitButton.disabled = false;
        });
    });
});
</script>










                

                <div class="form-group">
                    <label for="product_status"><i class="fa fa-tag"></i> Product Status</label>
                    <button type="button" id="statusButton" class="status-btn <?php echo $row['product_status'] == 'sold' ? 'sold' : 'available'; ?>" onclick="toggleStatus(this)">
                        <span class="status-text"><?php echo ucfirst($row['product_status']); ?></span>
                    </button>
                    <input type="hidden" name="product_status" id="product_status" value="<?php echo $row['product_status']; ?>">
                </div>

                <div class="form-actions">
                    <a href="all-posts.php" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back to Posts
                    </a>
                    <button type="submit" name="submit" class="btn btn-primary btn-submit">
                        <i class="fa fa-save"></i> Update Post
                    </button>
                </div>
            </form>
        </div>
       
    </div>
</div>

<style>
/* Dashboard Layout */
.dashboard-container {
    display: flex;
    min-height: 100vh;
    background: #f8f9fa;
}

/* Sidebar */
.sidebar {
    width: 220px;
    background: #2c3e50;
    color: #fff;
    position: fixed;
    height: 100vh;
    overflow-y: auto;
    z-index: 1000;
    transition: all 0.3s ease;
}

.sidebar-header {
    padding: 15px 10px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    position: sticky;
    top: 0;
    background: #2c3e50;
    z-index: 1001;
    display: flex;
    justify-content: center;
    align-items: center;
}

.sidebar-header .logo {
    max-width: 100px;
    height: auto;
    display: block;
    margin: 0 auto;
}

.sidebar-nav ul {
    list-style: none;
    padding: 0;
    margin: 10px 0;
}

.sidebar-nav li {
    margin: 2px 0;
}

.sidebar-nav a {
    color: #fff;
    padding: 8px 15px;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: all 0.3s;
    font-size: 14px;
}

.sidebar-nav a i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
    font-size: 16px;
}

.sidebar-nav li.active a,
.sidebar-nav a:hover {
    background: rgba(255,255,255,0.1);
}

.logout-item {
    margin-top: 10px;
    border-top: 1px solid rgba(255,255,255,0.1);
}

/* Main Content */
.main-content {
    flex: 1;
    margin-left: 220px;
    padding: 20px;
    transition: all 0.3s ease;
}

/* Content Area */
.content-area {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 25px;
}

.page-header {
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.page-header h1 {
    font-size: 24px;
    color: #2c3e50;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.page-header h1 i {
    color: #3498db;
}

/* Form Styles */
.post-form {
    max-width: 900px;
    margin: 0 auto;
}

.form-row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.form-group {
    margin-bottom: 20px;
    padding: 0 10px;
}

.form-group.col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-group label i {
    color: #3498db;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

.input-group {
    display: flex;
    align-items: center;
}

.input-group-text {
    padding: 12px;
    background: #f8f9fa;
    border: 1px solid #ddd;
    border-right: none;
    border-radius: 6px 0 0 6px;
    color: #666;
}

.input-group .form-control {
    border-radius: 0 6px 6px 0;
}

.image-upload-container {
    border: 2px dashed #ddd;
    padding: 20px;
    border-radius: 6px;
    text-align: center;
    transition: all 0.3s;
}

.image-upload-container:hover {
    border-color: #3498db;
}

.image-preview-container {
    margin-top: 15px;
    text-align: center;
}

.image-preview-container img {
    max-width: 100%;
    height: auto;
    max-height: 300px;
    border-radius: 6px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.form-actions {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.btn {
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s;
    border-radius: 6px;
}

.btn-primary {
    background: #3498db;
    border-color: #3498db;
    color: #fff;
}

.btn-secondary {
    background: #95a5a6;
    border-color: #95a5a6;
    color: #fff;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .sidebar {
        width: 180px;
    }
    
    .main-content {
        margin-left: 180px;
    }
    
    .sidebar-nav a {
        padding: 8px 10px;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 50px;
    }
    
    .sidebar-header {
        padding: 10px 5px;
    }
    
    .sidebar-header .logo {
        max-width: 35px;
    }
    
    .sidebar-nav a span {
        display: none;
    }
    
    .sidebar-nav a {
        padding: 10px;
        justify-content: center;
    }
    
    .sidebar-nav a i {
        margin: 0;
        font-size: 18px;
    }
    
    .main-content {
        margin-left: 50px;
        padding: 15px;
    }
    
    .form-group.col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 40px;
    }
    
    .sidebar-header {
        padding: 8px 5px;
    }
    
    .sidebar-header .logo {
        max-width: 30px;
    }
    
    .main-content {
        margin-left: 40px;
    }
    
    .page-header h1 {
        font-size: 20px;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}

/* Main Footer */
.main-footer {
    margin-top: 30px;
    padding: 20px;
    text-align: center;
    color: #666;
    font-size: 14px;
    border-top: 1px solid #eee;
}

.main-footer p {
    margin: 0;
}

/* Remove sidebar footer styles */
.sidebar-nav {
    margin-bottom: 0;
}

.status-btn {
    padding: 12px 30px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    outline: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 120px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.status-btn.available {
    background-color: #2ecc71;
    color: white;
}

.status-btn.sold {
    background-color: #e74c3c;
    color: white;
}

.status-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.status-btn:active {
    transform: translateY(1px);
}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
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

  // Handle form submission
  document.querySelector('.post-form').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      formData.append('submit', '1'); // Add submit parameter
      
      // Log form data for debugging
      for (let pair of formData.entries()) {
          console.log(pair[0] + ': ' + pair[1]);
      }
      
      fetch('save-post.php', {
          method: 'POST',
          body: formData
      })
      .then(response => {
          console.log('Response status:', response.status);
          return response.json();
      })
      .then(data => {
          console.log('Response data:', data);
          if (data.status === 'success') {
              Swal.fire({
                  title: 'Success!',
                  text: data.message,
                  icon: 'success',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#3498db'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'all-posts.php';
                  }
              });
          } else {
              Swal.fire({
                  title: 'Error!',
                  text: data.message,
                  icon: 'error',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#e74c3c'
              });
          }
      })
      .catch(error => {
          console.error('Error:', error);
          Swal.fire({
              title: 'Error!',
              text: 'An error occurred while updating the post. Please check the console for details.',
              icon: 'error',
              confirmButtonText: 'OK',
              confirmButtonColor: '#e74c3c'
          });
      });
  });

  function toggleStatus(button) {
      if (button.classList.contains('available')) {
          button.classList.remove('available');
          button.classList.add('sold');
          button.querySelector('.status-text').textContent = 'Sold';
          document.getElementById('product_status').value = 'sold';
      } else {
          button.classList.remove('sold');
          button.classList.add('available');
          button.querySelector('.status-text').textContent = 'Available';
          document.getElementById('product_status').value = 'available';
      }
  }
</script>


<?php include "footer.php"; ?>
</body>
</html> 