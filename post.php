<?php 
session_start();
include 'config.php';
if(!isset($_SESSION['username'])){
    header("Location: " . APP_URL . "/admin/");
    exit();
}

// Get statistics for charts
$total_posts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM post"));
$total_users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user"));
$total_categories = mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT category FROM post"));

// Get category distribution
$category_sql = "SELECT category, COUNT(*) as count FROM post GROUP BY category";
$category_result = mysqli_query($conn, $category_sql);
$categories = [];
$category_counts = [];
while($row = mysqli_fetch_assoc($category_result)) {
    $categories[] = $row['category'];
    $category_counts[] = $row['count'];
}

// Get monthly post distribution
$monthly_sql = "SELECT DATE_FORMAT(post_date, '%Y-%m') as month, COUNT(*) as count 
                FROM post 
                GROUP BY DATE_FORMAT(post_date, '%Y-%m')
                ORDER BY month DESC LIMIT 6";
$monthly_result = mysqli_query($conn, $monthly_sql);
$months = [];
$monthly_counts = [];
while($row = mysqli_fetch_assoc($monthly_result)) {
    $months[] = $row['month'] ? date('M Y', strtotime($row['month'])) : '';
    $monthly_counts[] = $row['count'];
}

// Get contact form submissions by month
$contact_sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count 
                FROM contacts 
                GROUP BY DATE_FORMAT(created_at, '%Y-%m')
                ORDER BY month DESC LIMIT 6";
$contact_result = mysqli_query($conn, $contact_sql);
$contact_months = [];
$contact_counts = [];
while($row = mysqli_fetch_assoc($contact_result)) {
    $contact_months[] = date('M Y', strtotime($row['month']));
    $contact_counts[] = $row['count'];
}

// Get recent posts
$recent_posts_sql = "SELECT title, post_date FROM post ORDER BY post_date DESC LIMIT 5";
$recent_posts_result = mysqli_query($conn, $recent_posts_sql);
$recent_posts = [];
while($row = mysqli_fetch_assoc($recent_posts_result)) {
    $recent_posts[] = $row;
}

// Add this query with your other queries at the top of the file
$vehicle_cat_sql = "SELECT vc.category_name, COUNT(p.post_id) as count 
                    FROM vehicle_category vc 
                    LEFT JOIN post p ON vc.category_id = p.vehicle_cat 
                    GROUP BY vc.category_id, vc.category_name";
$vehicle_cat_result = mysqli_query($conn, $vehicle_cat_sql);
$vehicle_categories = [];
$vehicle_counts = [];
while($row = mysqli_fetch_assoc($vehicle_cat_result)) {
    $vehicle_categories[] = $row['category_name'];
    $vehicle_counts[] = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Listed Travel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Loading Animation -->
    <style>
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .chart-card.full-width {
            grid-column: 1 / -1;  /* Makes the card take full width */
            margin-top: 15px;
        }
        .chart-card.full-width .chart-container {
            height: 300px;  /* Taller height for better visibility */
        }
    </style>
</head>
<body>
<!-- Loading Overlay -->
<div class="loading-overlay">
    <div class="loading-spinner"></div>
</div>

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
        <!-- Stats Cards -->
        <div class="stats-cards fade-in">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa fa-file-text"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $total_posts; ?></h3>
                    <p>Total Posts</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $total_users; ?></h3>
                    <p>Total Users</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $total_categories; ?></h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-section fade-in">
            <div class="chart-card">
                <h3>Posts by Category</h3>
                <div class="chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
            <div class="chart-card">
                <h3>Monthly Posts</h3>
                <div class="chart-container">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
            <div class="chart-card">
                <h3>Contact Form Submissions</h3>
                <div class="chart-container">
                    <canvas id="contactChart"></canvas>
                </div>
            </div>
            <div class="chart-card full-width">
                <h3>Posts by Vehicle Type</h3>
                <div class="chart-container">
                    <canvas id="vehicleChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="recent-posts fade-in">
            <div class="chart-card">
                <h3>Recent Posts</h3>
                <div class="recent-posts-list">
                    <?php foreach($recent_posts as $post): ?>
                    <div class="recent-post-item">
                        <i class="fa fa-file-text"></i>
                        <div class="post-info">
                            <h4><?php echo $post['title']; ?></h4>
                            <span><?php echo $post['post_date']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
      </div>
      </div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Loading Animation
window.addEventListener('load', function() {
    const loadingOverlay = document.querySelector('.loading-overlay');
    const fadeElements = document.querySelectorAll('.fade-in');
    
    // Hide loading overlay
    loadingOverlay.style.opacity = '0';
    setTimeout(() => {
        loadingOverlay.style.display = 'none';
    }, 500);

    // Show fade-in elements
    fadeElements.forEach((element, index) => {
        setTimeout(() => {
            element.classList.add('visible');
        }, 100 * index);
    });
});

// Category Chart
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
new Chart(categoryCtx, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($categories); ?>,
        datasets: [{
            data: <?php echo json_encode($category_counts); ?>,
            backgroundColor: [
                '#3498db',
                '#2ecc71',
                '#e74c3c',
                '#f1c40f',
                '#9b59b6',
                '#1abc9c'
            ],
            borderWidth: 0,
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    font: {
                        size: 11
                    }
                }
            }
        },
        cutout: '70%'
    }
});

// Monthly Chart
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
new Chart(monthlyCtx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode(array_reverse($months)); ?>,
        datasets: [{
            label: 'Posts',
            data: <?php echo json_encode(array_reverse($monthly_counts)); ?>,
            borderColor: '#3498db',
            backgroundColor: 'rgba(52, 152, 219, 0.1)',
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#fff',
            pointBorderColor: '#3498db',
            pointBorderWidth: 2,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    font: {
                        size: 11
                    }
                },
                grid: {
                    display: true,
                    drawBorder: false
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 11
                    }
                }
            }
        }
    }
});

// Contact Form Chart
const contactCtx = document.getElementById('contactChart').getContext('2d');
new Chart(contactCtx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(array_reverse($contact_months)); ?>,
        datasets: [{
            label: 'Contact Forms',
            data: <?php echo json_encode(array_reverse($contact_counts)); ?>,
            backgroundColor: '#2ecc71',
            borderColor: '#27ae60',
            borderWidth: 1,
            borderRadius: 5,
            barThickness: 20
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    font: {
                        size: 11
                    }
                },
                grid: {
                    display: true,
                    drawBorder: false
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 11
                    }
                }
            }
        }
    }
});

// Vehicle Category Chart
const vehicleCtx = document.getElementById('vehicleChart').getContext('2d');
new Chart(vehicleCtx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($vehicle_categories); ?>,
        datasets: [{
            label: 'Number of Posts',
            data: <?php echo json_encode($vehicle_counts); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1,
            borderRadius: 5,
            maxBarThickness: 50
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Distribution of Posts by Vehicle Type',
                padding: {
                    top: 10,
                    bottom: 30
                },
                font: {
                    size: 16
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    font: {
                        size: 12
                    }
                },
                grid: {
                    display: true,
                    drawBorder: false,
                    color: 'rgba(0, 0, 0, 0.1)'
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 12
                    },
                    maxRotation: 45,
                    minRotation: 45
                }
            }
        },
        animation: {
            duration: 2000,
            easing: 'easeInOutQuart'
        },
        hover: {
            mode: 'index',
            intersect: false
        },
        tooltips: {
            mode: 'index',
            intersect: false
        }
    }
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

/* Stats Cards */
.stats-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 15px;
}

.stat-card {
    background: #fff;
    border-radius: 8px;
    padding: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
}

.stat-icon {
    width: 40px;
    height: 40px;
    background: #3498db;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 20px;
}

.stat-info h3 {
    margin: 0;
    font-size: 20px;
    color: #2c3e50;
}

.stat-info p {
    margin: 3px 0 0;
    color: #7f8c8d;
    font-size: 13px;
}

/* Charts Section */
.charts-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 15px;
    margin-bottom: 15px;
}

.chart-card {
    background: #fff;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.chart-card h3 {
    margin: 0 0 15px;
    color: #2c3e50;
    font-size: 16px;
}

.chart-container {
    height: 200px;
    position: relative;
}

/* Recent Posts */
.recent-posts {
    margin-bottom: 15px;
}

.recent-posts-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.recent-post-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.recent-post-item:hover {
    background-color: #f8f9fa;
}

.recent-post-item i {
    color: #3498db;
    font-size: 16px;
}

.post-info h4 {
    margin: 0;
    font-size: 14px;
    color: #2c3e50;
}

.post-info span {
    font-size: 12px;
    color: #7f8c8d;
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
    
    .stats-cards {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }
    
    .charts-section {
        grid-template-columns: 1fr;
    }
    
    .stat-card {
        padding: 10px;
    }
    
    .stat-icon {
        width: 35px;
        height: 35px;
        font-size: 16px;
    }
    
    .stat-info h3 {
        font-size: 18px;
    }
    
    .stat-info p {
        font-size: 12px;
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
    
    .stats-cards {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include "footer.php"; ?>
</body>
</html>
