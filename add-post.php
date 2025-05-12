<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Let's also test the database connection and query
include "config.php";

session_start();
if(!isset($_SESSION['username'])){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

// Move the form processing code here, before any HTML output
if (isset($_POST['submit'])) {
    // Basic data collection
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $postdesc = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $vehicle_cat = mysqli_real_escape_string($conn, $_POST['vehicle_category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    
    // Handle duration differently
    if($category == 'For Rent') {
        $duration = isset($_POST['duration']) ? mysqli_real_escape_string($conn, $_POST['duration']) : 'per_day';
    } else {
        $duration = 'one_time'; // Default value for For Sale
    }

    // File upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    // Current date
    $date = date('d M, Y');

    // Add product_status
    $product_status = isset($_POST['product_status']) ? 'sold' : 'available';

    // Insert query with duration always having a value
    $sql = "INSERT INTO post (title, description, category, vehicle_cat, post_img, post_date, price, duration, product_status) 
            VALUES ('{$post_title}', '{$postdesc}', '{$category}', {$vehicle_cat}, '{$target_file}', '{$date}', {$price}, '{$duration}', '{$product_status}')";

    // Execute query and redirect
    if(mysqli_query($conn, $sql)) {
        header("Location: all-posts.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// Test query to check vehicle_category table
$test_query = "SELECT * FROM vehicle_category";
$test_result = mysqli_query($conn, $test_query);
if (!$test_result) {
    die("Query Error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post - Listed Travel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
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
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'add-post.php') ? 'class="active"' : ''; ?>>
                <a href="all-banners.php"><i class="fa fa-plus"></i> <span>All Banner</span></a>
            </li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'add-post.php') ? 'class="active"' : ''; ?>>
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
            <form action="" method="POST" enctype="multipart/form-data" class="post-form">
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
</body>
</html>
