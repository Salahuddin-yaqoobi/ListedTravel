<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

include "config.php";

// Fetch all banners
$sql = "SELECT * FROM banner ORDER BY banner_id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Banners - Listed Travel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
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
                <h1>All Banners</h1>
                <a href="banner.php" class="btn-add">
                    <i class="fa fa-plus"></i> Add New Banner
                </a>
            </div>

            <div class="banner-grid">
                <?php 
                if(mysqli_num_rows($result) > 0) {
                    while($banner = mysqli_fetch_assoc($result)) { 
                ?>
                    <div class="banner-card">
                        <div class="banner-preview">
                            <div class="banner-image" style="background-image: url('uploads/<?php echo $banner['banner_img']; ?>'); opacity: 1;">
                                <div class="banner-content" style="text-align: <?php echo $banner['title_align']; ?>; background: transparent;">
                                    <h2 style="color: <?php echo $banner['banner_title_color']; ?>"><?php echo $banner['banner_title']; ?></h2>
                                    <h3 style="color: <?php echo $banner['banner_header_color']; ?>"><?php echo $banner['banner_header']; ?></h3>
                                    <p style="color: <?php echo $banner['banner_subtitle_color']; ?>"><?php echo $banner['banner_subtitle']; ?></p>
                                    <div style="text-align: <?php echo $banner['button_align']; ?>">
                                        <button style="background: <?php echo $banner['banner_button_color']; ?>; color: white; border: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">
                                            <?php echo $banner['banner_button']; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner-actions">
                            <label class="switch">
                                <input type="checkbox" 
                                       <?php echo ($banner['banner_status'] == 'main') ? 'checked' : ''; ?>
                                       onchange="toggleBannerStatus(<?php echo $banner['banner_id']; ?>, this)">
                                <span class="slider round"></span>
                            </label>
                            <div class="action-buttons">
                                <button onclick="location.href='update-banner.php?id=<?php echo $banner['banner_id']; ?>'" class="btn-update">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button onclick="deleteBanner(<?php echo $banner['banner_id']; ?>)" class="btn-delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                } else {
                    echo "<p class='no-banners'>No banners found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<style>
/* Use the same styles from banner.php for sidebar and layout */
.dashboard-container {
    display: flex;
    min-height: 100vh;
    background: #f8f9fa;
}

.sidebar {
    width: 220px;
    background: #2c3e50;
    color: #fff;
    position: fixed;
    height: 100vh;
    overflow-y: auto;
    z-index: 1000;
}

/* Add these new styles for the banner grid */
.banner-grid {
    display: block;
    padding: 20px 0;
}

.banner-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.banner-preview {
    height: 300px;
    position: relative;
    overflow: hidden;
}

.banner-image {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    position: relative;
}

.banner-content {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.banner-content h2,
.banner-content h3,
.banner-content p {
    margin: 10px 0;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
}

.banner-content button {
    color: white !important;
    display: inline-block !important;
    width: auto !important;
    min-width: 120px;
    max-width: 200px;
    margin: 0 auto;
    padding: 10px 20px !important;
    border-radius: 5px !important;
    border: none !important;
    cursor: pointer;
    font-size: 14px;
    text-align: center;
}

/* Update button container alignment */
.banner-content div[style*="text-align"] {
    width: 100%;
    margin-top: 10px;
}

.banner-content div[style*="text-align: left"] button {
    margin: 0;
}

.banner-content div[style*="text-align: right"] button {
    margin: 0 0 0 auto;
}

.banner-content div[style*="text-align: center"] button {
    margin: 0 auto;
}

.banner-actions {
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #eee;
}

/* Switch styles */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #f39c12;
}

input:checked + .slider:before {
    transform: translateX(26px);
}

.btn-update, .btn-delete {
    border: none;
    padding: 8px;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 10px;
}

.btn-update {
    background: #f39c12;
    color: white;
}

.btn-delete {
    background: #e74c3c;
    color: white;
}

.btn-add {
    background: #2ecc71;
    color: white;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.main-content {
    flex: 1;
    margin-left: 220px;
    padding: 20px;
}

/* Copy other relevant styles from banner.php */
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
</style>

<script>
function toggleBannerStatus(bannerId, checkbox) {
    const isMain = checkbox.checked;
    
    fetch('update_banner_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `banner_id=${bannerId}&status=${isMain ? 'main' : 'regular'}`
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            Swal.fire({
                title: 'Success!',
                text: isMain ? 'Banner set as main' : 'Banner set as regular',
                icon: 'success',
                confirmButtonColor: '#f39c12'
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: data.message || 'Failed to update banner status',
                icon: 'error',
                confirmButtonColor: '#f39c12'
            });
            checkbox.checked = !checkbox.checked; // Revert the checkbox state
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Error!',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonColor: '#f39c12'
        });
        checkbox.checked = !checkbox.checked; // Revert the checkbox state
    });
}

function deleteBanner(bannerId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('delete_banner.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `banner_id=${bannerId}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    Swal.fire('Deleted!', 'Banner has been deleted.', 'success')
                    .then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Error!', 'Failed to delete banner.', 'error');
                }
            });
        }
    });
}
</script>

</body>
</html>
