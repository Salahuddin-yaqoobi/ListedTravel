<?php 
include "config.php";

session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: " . APP_URL . "/admin/");

    exit();
}


// Initialize empty banner array instead of fetching from database
$banner = array(
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Settings - Listed Transport</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Color Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!-- Dashboard Layout -->
<div class="dashboard-container">
    <!-- Copy the sidebar from all-posts.php -->
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
                <h1>Banner Settings</h1>
            </div>

            <!-- Preview Area -->
            <div class="banner-preview">
                <div id="previewContent" style="text-align: center; position: relative; min-height: 300px;">
                    <!-- Background Image Container -->
                    <div id="backgroundImageContainer" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
                    </div>
                    <!-- Content Container -->
                    <div id="textContent" style="position: relative; z-index: 2; padding: 20px; background-color: transparent;">
                        <h2 id="previewTitle" style="color: #000000; text-align: center;">
                            Banner Title
                        </h2>
                        <h3 id="previewHeader" style="color: #000000; text-align: center;">
                            Banner Header
                        </h3>
                        <p id="previewSubtitle" style="color: #000000; text-align: center;">
                            Banner Subtitle
                        </p>
                        <button id="previewButton" style="
                            background: #3498db;
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            display: block;
                            margin: auto;
                        ">Button Text</button>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="save-banner.php" method="POST" enctype="multipart/form-data" class="banner-form">
                <!-- Title Section -->
                <div class="form-group">
                    <label>Title</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_title" id="bannerTitle" class="form-control" 
                               value="" oninput="updatePreview('title')">
                        <div class="color-picker" id="titleColorPicker"></div>
                        <input type="hidden" name="banner_title_color" id="titleColor" 
                               value="<?php echo $banner['banner_title_color'] ?? '#000000'; ?>">
                        <select class="form-control alignment-select" id="titleAlign" name="title_align" onchange="updatePreview('title')" style="width: auto;">
                            <option value="left" <?php echo ($banner['title_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['title_align'] == 'center' || empty($banner['title_align'])) ? 'selected' : ''; ?>>Center</option>
                            <option value="right" <?php echo ($banner['title_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <!-- Header Section -->
                <div class="form-group">
                    <label>Header</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_header" id="bannerHeader" class="form-control" 
                               value="" oninput="updatePreview('header')">
                        <div class="color-picker" id="headerColorPicker"></div>
                        <input type="hidden" name="banner_header_color" id="headerColor" 
                               value="<?php echo $banner['banner_header_color'] ?? '#000000'; ?>">
                        <select class="form-control alignment-select" id="headerAlign" name="header_align" onchange="updatePreview('header')" style="width: auto;">
                            <option value="left" <?php echo ($banner['header_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['header_align'] == 'center' || empty($banner['header_align'])) ? 'selected' : ''; ?>>Center</option>
                            <option value="right" <?php echo ($banner['header_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <!-- Subtitle Section -->
                <div class="form-group">
                    <label>Subtitle</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_subtitle" id="bannerSubtitle" class="form-control" 
                               value="" oninput="updatePreview('subtitle')">
                        <div class="color-picker" id="subtitleColorPicker"></div>
                        <input type="hidden" name="banner_subtitle_color" id="subtitleColor" 
                               value="<?php echo $banner['banner_subtitle_color'] ?? '#000000'; ?>">
                        <select class="form-control alignment-select" id="subtitleAlign" name="subtitle_align" onchange="updatePreview('subtitle')" style="width: auto;">
                            <option value="left" <?php echo ($banner['subtitle_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['subtitle_align'] == 'center' || empty($banner['subtitle_align'])) ? 'selected' : ''; ?>>Center</option>
                            <option value="right" <?php echo ($banner['subtitle_align'] == 'right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <!-- Button Text Section -->
                <div class="form-group">
                    <label>Button Text</label>
                    <div class="input-with-color">
                        <input type="text" name="banner_button" id="bannerButton" class="form-control" 
                               value="" oninput="updatePreview('button')">
                        <div class="color-picker" id="buttonColorPicker"></div>
                        <input type="hidden" name="banner_button_color" id="buttonColor" 
                               value="<?php echo $banner['banner_button_color'] ?? '#3498db'; ?>">
                        <select class="form-control alignment-select" id="buttonAlign" name="button_align" onchange="updatePreview('button')" style="width: auto;">
                            <option value="left" <?php echo ($banner['button_align'] == 'left') ? 'selected' : ''; ?>>Left</option>
                            <option value="center" <?php echo ($banner['button_align'] == 'center' || empty($banner['button_align'])) ? 'selected' : ''; ?>>Center</option>
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
                    <a href="post.php" class="btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="submit" class="btn-save">
                        <i class="fa fa-save"></i> Save
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

/* Sidebar Styles */
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

/* Banner Specific Styles */
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

.input-with-color {
    display: flex;
    align-items: center;
    gap: 10px;
}

.color-picker {
    width: 30px;
    height: 30px;
    border-radius: 4px;
    cursor: pointer;
    border: 1px solid #dee2e6;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.btn-back, .btn-apply, .btn-save {
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
}

.btn-back:hover {
    background: #e9ecef;
}

.btn-apply {
    background: #f39c12;
    color: white;
}

.btn-apply:hover {
    background: #e67e22;
}

.btn-save {
    background: #3498db;
    color: white;
}

.btn-save:hover {
    background: #2980b9;
}

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

.alignment-select {
    width: auto !important;
    min-width: 100px;
}

#textContent {
    background-color: transparent !important;
    padding: 20px;
    border-radius: 8px;
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
    .btn-back, .btn-apply, .btn-save {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
<script>
// Initialize color pickers
const createPickr = (element, defaultColor, targetInput, previewType) => {
    return Pickr.create({
        el: element,
        theme: 'classic',
        default: defaultColor,
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                input: true,
                save: true
            }
        }
    }).on('save', (color) => {
        const hexColor = color.toHEXA().toString();
        document.getElementById(targetInput).value = hexColor;
        updatePreview(previewType);
    });
};

// Initialize all color pickers
document.addEventListener('DOMContentLoaded', () => {
    const colorPickers = [
        { id: '#titleColorPicker', input: 'titleColor', type: 'title', default: '#000000' },
        { id: '#headerColorPicker', input: 'headerColor', type: 'header', default: '#000000' },
        { id: '#subtitleColorPicker', input: 'subtitleColor', type: 'subtitle', default: '#000000' },
        { id: '#buttonColorPicker', input: 'buttonColor', type: 'button', default: '#3498db' }
    ];

    colorPickers.forEach(picker => {
        const element = document.querySelector(picker.id);
        if (element) {
            createPickr(picker.id, picker.default, picker.input, picker.type);
        }
    });

    // Initialize alignment values
    updatePreview('title');
    updatePreview('header');
    updatePreview('subtitle');
    updatePreview('button');
});

// Preview functions
function updatePreview(type) {
    switch(type) {
        case 'title':
            const titleText = document.getElementById('bannerTitle').value;
            const titleColor = document.getElementById('titleColor').value;
            const titleAlign = document.getElementById('titleAlign').value;
            const previewTitle = document.getElementById('previewTitle');
            previewTitle.textContent = titleText;
            previewTitle.style.color = titleColor;
            previewTitle.style.textAlign = titleAlign;
            break;
        case 'header':
            const headerText = document.getElementById('bannerHeader').value;
            const headerColor = document.getElementById('headerColor').value;
            const headerAlign = document.getElementById('headerAlign').value;
            const previewHeader = document.getElementById('previewHeader');
            previewHeader.textContent = headerText;
            previewHeader.style.color = headerColor;
            previewHeader.style.textAlign = headerAlign;
            break;
        case 'subtitle':
            const subtitleText = document.getElementById('bannerSubtitle').value;
            const subtitleColor = document.getElementById('subtitleColor').value;
            const subtitleAlign = document.getElementById('subtitleAlign').value;
            const previewSubtitle = document.getElementById('previewSubtitle');
            previewSubtitle.textContent = subtitleText;
            previewSubtitle.style.color = subtitleColor;
            previewSubtitle.style.textAlign = subtitleAlign;
            break;
        case 'button':
            const buttonText = document.getElementById('bannerButton').value;
            const buttonColor = document.getElementById('buttonColor').value;
            const buttonAlign = document.getElementById('buttonAlign').value;
            const previewButton = document.getElementById('previewButton');
            previewButton.textContent = buttonText;
            previewButton.style.backgroundColor = buttonColor;
            previewButton.style.margin = buttonAlign === 'left' ? '0 auto 0 0' : 
                                       buttonAlign === 'right' ? '0 0 0 auto' : 'auto';
            break;
    }
}

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

function applyChanges() {
    updatePreview('title');
    updatePreview('header');
    updatePreview('subtitle');
    updatePreview('button');
}

<?php if(isset($_SESSION['banner_success'])): ?>
    Swal.fire({
        title: 'Success!',
        text: 'Banner has been saved successfully',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'all-banners.php';
        }
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

// Add this at the bottom of your existing scripts
window.onload = function() {
    // Reset form fields
    document.getElementById('bannerTitle').value = '';
    document.getElementById('bannerHeader').value = '';
    document.getElementById('bannerSubtitle').value = '';
    document.getElementById('bannerButton').value = '';
    
    // Reset preview to default state
    document.getElementById('previewTitle').textContent = 'Banner Title';
    document.getElementById('previewHeader').textContent = 'Banner Header';
    document.getElementById('previewSubtitle').textContent = 'Banner Subtitle';
    document.getElementById('previewButton').textContent = 'Button Text';
    
    // Clear background image
    document.getElementById('backgroundImageContainer').innerHTML = '';
    
    // Reset file input
    document.getElementById('bannerImage').value = '';
};

// Add this new function for form validation
function validateForm() {
    let isValid = true;
    let errorMessage = '';

    const requiredFields = {
        'bannerTitle': 'Banner Title',
        'bannerHeader': 'Banner Header',
        'bannerSubtitle': 'Banner Subtitle',
        'bannerButton': 'Button Text',
        'bannerImage': 'Banner Image'
    };

    for (let [id, label] of Object.entries(requiredFields)) {
        const element = document.getElementById(id);
        if (!element || (id === 'bannerImage' ? !element.files[0] : !element.value.trim())) {
            errorMessage += `${label} is required\n`;
        isValid = false;
    }
    }

    if (!isValid) {
        Swal.fire({
            title: 'Required Fields Missing',
            text: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }

    return isValid;
}

// Replace the form submission code
document.querySelector('.banner-form').onsubmit = function(e) {
    e.preventDefault();
    
    if (!validateForm()) {
        return false;
    }

    // Create FormData object
    const formData = new FormData(this);
    formData.append('submit', '1');

    // Add all color values explicitly
    formData.append('banner_title_color', document.getElementById('titleColor').value);
    formData.append('banner_header_color', document.getElementById('headerColor').value);
    formData.append('banner_subtitle_color', document.getElementById('subtitleColor').value);
    formData.append('banner_button_color', document.getElementById('buttonColor').value);

    // Send using fetch
    fetch('save-banner.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: data.message || 'Banner saved successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'all-banners.php';
            });
        } else {
            throw new Error(data.message || 'Failed to save banner');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: error.message || 'Failed to save banner',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });

    return false;
};
</script>

</body>
</html>
