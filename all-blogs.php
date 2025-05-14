<?php 
session_start();
include "config.php";

if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: " . APP_URL . "/admin/");
    exit();
}

$limit = 10;

if (isset($_GET['page'])) {  
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM blogs ORDER BY blog_id DESC LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs - Listed Travel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- SweetAlert2 -->
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
        <!-- Content Area -->
        <div class="content-area">
            <div class="page-header">
                <h1>All Blogs</h1>
                <a href="add-blog.php" class="add-new-btn"><i class="fa fa-plus"></i> Add New Blog</a>
            </div>

            <div class="posts-table">
                <table>
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            $serialNo = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $serialNo++; ?></td>
                            <td><?php echo $row['blog_title']; ?></td>
                            <td><?php echo substr($row['blog_description'], 0, 100) . '...'; ?></td>
                            <td>
                                <span class="location-badge <?php echo $row['blog_location']; ?>">
                                    <?php echo ucfirst($row['blog_location']); ?>
                                </span>
                            </td>
                            <td><?php echo date('d M Y', strtotime($row['blog_date'])); ?></td>
                            <td class="image-cell">
                                <img src="uploads/<?php echo $row['blog_img']; ?>" alt="Blog Image">
                            </td>
                            <td class="actions">
                                <a href='update-blog.php?id=<?php echo $row['blog_id']; ?>' class="edit-btn">
                                    <i class='fa fa-edit'></i>
                                </a>
                                <button class="delete-btn" onclick="deleteBlog(<?php echo $row['blog_id']; ?>)">
                                    <i class='fa fa-trash-o'></i>
                                </button>
                            </td>
                        </tr>
                    <?php }} ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php
                $sql1 = "SELECT * FROM blogs";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
                if (mysqli_num_rows($result1) > 0) {
                    $total_records = mysqli_num_rows($result1);
                    $total_page = ceil($total_records / $limit);

                    echo "<div class='pagination'>";
                    if ($page > 1) {
                        echo '<a href="all-blogs.php?page=' . ($page - 1) . '" class="page-btn"><i class="fa fa-chevron-left"></i> Prev</a>';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        $active = ($i == $page) ? "active" : "";
                        echo '<a href="all-blogs.php?page=' . $i . '" class="page-btn ' . $active . '">' . $i . '</a>';
                    }

                    if ($total_page > $page) {
                        echo '<a href="all-blogs.php?page=' . ($page + 1) . '" class="page-btn">Next <i class="fa fa-chevron-right"></i></a>';
                    }
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>

<script>
function deleteBlog(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send delete request
            fetch('delete-blog.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Blog has been deleted.',
                        icon: 'success',
                        confirmButtonColor: '#3498db'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonColor: '#e74c3c'
                    });
                }
            });
        }
    });
}
</script>

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
    padding: 15px;
    transition: all 0.3s ease;
}

/* Content Area */
.content-area {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 15px;
}

/* Page Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.page-header h1 {
    font-size: 24px;
    margin: 0;
    color: #2c3e50;
}

.add-new-btn {
    background: #3498db;
    color: #fff;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.add-new-btn:hover {
    background: #2980b9;
    color: #fff;
    text-decoration: none;
}

/* Table Styles */
.posts-table {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

th {
    background: #f8f9fa;
    color: #2c3e50;
    font-weight: 600;
    font-size: 14px;
}

td {
    font-size: 14px;
    color: #444;
}

.image-cell img {
    width: 80px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
}

/* Action Buttons */
.actions {
    display: flex;
    gap: 8px;
}

.edit-btn, .delete-btn {
    padding: 6px 10px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.edit-btn {
    background: #3498db;
    color: white;
}

.delete-btn {
    background: #e74c3c;
    color: white;
}

.edit-btn:hover, .delete-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Location Badge */
.location-badge {
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 600;
    text-transform: capitalize;
    display: inline-block;
    text-align: center;
    min-width: 80px;
}

.location-badge.main {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
}

.location-badge.regular {
    background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    color: white;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 5px;
    margin-top: 20px;
}

.page-btn {
    padding: 8px 12px;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    color: #3498db;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
}

.page-btn:hover {
    background: #f8f9fa;
    text-decoration: none;
}

.page-btn.active {
    background: #3498db;
    color: #fff;
    border-color: #3498db;
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
    
    .page-header {
        flex-direction: column;
        gap: 10px;
    }
    
    .add-new-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .content-area {
        padding: 10px;
    }
    
    th, td {
        padding: 8px;
    }
    
    .image-cell img {
        width: 60px;
        height: 45px;
    }
    
    .sidebar {
        width: 40px;
    }
    
    .sidebar-header {
        padding: 8px 5px;
    }
    
    .sidebar-header .logo {
        max-width: 30px;
    }
}
</style>

<?php include "footer.php"; ?>
</body>
</html>
