<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";
session_start();

if(!isset($_SESSION['username'])){
    header("Location: " . APP_URL . "/admin/");
    exit();
}

// Get blog data for editing
if(isset($_GET['id'])) {
    $blog_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM blogs WHERE blog_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $blog_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $blog = mysqli_fetch_assoc($result);

    if(!$blog) {
        header("Location: all-blogs.php");
        exit();
    }
}

// Handle form submission
if(isset($_POST['submit'])) {
    $blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);
    $title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $description = mysqli_real_escape_string($conn, $_POST['blog_description']);
    $blog_location = mysqli_real_escape_string($conn, $_POST['blog_location']);
    $old_image = $_POST['old_image'];

    // Check if new location is main and old location was not main
    if($blog_location === 'main' && $blog['blog_location'] !== 'main') {
        $count_sql = "SELECT COUNT(*) as count FROM blogs WHERE blog_location = 'main'";
        $count_result = mysqli_query($conn, $count_sql);
        $row = mysqli_fetch_assoc($count_result);
        
        if($row['count'] >= 3) {
            echo "<script>
                Swal.fire({
                    title: 'Limit Reached!',
                    text: 'Maximum of 3 blogs can be displayed on main page. Please set as regular page.',
                    icon: 'warning',
                    confirmButtonColor: '#3498db'
                }).then(() => {
                    const locationButton = document.getElementById('locationButton');
                    if(locationButton.classList.contains('main')) {
                        toggleLocation(locationButton);
                    }
                });
            </script>";
            return;
        }
    }

    if(isset($_FILES['blog_img']) && !empty($_FILES['blog_img']['name'])) {
        // New image is uploaded
        $file_name = $_FILES['blog_img']['name'];
        $file_size = $_FILES['blog_img']['size'];
        $file_tmp = $_FILES['blog_img']['tmp_name'];
        $file_type = $_FILES['blog_img']['type'];
        $tmp = explode('.', $file_name);
        $file_ext = strtolower(end($tmp));
        $extensions = array("jpeg", "jpg", "png", "gif", "webp");

        if(in_array($file_ext, $extensions) && $file_size < 2097152) {
            // Delete old image
            if(file_exists("uploads/" . $old_image)) {
                unlink("uploads/" . $old_image);
            }

            // Upload new image
            move_uploaded_file($file_tmp, "uploads/" . $file_name);

            // Update database with new image
            $sql = "UPDATE blogs SET blog_title=?, blog_description=?, blog_location=?, blog_img=? WHERE blog_id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssi", $title, $description, $blog_location, $file_name, $blog_id);
        }
    } else {
        // No new image, update without changing image
        $sql = "UPDATE blogs SET blog_title=?, blog_description=?, blog_location=? WHERE blog_id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $title, $description, $blog_location, $blog_id);
    }

    if(mysqli_stmt_execute($stmt)) {
        header("Location: all-blogs.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog - Listed Transport</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
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
                <h1>Update Blog</h1>
            </div>
            
            <!-- Form -->
            <form action="" method="POST" enctype="multipart/form-data" class="post-form">
                <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>">
                <input type="hidden" name="old_image" value="<?php echo $blog['blog_img']; ?>">
                
                <div class="form-group">
                    <label for="blog_title">Title</label>
                    <input type="text" name="blog_title" class="form-control" value="<?php echo $blog['blog_title']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="blog_description">Description</label>
                    <textarea name="blog_description" class="form-control" rows="5" required><?php echo $blog['blog_description']; ?></textarea>
                </div>
                
                <div class="form-group blog-location-toggle">
                    <label class="location-label">Blog Location</label>
                    <div class="toggle-container">
                        <button type="button" id="locationButton" 
                                class="location-btn <?php echo $blog['blog_location']; ?>" 
                                onclick="toggleLocation(this)">
                            <span class="location-text"><?php echo ucfirst($blog['blog_location']); ?> Page</span>
                            <input type="hidden" name="blog_location" id="blog_location" 
                                   value="<?php echo $blog['blog_location']; ?>">
                        </button>
                    </div>
                    <p class="location-hint">Toggle to set blog visibility on main page</p>
                </div>
                
                <div class="form-group">
                    <label for="blog_img">Blog Image</label>
                    <div class="current-image">
                        <img src="uploads/<?php echo $blog['blog_img']; ?>" alt="Current Blog Image" 
                             style="max-width: 200px; margin-bottom: 10px;">
                        <p>Current Image: <?php echo $blog['blog_img']; ?></p>
                    </div>
                    <div class="file-upload-wrapper">
                        <input type="file" name="blog_img" id="blog_img">
                        <div class="file-upload-message">
                            <i class="fa fa-cloud-upload"></i>
                            <span>Choose a new file or drag it here</span>
                        </div>
                    </div>
                </div>

                <div class="form-actions" style="display:flex; flex-direction:row; justify-content:space-between;">
                    <a href="all-blogs.php" class="back-btn">
                        <i class="fa fa-arrow-left"></i> Back to All Blogs
                    </a>
                    <button type="submit" name="submit" class="btn-submit">
                        <i class="fa fa-save"></i> Update Blog
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// File upload preview
document.getElementById('blog_img').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const message = document.querySelector('.file-upload-message span');
        message.textContent = file.name;
    }
});

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
</script>

<!-- Add the CSS from add-blog.php -->
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

/* Location Toggle Styles */
.blog-location-toggle {
    margin: 25px 0;
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
    min-width: 120px;
}

.location-btn.main {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
}

.location-btn.regular {
    background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    color: white;
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

.current-image {
    margin-bottom: 20px;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 4px;
}

/* Action Buttons */
.form-actions {
    margin-top: 30px;
}

.back-btn {
    background: #f8f9fa;
    color: #2c3e50;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-submit {
    background: #3498db;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .sidebar {
        width: 180px;
    }
    .main-content {
        margin-left: 180px;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 50px;
    }
    .sidebar-nav a span {
        display: none;
    }
    .main-content {
        margin-left: 50px;
    }
}
</style>

<?php include "footer.php"; ?>
</body>
</html>
