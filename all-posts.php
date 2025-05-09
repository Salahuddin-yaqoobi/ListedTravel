<?php 
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

include "config.php";
$limit = 10;

if (isset($_GET['page'])) {  
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;

$sql = "SELECT post_id, title, description, post_date, category, post_img, price, duration FROM post ORDER BY post_id DESC LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn , $sql) or die("Query failed");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts - Listed Travel</title>
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
                <li>
                    <a href="post.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="active">
                    <a href="all-posts.php"><i class="fa fa-newspaper-o"></i> <span>All Posts</span></a>
                </li>
                <li>
                    <a href="add-post.php"><i class="fa fa-plus"></i> <span>Add Post</span></a>
                </li>
                <li>
                    <a href="users.php"><i class="fa fa-users"></i> <span>Profile</span></a>
                </li>
                <li>
                    <a href="contactforms.php"><i class="fa fa-envelope"></i> <span>Contact Forms</span></a>
                </li>
                <!-- <li>
                    <a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a>
                </li>
                <li>
                    <a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                </li> -->
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
                <h1>All Posts</h1>
                <a href="add-post.php" class="add-new-btn"><i class="fa fa-plus"></i> Add New Post</a>
            </div>

            <div class="posts-table">
                <table>
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
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
                                $imagePath = $row['post_img'];
                                if (strpos($imagePath, 'uploads/') === 0) {
                                    $imagePath = substr($imagePath, strlen('uploads/'));
                                }

                                if ($row['category'] == 'For Rent') {
                                    $price = number_format($row['price']) . " PKR / " . ucfirst($row['duration']);
                                } else {
                                    $price = number_format($row['price']) . " PKR";
                                }
                    ?>
                        <tr>
                            <td><?php echo $serialNo++; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $row['post_date']; ?></td>
                            <td class="image-cell">
                                <img src="uploads/<?php echo $imagePath; ?>" alt="Post Image">
                            </td>
                            <td class="actions">
                                <a href='update-post.php?id=<?php echo $row['post_id']; ?>' class="edit-btn"><i class='fa fa-edit'></i></a>
                                <a href='delete-post.php?id=<?php echo $row['post_id']; ?>' class="delete-btn"><i class='fa fa-trash-o'></i></a>
                            </td>
                        </tr>
                    <?php }} ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php
                $sql1 = "SELECT * FROM post";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
                if (mysqli_num_rows($result1) > 0) {
                    $total_records = mysqli_num_rows($result1);
                    $total_page = ceil($total_records / $limit);

                    echo "<div class='pagination'>";
                    if ($page > 1) {
                        echo '<a href="all-posts.php?page=' . ($page - 1) . '" class="page-btn"><i class="fa fa-chevron-left"></i> Prev</a>';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        $active = ($i == $page) ? "active" : "";
                        echo '<a href="all-posts.php?page=' . $i . '" class="page-btn ' . $active . '">' . $i . '</a>';
                    }

                    if ($total_page > $page) {
                        echo '<a href="all-posts.php?page=' . ($page + 1) . '" class="page-btn">Next <i class="fa fa-chevron-right"></i></a>';
                    }
                    echo "</div>";
                }
            ?>
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

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.page-header h1 {
    font-size: 20px;
    margin: 0;
}

.add-new-btn {
    background: #3498db;
    color: #fff;
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
}

/* Table Styles */
.posts-table {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

th {
    background: #f8f9fa;
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
}

.image-cell img {
    width: 60px;
    height: 45px;
    object-fit: cover;
    border-radius: 4px;
}

.actions {
    display: flex;
    gap: 5px;
}

.edit-btn, .delete-btn {
    padding: 4px;
    border-radius: 4px;
    color: #fff;
    font-size: 12px;
}

.edit-btn {
    background: #3498db;
}

.delete-btn {
    background: #e74c3c;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 5px;
    margin-top: 15px;
}

.page-btn {
    padding: 6px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-decoration: none;
    color: #333;
    font-size: 13px;
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
    
    .page-header {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
    
    .add-new-btn {
        width: 100%;
        justify-content: center;
    }
    
    table {
        font-size: 12px;
    }
    
    th, td {
        padding: 8px;
    }
    
    .image-cell img {
        width: 50px;
        height: 40px;
    }
}
</style>

<?php include "footer.php"; ?>
</body>
</html> 