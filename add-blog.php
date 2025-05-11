<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Let's also test the database connection and query
include "config.php";

// Function to check main blog count
function getMainBlogCount($conn) {
    $sql = "SELECT COUNT(*) as count FROM blogs WHERE blog_location = 'main'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

session_start();
if(!isset($_SESSION['username'])){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

// Move the form processing code here, before any HTML output
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $description = mysqli_real_escape_string($conn, $_POST['blog_description']);
    $date = date("Y-m-d");
    $blog_location = mysqli_real_escape_string($conn, $_POST['blog_location']);

    // Check main blog count if trying to add to main page
    if ($blog_location === 'main') {
        $count_sql = "SELECT COUNT(*) as count FROM blogs WHERE blog_location = 'main'";
        $count_result = mysqli_query($conn, $count_sql);
        $row = mysqli_fetch_assoc($count_result);
        
        if ($row['count'] >= 3) {
            // Don't redirect, just show the alert
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Limit Reached!',
                        text: 'Maximum of 3 blogs can be displayed on main page. Please set as regular page.',
                        icon: 'warning',
                        confirmButtonColor: '#3498db'
                    }).then((result) => {
                        const locationButton = document.getElementById('locationButton');
                        if (locationButton.classList.contains('main')) {
                            toggleLocation(locationButton);
                        }
                    });
                });
            </script>";
            // Continue with the rest of the page load
        } else {
            // Continue with file upload and database insertion
            // File upload handling
            if(isset($_FILES['blog_img'])) {
                $errors = array();
                $file_name = $_FILES['blog_img']['name'];
                $file_size = $_FILES['blog_img']['size'];
                $file_tmp = $_FILES['blog_img']['tmp_name'];
                $file_type = $_FILES['blog_img']['type'];
                $tmp = explode('.', $file_name);
                $file_ext = strtolower(end($tmp));
                $extensions = array("jpeg", "jpg", "png");

                if(in_array($file_ext, $extensions) === false) {
                    $errors[] = "Please choose a JPEG or PNG file.";
                }

                if($file_size > 2097152) {
                    $errors[] = "File size must be less than 2 MB";
                }

                if(empty($errors)) {
                    $img_name = time() . "_" . $file_name;
                    move_uploaded_file($file_tmp, "upload/" . $img_name);
                    
                    // Insert into database
                    $sql = "INSERT INTO blogs (blog_title, blog_description, blog_date, blog_img, blog_location) 
                            VALUES ('$title', '$description', '$date', '$img_name', '$blog_location')";
                    
                    if(mysqli_query($conn, $sql)) {
                        header("Location: all-blogs.php");
                        exit();
                    } else {
                        echo "<script>
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to save blog post.',
                                icon: 'error',
                                confirmButtonColor: '#3498db'
                            });
                        </script>";
                    }
                } else {
                    $error_message = implode("<br>", $errors);
                    echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            html: '$error_message',
                            icon: 'error',
                            confirmButtonColor: '#3498db'
                        });
                    </script>";
                }
            }
        }
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
    <title>Add Blog - Listed Travel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
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
                <h1>Add New Blog</h1>
                
            </div>
            
            <!-- Form -->
            <form action="" method="POST" enctype="multipart/form-data" class="post-form">
                <div class="form-group">
                    <label for="blog_title">Title</label>
                    <input type="text" name="blog_title" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="blog_description">Description</label>
                    <textarea name="blog_description" class="form-control" rows="5" required></textarea>
                </div>
                <div class="form-group blog-location-toggle">
                    <label class="location-label">Blog Location</label>
                    <div class="toggle-container">
                        <button type="button" id="locationButton" class="location-btn main" onclick="toggleLocation(this)">
                            <span class="location-text">Main Page</span>
                            <input type="hidden" name="blog_location" id="blog_location" value="main">
                        </button>
                    </div>
                    <p class="location-hint">Toggle to set blog visibility on main page</p>
                </div>
                <div class="form-group">
                    <label for="blog_img">Blog Image</label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="blog_img" id="blog_img" required>
                        <div class="file-upload-message">
                            <i class="fa fa-cloud-upload"></i>
                            <span>Choose a file or drag it here</span>
                        </div>
                    </div>
                </div>

                <div class="form-actions" style="display:flex; flex:row; justify-content:space-between;" >
                <a href="all-blogs.php" class="back-btn">
                    <i class="fa fa-arrow-left"></i> Back to All Blogs
                </a>
                    <button type="submit" name="submit" class="btn-submit">
                        <i class="fa fa-save"></i> Save Blog
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
document.getElementById('blog_img').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const message = document.querySelector('.file-upload-message');
        message.innerHTML = `
            <i class="fa fa-file"></i>
            <span>${file.name}</span>
        `;
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

function toggleLocation(button) {
    if (button.classList.contains('main')) {
        button.classList.remove('main');
        button.classList.add('regular');
        button.querySelector('.location-text').textContent = 'Regular Page';
        document.getElementById('blog_location').value = 'regular';
    } else {
        button.classList.remove('regular');
        button.classList.add('main');
        button.querySelector('.location-text').textContent = 'Main Page';
        document.getElementById('blog_location').value = 'main';
    }
}

// Replace the form submission event listener in your JavaScript section
document.querySelector('.post-form').addEventListener('submit', async function(e) {
    e.preventDefault(); // Prevent default form submission

    // Check if main location is selected
    if (document.getElementById('blog_location').value === 'main') {
        try {
            // Check main blog count
            const response = await fetch('check_main_blogs.php');
            const data = await response.json();
            
            if (data.count >= 3) {
                await Swal.fire({
                    title: 'Limit Reached!',
                    text: 'Maximum of 3 blogs can be displayed on main page. Please set as regular page.',
                    icon: 'warning',
                    confirmButtonColor: '#3498db'
                });
                
                // Toggle to regular page
                const locationButton = document.getElementById('locationButton');
                if (locationButton.classList.contains('main')) {
                    toggleLocation(locationButton);
                }
                return;
            }
        } catch (error) {
            console.error('Error checking main blog count:', error);
        }
    }
    
    // If all checks pass, submit the form
    this.submit();
});
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
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.page-header h1 {
    font-size: 24px;
    color: #2c3e50;
    margin: 0;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: #f8f9fa;
    color: #2c3e50;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.back-btn:hover {
    background: #e9ecef;
    color: #2c3e50;
    text-decoration: none;
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
    transition: all 0.3s ease;
}

.file-upload-message.has-file {
    color: #2c3e50;
    background: rgba(52, 152, 219, 0.1);
    padding: 10px;
    border-radius: 4px;
}

.file-upload-message i {
    font-size: 24px;
    margin-bottom: 10px;
    display: block;
}

.file-size {
    font-size: 12px;
    color: #7f8c8d;
    margin-top: 5px;
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

/* Blog Location Toggle Styles */
.blog-location-toggle {
    margin: 25px 0;
}

.location-label {
    display: block;
    margin-bottom: 10px;
    color: #2c3e50;
    font-weight: 500;
}

.location-hint {
    margin-top: 8px;
    font-size: 12px;
    color: #7f8c8d;
}

.location-btn {
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

.location-btn.main {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
    box-shadow: 0 2px 4px rgba(52, 152, 219, 0.2);
}

.location-btn.regular {
    background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    color: white;
    box-shadow: 0 2px 4px rgba(127, 140, 141, 0.2);
}

.location-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.location-btn:active {
    transform: translateY(1px);
}

.location-text {
    position: relative;
    z-index: 1;
}
</style>

<?php include "footer.php"; ?>
</body>
</html>
