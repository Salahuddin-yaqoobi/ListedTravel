<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";
session_start();

// Check if the user is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != '1') {
    header("Location: " . APP_URL . "/admin/");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collecting data
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $postdesc = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $vehicle_cat = mysqli_real_escape_string($conn, $_POST['vehicle_category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Handle main image upload
    $target_dir = "uploads/";
    $main_img_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $main_img_name;

    // Check if the main image is uploaded
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        die("Error uploading main image. Check folder permissions or file type.");
    }

    // Determine duration
    $duration = ($category == 'For Rent') ? 
        (isset($_POST['duration']) ? mysqli_real_escape_string($conn, $_POST['duration']) : 'per_day') 
        : 'one_time';

    // Get current date
    $date = date('d M, Y');

    // Add product status
    $product_status = mysqli_real_escape_string($conn, $_POST['product_status']);

    // Handle side images upload
    $sideImages = [];
    $maxFileSize = 2097152; // 2MB

    if (isset($_FILES['side_images']) && !empty($_FILES['side_images']['name'][0])) {
        foreach ($_FILES['side_images']['name'] as $key => $file_name) {
            $file_tmp = $_FILES['side_images']['tmp_name'][$key];
            $file_size = $_FILES['side_images']['size'][$key];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($file_ext, $allowed_extensions) && $file_size <= $maxFileSize) {
                $upload_path = $target_dir . $file_name;

                if (move_uploaded_file($file_tmp, $upload_path)) {
                    if (!in_array($file_name, $sideImages)) {
                        $sideImages[] = $file_name;
                    }
                }
            }
        }
    }

    // If there are side images, encode them in JSON. Otherwise, store NULL or empty string.
    $sideImagesJson = !empty($sideImages) ? json_encode($sideImages) : NULL;
    $sideImagesJsonEscaped = mysqli_real_escape_string($conn, $sideImagesJson);

    // Prepare SQL insert query
    $sql = "INSERT INTO post (title, description, category, vehicle_cat, post_img, post_date, price, duration, product_status, side_img) 
            VALUES (
                '{$post_title}', 
                '{$postdesc}', 
                '{$category}', 
                '{$vehicle_cat}', 
                'uploads/{$main_img_name}', 
                '{$date}', 
                '{$price}', 
                '{$duration}', 
                '{$product_status}', 
                '{$sideImagesJsonEscaped}'
            )";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Store success message in session
        $_SESSION['status'] = 'success';
        // Redirect to the posts page
        header("Location: all-posts.php");
        exit();
    } else {
        die("SQL Error: " . mysqli_error($conn));
    }
}
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// Check if there is a success status in the session
<?php if (isset($_SESSION['status']) && $_SESSION['status'] == 'success'): ?>
    // Show SweetAlert success message
    Swal.fire({
        icon: 'success',
        title: 'Post Added!',
        text: 'The post was added successfully.',
        timer: 1500,
        showConfirmButton: false
    }).then(() => {
        // Redirect to all-posts.php after showing the success message
        window.location.href = 'all-posts.php';
    });

    // Clear the session status after showing the alert
    <?php unset($_SESSION['status']); ?>
<?php endif; ?>
</script>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post - Listed Transport</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
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
                <h1>Add New Post</h1>
            </div>
            
            <!-- Form -->
            <form id="postForm" action="all-posts.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="post_title">Title</label>
                    <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="postdesc">Description</label>
                    <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" required>
                        <option disabled selected>Select Category</option>
                        <option value="For Rent">For Rent</option>
                        <option value="For Sale">For Sale</option>
                    </select>
                </div>

                <!-- Add this new section -->
                <div class="form-group">
                    <label for="vehicle_category">Vehicle Category</label>
                    <select name="vehicle_category" class="form-control">
                        <option value="">Select Vehicle Category</option>
                        <?php
                        // Debug output
                        echo "<!-- Starting vehicle category query -->\n";
                        
                        $cat_sql = "SELECT * FROM vehicle_category";
                        $cat_result = mysqli_query($conn, $cat_sql);
                        
                        if (!$cat_result) {
                            echo "<!-- Query Error: " . mysqli_error($conn) . " -->\n";
                        } else {
                            if (mysqli_num_rows($cat_result) > 0) {
                                while ($cat = mysqli_fetch_assoc($cat_result)) {
                                    echo "<option value='" . $cat['category_id'] . "'>" . $cat['category_name'] . "</option>\n";
                                }
                            } else {
                                echo "<!-- No categories found -->\n";
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- Dynamic fields based on category selection -->
                <div id="dynamic-fields"></div>

                <div class="form-group">
                    <label for="fileToUpload">Post Image</label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                        <div class="file-upload-message">
                            <i class="fa fa-cloud-upload"></i>
                            <span>Choose a file or drag it here</span>
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
    position: relative; /* Required for the cross button's absolute positioning */
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
    <div id="side-image-preview" class="preview-container"></div>
  </div>


                <!-- Replace the existing status-toggle div with this new one -->
                <div class="form-group status-toggle">
                    <label class="status-label">Product Status</label>
                    <button type="button" id="statusButton" class="status-btn available" onclick="toggleStatus(this)">
                        <span class="status-text">Available</span>
                        <input type="hidden" name="product_status" id="product_status" value="available">
                    </button>
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit" class="btn-submit">
                        <i class="fa fa-save"></i> Save Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
// JavaScript to dynamically show fields based on category selection
const categorySelect = document.querySelector('select[name="category"]');
const dynamicFields = document.getElementById('dynamic-fields');

categorySelect.addEventListener('change', function() {
    const category = this.value;
    dynamicFields.innerHTML = '';

    if (category === 'For Rent') {
        dynamicFields.innerHTML = `
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <select name="duration" class="form-control">
                    <option value="" selected>Choose Duration</option>
                    <option value="per_day">Per Day</option>
                    <option value="per_month">Per Month</option>
                </select>
            </div>
        `;
    } else if (category === 'For Sale') {
        dynamicFields.innerHTML = `
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
        `;
    }
});

// File upload preview
document.getElementById('fileToUpload').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const message = document.querySelector('.file-upload-message span');
        message.textContent = file.name;
    }
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

<style>
/* Reset some default styles */
body {
    margin: 0;
    padding: 0;
    background: #f8f9fa;
    font-family: sans-serif,arial,Helvetica;
}

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
    padding: 15px;
    transition: all 0.3s ease;
}

/* Content Area */
.content-area {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 20px;
}

.page-header {
    margin-bottom: 20px;
}

.page-header h1 {
    font-size: 24px;
    color: #2c3e50;
    margin: 0;
}

/* Form Styles */
.post-form {
    max-width: 800px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-control:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

/* File Upload Styles */
.file-upload-wrapper {
    position: relative;
    border: 2px dashed #ddd;
    border-radius: 4px;
    padding: 20px;
    text-align: center;
    transition: all 0.3s;
}

.file-upload-wrapper:hover {
    border-color: #3498db;
}

.file-upload-wrapper input[type="file"] {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.file-upload-message {
    color: #7f8c8d;
}

.file-upload-message i {
    font-size: 24px;
    margin-bottom: 10px;
    display: block;
}

/* Submit Button */
.form-actions {
    margin-top: 30px;
    text-align: right;
}

.btn-submit {
    background: #3498db;
    color: #fff;
    border: none;
    padding: 12px 24px;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background 0.3s;
}

.btn-submit:hover {
    background: #2980b9;
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
        padding: 10px;
    }
    
    .content-area {
        padding: 15px;
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
        text-align: center;
    }
    
    .btn-submit {
        width: 100%;
        justify-content: center;
    }
}

/* Status Toggle Switch */
.status-toggle {
    margin: 20px 0;
}

.status-label {
    display: block;
    margin-bottom: 10px;
    color: #2c3e50;
    font-weight: 500;
}

.status-btn {
    padding: 10px 25px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    outline: none;
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 120px;
}

.status-btn.available {
    background-color: #2ecc71;
    color: white;
    box-shadow: 0 2px 4px rgba(46, 204, 113, 0.2);
}

.status-btn.sold {
    background-color: #e74c3c;
    color: white;
    box-shadow: 0 2px 4px rgba(231, 76, 60, 0.2);
}

.status-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.status-btn:active {
    transform: translateY(1px);
}

.status-text {
    position: relative;
    z-index: 1;
}

/* Remove the old toggle switch styles */
.toggle-switch, .slider, .labels {
    display: none;
}
</style>

<?php include "footer.php"; ?>
<script>
let allSideImages = []; // Array to hold all selected side images

document.getElementById('side_images').addEventListener('change', function () {
    const sideImagePreview = document.getElementById('side-image-preview');

    // Loop through all selected files
    Array.from(this.files).forEach(file => {
        // Ensure no duplicate images are added to the array
        if (!allSideImages.some(existingFile => existingFile.name === file.name)) {
            allSideImages.push(file);  // Add new image to array

            // Create a container for the image and cross button
            const container = document.createElement('div');
            container.classList.add('side-image-container');

            // Create an image preview for the new file
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                container.appendChild(img);

                // Create the cross button
                const crossBtn = document.createElement('button');
                crossBtn.classList.add('cross-btn');
                crossBtn.innerHTML = 'X';

                // Add click event to remove the image when clicked
                crossBtn.addEventListener('click', function () {
                    // Remove the image from preview
                    container.remove();
                    // Remove the image from the array
                    const index = allSideImages.findIndex(existingFile => existingFile.name === file.name);
                    if (index !== -1) {
                        allSideImages.splice(index, 1);
                    }

                    
                });

                // Append the cross button to the container
                container.appendChild(crossBtn);
            };
            reader.readAsDataURL(file);

            // Append the container to the preview
            sideImagePreview.appendChild(container);
        }
    });

    // Reset input to allow same file re-selection
    this.value = '';

});

document.getElementById('postForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Remove default (empty) side_images input so only our appended ones are sent
    formData.delete('side_images[]');

    // Add all selected side images to the form data
    allSideImages.forEach(file => {
        formData.append('side_images[]', file);
    });


   

    fetch('add-post.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.redirected) {
            window.location.href = response.url;
        } else {
            return response.text().then(console.warn);
        }
    })
    .catch(error => console.error('Error during fetch:', error));
});
</script>

</body>
</html>
