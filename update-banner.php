<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

include "config.php";

// Add save banner code here
if(isset($_POST['submit'])) {
    // Add error logging
    error_log("Form submitted with banner_id: " . $_POST['banner_id']);
    
    $banner_id = mysqli_real_escape_string($conn, $_POST['banner_id']);
    $banner_title = mysqli_real_escape_string($conn, $_POST['banner_title']);
    $banner_header = mysqli_real_escape_string($conn, $_POST['banner_header']);
    $banner_subtitle = mysqli_real_escape_string($conn, $_POST['banner_subtitle']);
    $banner_button = mysqli_real_escape_string($conn, $_POST['banner_button']);
    $old_image = $_POST['old_image'];
    $title_align = mysqli_real_escape_string($conn, $_POST['title_align']);
    $header_align = mysqli_real_escape_string($conn, $_POST['header_align']);
    $subtitle_align = mysqli_real_escape_string($conn, $_POST['subtitle_align']);
    $button_align = mysqli_real_escape_string($conn, $_POST['button_align']);
    $banner_title_color = mysqli_real_escape_string($conn, $_POST['banner_title_color']);
    $banner_header_color = mysqli_real_escape_string($conn, $_POST['banner_header_color']);
    $banner_subtitle_color = mysqli_real_escape_string($conn, $_POST['banner_subtitle_color']);
    $banner_button_color = mysqli_real_escape_string($conn, $_POST['banner_button_color']);
    $banner_img = $old_image;
    
    if(isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] == 0) {
        $file_name = $_FILES['banner_img']['name'];
        $file_tmp = $_FILES['banner_img']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $banner_img = uniqid('banner_') . '.' . $file_ext;
        
        if(move_uploaded_file($file_tmp, "uploads/" . $banner_img)) {
            if(!empty($old_image) && file_exists("uploads/" . $old_image)) {
                unlink("uploads/" . $old_image);
            }
        }
    }

    $sql = "UPDATE banner SET 
            banner_title = '$banner_title',
            banner_header = '$banner_header',
            banner_subtitle = '$banner_subtitle',
            banner_button = '$banner_button',
            banner_img = '$banner_img',
            title_align = '$title_align',
            header_align = '$header_align',
            subtitle_align = '$subtitle_align',
            button_align = '$button_align',
            banner_title_color = '$banner_title_color',
            banner_header_color = '$banner_header_color',
            banner_subtitle_color = '$banner_subtitle_color',
            banner_button_color = '$banner_button_color'
            WHERE banner_id = '$banner_id'";

    error_log("Executing SQL: " . $sql);

    $query_result = mysqli_query($conn, $sql);
    error_log("Query result: " . ($query_result ? "success" : "failed - " . mysqli_error($conn)));

    if($query_result) {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            header('Content-Type: application/json');
            error_log("Sending AJAX success response");
            echo json_encode(['success' => true, 'message' => 'Banner updated successfully']);
            exit();
        }
        $_SESSION['banner_success'] = "Banner updated successfully";
        header("Location: all-banners.php");
        exit();
    } else {
        error_log("MySQL Error: " . mysqli_error($conn));
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            header('Content-Type: application/json');
            error_log("Sending AJAX error response");
            echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
            exit();
        }
        $_SESSION['banner_error'] = "Error updating banner: " . mysqli_error($conn);
        header("Location: update-banner.php?id=" . $banner_id);
        exit();
    }
}

// Initialize default banner values
$banner = array(
    'banner_id' => '',
    'banner_title' => '',
    'banner_header' => '',
    'banner_subtitle' => '',
    'banner_button' => '',
    'banner_img' => '',
    'title_align' => 'center',
    'header_align' => 'center',
    'subtitle_align' => 'center',
    'button_align' => 'center',
    'banner_title_color' => '#000000',
    'banner_header_color' => '#000000',
    'banner_subtitle_color' => '#000000',
    'banner_button_color' => '#3498db'
);

// Fetch banner data based on ID
if(isset($_GET['id'])) {
    $banner_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM banner WHERE banner_id = '$banner_id'";
    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0) {
        $fetched_banner = mysqli_fetch_assoc($result);
        // Merge fetched data with defaults to ensure all keys exist
        $banner = array_merge($banner, $fetched_banner);
    } else {
        // Redirect if banner not found
        $_SESSION['banner_error'] = "Banner not found";
        header("Location: all-banners.php");
        exit();
    }
} else {
    // Redirect if no ID provided
    header("Location: all-banners.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Banner - Listed Travel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Color Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    }

    /* Content Area */
    .content-area {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 20px;
    }

    /* Banner Preview */
    .banner-preview {
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        padding: 0;
        margin-bottom: 20px;
        height: 300px;
        overflow: hidden;
        position: relative;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #2c3e50;
        font-weight: 500;
    }

    .input-with-color {
        display: flex;
        align-items: center;
        gap: 10px;
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

    .color-picker {
        width: 30px;
        height: 30px;
        border-radius: 4px;
        cursor: pointer;
        border: 1px solid #dee2e6;
    }

    .alignment-select {
        width: auto !important;
        min-width: 100px;
    }

    /* File Upload */
    .file-upload-wrapper {
        border: 2px dashed #dee2e6;
        padding: 20px;
        text-align: center;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-wrapper:hover {
        border-color: #3498db;
    }

    .file-upload-message {
        color: #6c757d;
    }

    /* Action Buttons */
    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .btn-back, .btn-save {
        padding: 10px 20px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .btn-back {
        background: #f8f9fa;
        color: #2c3e50;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #e9ecef;
    }

    .btn-save {
        background: #f39c12;
        color: white;
    }

    .btn-save:hover {
        background: #e67e22;
    }

    /* Preview Content */
    #textContent {
        background-color: transparent !important;
        padding: 20px;
        border-radius: 8px;
    }

    #previewButton {
        display: inline-block !important;
        min-width: 120px;
        max-width: 200px;
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
        .form-actions {
            flex-direction: column;
            gap: 10px;
        }
        .btn-back, .btn-save {
            width: 100%;
            justify-content: center;
        }
    }
    </style>
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
                <h1>Update Banner</h1>
            </div>

            <!-- Preview Area -->
            <div class="banner-preview">
                <div id="previewContent" style="text-align: center; position: relative; min-height: 300px;">
                    <!-- Background Image Container -->
                    <div id="backgroundImageContainer" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
                        <?php if(!empty($banner['banner_img'])): ?>
                            <img src="uploads/<?php echo htmlspecialchars($banner['banner_img']); ?>" alt="Banner" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                    <!-- Content Container -->
                    <div id="textContent" style="position: relative; z-index: 2; padding: 20px; background-color: transparent;">
                        <h2 id="previewTitle" style="color: <?php echo htmlspecialchars($banner['banner_title_color']); ?>; text-align: <?php echo htmlspecialchars($banner['title_align']); ?>;">
                            <?php echo htmlspecialchars($banner['banner_title']); ?>
                        </h2>
                        <h3 id="previewHeader" style="color: <?php echo htmlspecialchars($banner['banner_header_color']); ?>; text-align: <?php echo htmlspecialchars($banner['header_align']); ?>;">
                            <?php echo htmlspecialchars($banner['banner_header']); ?>
                        </h3>
                        <p id="previewSubtitle" style="color: <?php echo htmlspecialchars($banner['banner_subtitle_color']); ?>; text-align: <?php echo htmlspecialchars($banner['subtitle_align']); ?>;">
                            <?php echo htmlspecialchars($banner['banner_subtitle']); ?>
                        </p>
                        <button id="previewButton" style="
                            background-color: <?php echo htmlspecialchars($banner['banner_button_color']); ?>;
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            display: inline-block;
                            margin: <?php echo $banner['button_align'] == 'center' ? 'auto' : ($banner['button_align'] == 'right' ? '0 0 0 auto' : '0 auto 0 0'); ?>;
                        "><?php echo htmlspecialchars($banner['banner_button']); ?></button>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="update-banner.php" method="POST" enctype="multipart/form-data" class="banner-form">
                <input type="hidden" name="banner_id" value="<?php echo $banner['banner_id']; ?>">
                <input type="hidden" name="old_image" value="<?php echo $banner['banner_img']; ?>">

                <!-- Title Section -->
                <div class="form-group">
                    <label>Title</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_title" id="bannerTitle" class="form-control" 
                               value="<?php echo htmlspecialchars($banner['banner_title']); ?>" oninput="updatePreview('title')">
                        <input type="color" name="banner_title_color" id="titleColor" 
                               value="<?php echo $banner['banner_title_color']; ?>" onchange="updatePreview('title')">
                        <select class="form-control alignment-select" id="titleAlign" name="title_align" 
                                onchange="updatePreview('title')">
                            <option value="left" <?php echo ($banner['title_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['title_align'] == 'center') ? 'selected' : ''; ?>>Center</option>
                            <option value="right" <?php echo ($banner['title_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <!-- Header Section -->
                <div class="form-group">
                    <label>Header</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_header" id="bannerHeader" class="form-control" 
                               value="<?php echo htmlspecialchars($banner['banner_header']); ?>" oninput="updatePreview('header')">
                        <input type="color" name="banner_header_color" id="headerColor" 
                               value="<?php echo $banner['banner_header_color']; ?>" onchange="updatePreview('header')">
                        <select class="form-control alignment-select" id="headerAlign" name="header_align" 
                                onchange="updatePreview('header')">
                            <option value="left" <?php echo ($banner['header_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['header_align'] == 'center') ? 'selected' : ''; ?>>Center</option>
                            <option value="right" <?php echo ($banner['header_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <!-- Subtitle Section -->
                <div class="form-group">
                    <label>Subtitle</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_subtitle" id="bannerSubtitle" class="form-control" 
                               value="<?php echo htmlspecialchars($banner['banner_subtitle']); ?>" oninput="updatePreview('subtitle')">
                        <input type="color" name="banner_subtitle_color" id="subtitleColor" 
                               value="<?php echo $banner['banner_subtitle_color']; ?>" onchange="updatePreview('subtitle')">
                        <select class="form-control alignment-select" id="subtitleAlign" name="subtitle_align" 
                                onchange="updatePreview('subtitle')">
                            <option value="left" <?php echo ($banner['subtitle_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['subtitle_align'] == 'center') ? 'selected' : ''; ?>>Center</option>
                            <option value="right" <?php echo ($banner['subtitle_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <!-- Button Text Section -->
                <div class="form-group">
                    <label>Button Text</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_button" id="bannerButton" class="form-control" 
                               value="<?php echo htmlspecialchars($banner['banner_button']); ?>" oninput="updatePreview('button')">
                        <input type="color" name="banner_button_color" id="buttonColor" 
                               value="<?php echo $banner['banner_button_color']; ?>" onchange="updatePreview('button')">
                        <select class="form-control alignment-select" id="buttonAlign" name="button_align" 
                                onchange="updatePreview('button')">
                            <option value="left" <?php echo ($banner['button_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['button_align'] == 'center') ? 'selected' : ''; ?>>Center</option>
                            <option value="right" <?php echo ($banner['button_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="form-group">
                    <label>Banner Image</label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="banner_img" id="bannerImage" accept="image/*" 
                               onchange="previewImage(this)">
                        <div class="file-upload-message">
                            <i class="fa fa-cloud-upload"></i>
                            <span>Choose a file or drag it here</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <a href="all-banners.php" class="btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="submit" class="btn-save">
                        <i class="fa fa-save"></i> Update Banner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Copy all styles from banner.php -->
<style>
/* Copy all styles from banner.php */
</style>

<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
<script>
    
// Replace the color picker initialization code
const createPickr = (element, defaultColor, targetInput, previewType) => {
    const pickerElement = document.querySelector(element);
    if (!pickerElement) return; // Skip if element doesn't exist
    
    return Pickr.create({
        el: pickerElement,
        theme: 'classic',
        default: defaultColor,
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: true,
                rgba: true,
                hsla: true,
                hsva: true,
                cmyk: true,
                input: true,
                clear: true,
                save: true
            }
        }
    }).on('change', (color) => {
        const hexColor = color.toHEXA().toString();
        document.getElementById(targetInput).value = hexColor;
        updatePreview(previewType);
    });
};

// Replace only the form submission code
document.querySelector('.banner-form').onsubmit = function(e) {
    e.preventDefault();
    
    if (!validateForm()) {
        return false;
    }

    // Get all form data
    const formData = new FormData(this);
    formData.append('submit', '1');

    // Send data using fetch
    fetch('update-banner.php', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: data.message || 'Banner updated successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'all-banners.php';
                }
            });
        } else {
            throw new Error(data.message || 'Failed to update banner');
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Error!',
            text: error.message || 'Failed to update banner',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });

    return false;
};

// Add this code to handle the color picker elements
document.addEventListener('DOMContentLoaded', () => {
    // Add color picker divs if they don't exist
    const colorInputs = ['title', 'header', 'subtitle', 'button'];
    colorInputs.forEach(type => {
        const inputId = `${type}Color`;
        const pickerId = `${type}ColorPicker`;
        
        // Create picker div if it doesn't exist
        if (!document.getElementById(pickerId)) {
            const pickerDiv = document.createElement('div');
            pickerDiv.id = pickerId;
            pickerDiv.className = 'color-picker';
            document.getElementById(inputId).parentNode.insertBefore(pickerDiv, document.getElementById(inputId).nextSibling);
        }
    });

    // Initialize color pickers
    createPickr('#titleColorPicker', document.getElementById('titleColor').value, 'titleColor', 'title');
    createPickr('#headerColorPicker', document.getElementById('headerColor').value, 'headerColor', 'header');
    createPickr('#subtitleColorPicker', document.getElementById('subtitleColor').value, 'subtitleColor', 'subtitle');
    createPickr('#buttonColorPicker', document.getElementById('buttonColor').value, 'buttonColor', 'button');
});

// Update preview function
function updatePreview(type) {
    switch(type) {
        case 'title':
            const titleText = document.getElementById('bannerTitle').value;
            const titleColor = document.getElementById('titleColor').value;
            const titleAlign = document.getElementById('titleAlign').value;
            const previewTitle = document.getElementById('previewTitle');
            previewTitle.textContent = titleText || 'Banner Title';
            previewTitle.style.color = titleColor;
            previewTitle.style.textAlign = titleAlign;
            break;
        case 'header':
            const headerText = document.getElementById('bannerHeader').value;
            const headerColor = document.getElementById('headerColor').value;
            const headerAlign = document.getElementById('headerAlign').value;
            const previewHeader = document.getElementById('previewHeader');
            previewHeader.textContent = headerText || 'Banner Header';
            previewHeader.style.color = headerColor;
            previewHeader.style.textAlign = headerAlign;
            break;
        case 'subtitle':
            const subtitleText = document.getElementById('bannerSubtitle').value;
            const subtitleColor = document.getElementById('subtitleColor').value;
            const subtitleAlign = document.getElementById('subtitleAlign').value;
            const previewSubtitle = document.getElementById('previewSubtitle');
            previewSubtitle.textContent = subtitleText || 'Banner Subtitle';
            previewSubtitle.style.color = subtitleColor;
            previewSubtitle.style.textAlign = subtitleAlign;
            break;
        case 'button':
            const buttonText = document.getElementById('bannerButton').value;
            const buttonColor = document.getElementById('buttonColor').value;
            const buttonAlign = document.getElementById('buttonAlign').value;
            const previewButton = document.getElementById('previewButton');
            previewButton.textContent = buttonText || 'Button Text';
            previewButton.style.backgroundColor = buttonColor;
            previewButton.style.display = 'block';
            previewButton.style.width = 'fit-content';
            
            // Fix button alignment
            if (buttonAlign === 'left') {
                previewButton.style.margin = '0';
                previewButton.parentElement.style.textAlign = 'left';
            } else if (buttonAlign === 'right') {
                previewButton.style.margin = '0 0 0 auto';
                previewButton.parentElement.style.textAlign = 'right';
            } else {
                previewButton.style.margin = '0 auto';
                previewButton.parentElement.style.textAlign = 'center';
            }
            break;
    }
}

// Preview image function
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const container = document.getElementById('backgroundImageContainer');
            container.innerHTML = `<img src="${e.target.result}" alt="Banner" style="width: 100%; height: 100%; object-fit: cover;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Form validation
function validateForm() {
    let isValid = true;
    let errorMessage = '';

    if (!document.getElementById('bannerTitle').value.trim()) {
        errorMessage += 'Banner Title is required\n';
        isValid = false;
    }

    if (!document.getElementById('bannerHeader').value.trim()) {
        errorMessage += 'Banner Header is required\n';
        isValid = false;
    }

    if (!document.getElementById('bannerSubtitle').value.trim()) {
        errorMessage += 'Banner Subtitle is required\n';
        isValid = false;
    }

    if (!document.getElementById('bannerButton').value.trim()) {
        errorMessage += 'Button Text is required\n';
        isValid = false;
    }

    if (!isValid) {
        Swal.fire({
            title: 'Required Fields Missing',
            text: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return false;
    }

    return true;
}

// Add SweetAlert handlers
<?php if(isset($_SESSION['banner_success'])): ?>
Swal.fire({
    title: 'Success!',
    text: '<?php echo $_SESSION['banner_success']; ?>',
    icon: 'success',
    confirmButtonText: 'OK'
}).then((result) => {
    window.location.href = 'all-banners.php';
});
<?php unset($_SESSION['banner_success']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['banner_error'])): ?>
Swal.fire({
    title: 'Error!',
    text: '<?php echo $_SESSION['banner_error']; ?>',
    icon: 'error',
    confirmButtonText: 'OK'
});
<?php unset($_SESSION['banner_error']); ?>
<?php endif; ?>
</script>
</body>
</html>
