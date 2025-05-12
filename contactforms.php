<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != '1'){
    header("Location: http://localhost/listedtravel/admin/");
    exit();
}

include "config.php";

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get total records for pagination
$sql_total = "SELECT COUNT(*) as total FROM contacts";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_records = $row_total['total'];
$total_pages = ceil($total_records / $limit);

// Get contact forms with pagination
$sql = "SELECT * FROM contacts ORDER BY created_at DESC LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql) or die("Query Failed.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Forms - Listed Travel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- SweetAlert2 -->
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
                <h1><i class="fa fa-envelope"></i> Contact Forms</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td>
                                <button class="btn btn-link view-message" 
                                        data-message="<?php echo htmlspecialchars($row['message']); ?>"
                                        data-name="<?php echo htmlspecialchars($row['name']); ?>">
                                    View Message
                                </button>
                            </td>
                            <td><?php echo date('d M Y, H:i', strtotime($row['created_at'])); ?></td>
                            <td>
                                <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-reply"></i> Reply
                                </a>
                                <button class="btn btn-sm btn-danger delete-contact" data-id="<?php echo $row['id']; ?>">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No contact forms found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if($total_pages > 1) { ?>
            <div class="pagination">
                <?php if($page > 1) { ?>
                    <a href="contactforms.php?page=<?php echo $page - 1; ?>" class="page-btn">
                        <i class="fa fa-chevron-left"></i> Prev
                    </a>
                <?php } ?>
                
                <?php for($i = 1; $i <= $total_pages; $i++) { ?>
                    <a href="contactforms.php?page=<?php echo $i; ?>" 
                       class="page-btn <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php } ?>

                <?php if($page < $total_pages) { ?>
                    <a href="contactforms.php?page=<?php echo $page + 1; ?>" class="page-btn">
                        Next <i class="fa fa-chevron-right"></i>
                    </a>
                <?php } ?>
            </div>
            <?php } ?>
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
    padding: 20px;
    transition: all 0.3s ease;
}

/* Content Area */
.content-area {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 25px;
}

.page-header {
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.page-header h1 {
    font-size: 24px;
    color: #2c3e50;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.page-header h1 i {
    color: #3498db;
}

/* Table Styles */
.table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}

.table th {
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #dee2e6;
    padding: 12px;
}

.table td {
    padding: 12px;
    vertical-align: middle;
    border-bottom: 1px solid #dee2e6;
}

.table tbody tr:hover {
    background-color: rgba(52, 152, 219, 0.05);
}

/* Button Styles */
.btn {
    padding: 6px 12px;
    font-size: 14px;
    border-radius: 4px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s;
}

.btn-sm {
    padding: 4px 8px;
    font-size: 12px;
}

.btn-primary {
    background: #3498db;
    border-color: #3498db;
    color: #fff;
}

.btn-danger {
    background: #e74c3c;
    border-color: #e74c3c;
    color: #fff;
}

.btn-link {
    color: #3498db;
    text-decoration: none;
    padding: 0;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
    transition: all 0.3s;
}

.page-btn:hover {
    background: #f8f9fa;
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
        padding: 15px;
    }
    
    .table-responsive {
        overflow-x: auto;
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
    
    .btn {
        padding: 4px 8px;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
// View Message
document.querySelectorAll('.view-message').forEach(button => {
    button.addEventListener('click', function() {
        const message = this.dataset.message;
        const name = this.dataset.name;
        
        Swal.fire({
            title: `Message from ${name}`,
            text: message,
            icon: 'info',
            confirmButtonText: 'Close',
            confirmButtonColor: '#3498db'
        });
    });
});

// Delete Contact
document.querySelectorAll('.delete-contact').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.dataset.id;
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#95a5a6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send delete request
                fetch('delete-contact.php', {
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
                            text: 'Contact form has been deleted.',
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
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while deleting the contact form.',
                        icon: 'error',
                        confirmButtonColor: '#e74c3c'
                    });
                });
            }
        });
    });
});
</script>
</body>
</html> 