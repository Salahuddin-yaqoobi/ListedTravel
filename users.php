<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

// Handle form submission
if(isset($_POST['submit'])) {
    include "config.php";
    
    $username = $_SESSION['username'];
    $first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Update query
    $sql = "UPDATE user SET 
            first_name = '$first_name',
            last_name = '$last_name',
            email = '$email',
            phone = '$phone',
            address = '$address'
            WHERE username = '$username'";

    if(mysqli_query($conn, $sql)) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Profile updated successfully!',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3498db'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'users.php';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Error updating profile: " . mysqli_error($conn) . "',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#e74c3c'
            });
        </script>";
    }
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
    <!-- SweetAlert2 CSS -->
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
                <h1>User Profile</h1>
            </div>
            
            <?php
            include "config.php";
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            
            if($row = mysqli_fetch_assoc($result)) {
            ?>
            
            <!-- User Profile Form -->
            <div class="profile-container">
                <div class="profile-header">
                   
                    <div class="profile-info">
                        <h2><?php echo $row['username']; ?></h2>
                        <p class="role-badge"><?php echo $row['role'] == 1 ? 'Administrator' : 'User'; ?></p>
                    </div>
                </div>

                <form class="profile-form" method="POST" action="">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i>
                                <input type="text" id="username" value="<?php echo $row['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <i class="fa fa-envelope"></i>
                                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <div class="input-group">
                                <i class="fa fa-user-circle"></i>
                                <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <div class="input-group">
                                <i class="fa fa-user-circle"></i>
                                <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <div class="input-group">
                            <i class="fa fa-phone"></i>
                            <input type="tel" name="phone" id="phone" value="<?php echo $row['phone']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <div class="input-group">
                            <i class="fa fa-map-marker"></i>
                            <textarea name="address" id="address" rows="3" readonly><?php echo $row['address']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-edit" onclick="enableEditing()">
                            <i class="fa fa-edit"></i> Edit Profile
                        </button>
                        <button type="submit" name="submit" class="btn-save" style="display: none;">
                            <i class="fa fa-save"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>

            <?php } else { ?>
                <div class="alert alert-danger">User not found!</div>
            <?php } ?>
        </div>
    </div>
</div>

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

/* Profile Container */
.profile-container {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 30px;
    max-width: 800px;
    margin: 0 auto;
}

/* Profile Header */
.profile-header {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f2f5;
}

.profile-avatar {
    width: 80px;
    height: 80px;
    background: #f0f2f5;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 20px;
}

.profile-avatar i {
    font-size: 40px;
    color: #2c3e50;
}

.profile-info h2 {
    margin: 0;
    color: #2c3e50;
    font-size: 24px;
    font-weight: 600;
}

.role-badge {
    display: inline-block;
    background: #3498db;
    color: #fff;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    margin-top: 8px;
}

/* Form Layout */
.profile-form {
    margin-top: 20px;
}

.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.form-row .form-group {
    flex: 1;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
    font-size: 14px;
}

.input-group {
    position: relative;
    display: flex;
    align-items: center;
}

.input-group i {
    position: absolute;
    left: 12px;
    color: #7f8c8d;
    font-size: 16px;
}

.input-group input,
.input-group textarea {
    width: 100%;
    padding: 12px 12px 12px 40px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s;
    background: #f8f9fa;
}

.input-group input:read-only,
.input-group textarea:read-only {
    background: #f8f9fa;
    cursor: not-allowed;
}

.input-group input:focus,
.input-group textarea:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    background: #fff;
}

.input-group textarea {
    resize: vertical;
    min-height: 100px;
}

/* Buttons */
.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.btn-edit,
.btn-save {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s;
}

.btn-edit {
    background: #3498db;
    color: #fff;
}

.btn-save {
    background: #2ecc71;
    color: #fff;
}

.btn-edit:hover {
    background: #2980b9;
    transform: translateY(-2px);
}

.btn-save:hover {
    background: #27ae60;
    transform: translateY(-2px);
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

    .profile-container {
        padding: 20px;
    }

    .form-row {
        flex-direction: column;
        gap: 0;
    }

    .profile-header {
        flex-direction: column;
        text-align: center;
    }

    .profile-avatar {
        margin: 0 0 15px 0;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-edit,
    .btn-save {
        width: 100%;
        justify-content: center;
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
}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
function enableEditing() {
    // Get all input and textarea elements except username
    const inputs = document.querySelectorAll('input[name="email"], input[name="firstname"], input[name="lastname"], input[name="phone"], textarea[name="address"]');
    const editBtn = document.querySelector('.btn-edit');
    const saveBtn = document.querySelector('.btn-save');

    // Remove readonly attribute from all fields
    inputs.forEach(input => {
        input.removeAttribute('readonly');
        // Add a visual indicator that the field is editable
        input.style.backgroundColor = '#fff';
        input.style.borderColor = '#3498db';
    });

    // Show save button and hide edit button
    editBtn.style.display = 'none';
    saveBtn.style.display = 'inline-flex';
}

// Add event listener to form to handle submission
document.querySelector('.profile-form').addEventListener('submit', function(e) {
    // Validate email format
    const email = document.querySelector('input[name="email"]');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
        e.preventDefault();
        Swal.fire({
            title: 'Invalid Email!',
            text: 'Please enter a valid email address',
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#e74c3c'
        });
        return;
    }

    // Validate phone number (optional)
    const phone = document.querySelector('input[name="phone"]');
    if (phone.value && !/^[0-9+\-\s()]{10,}$/.test(phone.value)) {
        e.preventDefault();
        Swal.fire({
            title: 'Invalid Phone Number!',
            text: 'Please enter a valid phone number',
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#e74c3c'
        });
        return;
    }
});
</script>

<?php include "footer.php"; ?>
</body>
</html>
