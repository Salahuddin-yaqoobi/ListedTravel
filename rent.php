<?php
include "config.php";

session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<title>Rent - Listed Transport</title>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet"> 
		<link rel="stylesheet" href="css/animate.css" />
		<link rel="stylesheet" href="css/owl.theme.default.min.css" />
		<link rel="stylesheet" href="css/owl.carousel.min.css" />
		<link rel="stylesheet" href="css/meanmenu.min.css" />
		<link rel="stylesheet" href="css/venobox.css" />
		<link rel="stylesheet" href="css/font-awesome.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />	
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="css/responsive.css" />
        <link rel="icon" href="img/logo.png" type="image/x-icon">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>

		<!--  Start Header  -->
    <header id="header_area">
    <!-- Top Bar with Logo, Search, and Icons -->
    <div class="top-bar" style="background-color:#F3F4F6; padding: 15px 0;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;">
    <!-- Logo -->
                <div class="logo-container" style="flex: 0 0 200px;">
                    <a href="index.php">
                        <img src="img/logo.png" alt="Listed General Transport" style="max-width: 150px; height: auto;" class="main-logo">
      </a>
    </div>

    <!-- Updated Search Bar -->
    <div class="search-container" style="flex: 1;">
        <form id="searchForm" onsubmit="return handleSearch(event)">
            <div style="position: relative; display: flex; align-items: center; background: white; border-radius: 25px; border: 1px solid #e0e0e0; padding: 5px;">
                <!-- Toggle Buttons -->
                <div style="display: flex; margin-left: 10px; gap: 5px;">
                    <button type="button" class="toggle-btn active" data-type="buy" style="
                        padding: 8px 20px;
                        border-radius: 20px;
                        border: none;
                        font-weight: 500;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        background-color: #E79C19;
                        color: white;
                    ">Buy</button>
                    <button type="button" class="toggle-btn" data-type="rent" style="
                        padding: 8px 20px;
                        border-radius: 20px;
                        border: none;
                        font-weight: 500;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        background-color: transparent;
                        color: #666;
                    ">Rent</button>
                </div>

                <!-- Search Input -->
                <input 
                    type="text" 
                    id="searchInput"
                    placeholder="Search by brands, model, ref. no..." 
                    style="
                        flex: 1;
                        border: none;
                        outline: none;
                        padding: 8px 15px;
                        font-size: 14px;
                        background: transparent;
                    "
                >
                <button type="button" 
                    onclick="document.getElementById('searchInput').focus();"
                    style="
                        padding: 8px 15px;
                        background: none;
                        border: none;
                        color: #666;
                        cursor: pointer;
                    "
                >
                    <i class="fa fa-search"></i>
                </button>

                <!-- Suggestions Container (keeping existing styling) -->
                <div id="suggestions" style="
                    position: absolute;
                    top: 100%;
                    left: 0;
                    right: 0;
                    background: #ffffff;
                    border: 1px solid #e0e0e0;
                    border-top: none;
                    border-radius: 0 0 25px 25px;
                    max-height: 200px;
                    overflow-y: auto;
                    z-index: 1000;
                    margin-top: -1px; /* Removes gap between search bar and suggestions */
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    display: none;
                ">
                </div>
            </div>
        </form>
    </div>

    <!-- Icons -->
    <div class="header-icons" style="display: flex; gap: 20px; align-items: center;">
        <a href="#" style="color: #2c3e50; font-size: 20px;"><i class="fa fa-heart-o"></i></a>
        <a href="#" style="color: #2c3e50; font-size: 20px;"><i class="fa fa-shopping-cart"></i></a>
        <a href="contact.php" style="color: #2c3e50; font-size: 20px;"><i class="fa fa-user"></i></a>
    </div>

    <!-- Mobile Menu Button (Only shows on mobile) -->
    <button class="mobile-menu-btn">
        <i class="fa fa-bars"></i>
    </button>
  </div>
        </div>
    </div>
<style>
      .nav-bar a.active {
        color: #E79C19 !important;
    }

    .nav-bar a.active::after {
        width: 100%;
        background-color: #E79C19;
    }
</style>
    <!-- Mobile Menu Panel -->
    <div class="mobile-menu-panel">
        <div class="mobile-menu-content">
            <a href="index.php">Home</a>
            <a href="rent.php">For Rent</a>
            <a href="product.php">For Sale</a>
            <a href="about-us.php">About Us</a>
            <a href="contact.php">Contact</a>
            <?php if(isset($_SESSION['username'])) { ?>
                <a href="post.php">Dashboard</a>
            <?php } ?>
            <!-- Mobile Icons -->
            <div class="mobile-icons">
                <a href="#"><i class="fa fa-heart-o"></i> Wishlist</a>
                <a href="#"><i class="fa fa-shopping-cart"></i> Cart</a>
                <a href="contact.php"><i class="fa fa-user"></i> Profile</a>
            </div>
        </div>
    </div>

 <!-- Navigation Menu with centered container -->
    <div class="nav-bar" style=" margin-left: 95px; margin-right: 95px; margin-bottom: 10px; border-radius: 10px;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <nav style="padding: 8px 0;">
                <ul style="
                    display: flex;
                    justify-content: center;
                    gap: 40px;
                    margin: 0;
                    padding: 0;
                    list-style: none;
                ">
                   <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">Home</a></li>
                    <li><a href="rent.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'rent.php' ? 'active' : ''; ?>" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">For Rent</a></li>
                    <li><a href="product.php"  class="<?php echo basename($_SERVER['PHP_SELF']) == 'product.php' ? 'active' : ''; ?>" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">For Sale</a></li>
                    <li><a href="about-us.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about-us.php' ? 'active' : ''; ?>" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">About Us</a></li>
                    <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">Contact</a></li>
    <?php if(isset($_SESSION['username'])) { ?>
                    <li><a href="post.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">Dashboard</a></li>
    <?php } ?>
  </ul>
</nav>
        </div>
    </div>

<style>
        /* Hover effects for nav links */
        .nav-bar a {
    position: relative;
            transition: color 0.3s ease;
        }

        .nav-bar a:hover {
            color:  #f39c12 !important;
        }

        .nav-bar a::after {
    content: '';
    position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color:  #f39c12;
            transition: width 0.3s ease;
        }

        .nav-bar a:hover::after {
            width: 100%;
        }

        /* Hover effects for icons */
        .header-icons a {
            transition: transform 0.3s ease;
        }

        .header-icons a:hover {
            transform: scale(1.2);
        }

        /* Search input focus effect */
        #searchInput:focus {
          outline: none;
          box-shadow: 0 0 0 2px rgba(243, 156, 18, 0.1);
        }

        .suggestion-item {
            padding: 8px 20px;
            cursor: pointer;
            border-bottom: 1px solid rgba(243, 156, 18, 0.1);
        }

        .suggestion-item:hover {
            background-color: rgba(243, 156, 18, 0.1);
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        /* Add these styles while keeping existing ones */
        .toggle-btn {
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: transparent;
            color: #666;
        }

        .toggle-btn:hover {
            background-color: rgba(0, 230, 195, 0.1);
        }

        .toggle-btn.active {
            background-color: #E79C19 !important;
            color: white !important;
            box-shadow: 0 2px 4px rgba(0, 230, 195, 0.2);
        }

        /* Search container and suggestions styling */
        .search-container {
            position: relative;
        }

        #suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-top: none;
            border-radius: 0 0 25px 25px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            margin-top: -1px; /* Removes gap between search bar and suggestions */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .suggestion-item {
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .suggestion-item:hover {
            background-color: rgba(0, 230, 195, 0.1);
        }

        .suggestion-item:last-child {
            border-radius: 0 0 25px 25px;
        }

        /* Search input container */
        .search-container form > div {
            border-radius: 25px;
            border: 1px solid #e0e0e0;
            background: white;
            transition: all 0.3s ease;
        }

        .search-container form > div:focus-within {
            border-color: #00e6c3;
            box-shadow: 0 0 0 2px rgba(0, 230, 195, 0.1);
        }

        /* Mobile-specific styles - Only apply to mobile devices */
        @media (max-width: 768px) {
            .top-bar {
                padding: 8px 0 !important;
            }

            .container {
                padding: 0 10px !important;
            }

            .logo-container {
                flex: 0 0 70px !important;
            }

            .main-logo {
                max-width: 70px !important;
            }

            .search-container {
                flex: 1;
                margin: 0 5px !important;
            }

            .search-container form > div {
                padding: 2px !important;
            }

            .search-container .toggle-btn {
                display: none !important;
            }

            #searchInput {
                font-size: 12px !important;
                padding: 6px 8px !important;
            }

            .search-container button {
                padding: 6px 8px !important;
            }

            /* Adjust the gap between flex items */
            .top-bar .container > div {
                gap: 8px !important;
            }

            .header-icons {
                display: none !important;
            }

            .nav-bar {
                display: none !important;
            }

            .mobile-menu-btn {
                display: block !important;
                background: none;
                border: none;
                font-size: 20px;
                color: #1B3C73;
                cursor: pointer;
                padding: 5px;
                margin-left: 5px;
            }

            /* Rest of the mobile styles remain the same */
            .mobile-menu-panel {
                position: fixed;
                top: 0;
                right: -300px;
                width: 300px;
                height: 100vh;
                background: white;
                z-index: 1000;
                transition: right 0.3s ease;
                box-shadow: -2px 0 5px rgba(0,0,0,0.1);
            }

            .mobile-menu-panel.active {
                right: 0;
            }
      

            .mobile-menu-content {
                padding: 20px;
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .mobile-menu-content a {
                color: #1B3C73;
                text-decoration: none;
                font-weight: 600;
                font-size: 16px;
                padding: 10px 0;
                border-bottom: 1px solid #eee;
            }

            .mobile-icons {
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .mobile-icons a {
                display: flex;
                align-items: center;
                gap: 10px;
            }
        }

        /* Desktop-specific styles - Hide mobile elements on desktop */
        @media (min-width: 769px) {
            .mobile-menu-btn,
            .mobile-menu-panel {
                display: none !important;
            }
        }

        /* Custom Select Styling */
        #sortForm select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #fff url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2328425B' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat;
            background-position: calc(100% - 10px) center;
            background-size: 12px;
            padding-right: 30px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            height: 38px;
            padding: 8px 30px 8px 12px;
            font-size: 14px;
            color: #28425B;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #sortForm select:hover {
            border-color: #E79C19;
        }

        #sortForm select:focus {
            outline: none;
            border-color: #E79C19;
            box-shadow: 0 0 0 2px rgba(231, 156, 25, 0.1);
        }

        /* Hide default arrow in IE */
        #sortForm select::-ms-expand {
            display: none;
        }



         /* Footer Link Hover Effects */
    .single_ftr ul li a {
        transition: color 0.3s ease;
    }

    .single_ftr ul li a:hover {
        color: #E79C19 !important;
    }

    .single_ftr ul li a i {
        transition: transform 0.3s ease;
    }

    .single_ftr ul li a:hover i {
        transform: translateX(3px);
        color: #E79C19;
    }
  </style>
</header>
		<!--  End Header  -->			
<!-- Shop Product Area -->
        <div class="shop_page_area">
    <div class="container">
        <!-- Shop Bar -->
        <div class="shop_bar_tp fix mb-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="short_by_inner d-flex flex-wrap align-items-center">
                <label class="me-2">Sort by:</label>
                <form method="GET" id="sortForm" class="d-flex gap-2">
                    <select name="sort" onchange="document.getElementById('sortForm').submit()">
                        <option value="name_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'name_desc') ? 'selected' : '' ?>>Name Descending</option>
                        <option value="name_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'name_asc') ? 'selected' : '' ?>>Name Ascending</option>
                        <option value="date_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'date_desc') ? 'selected' : '' ?>>Date Descending</option>
                        <option value="date_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'date_asc') ? 'selected' : '' ?>>Date Ascending</option>
                        <option value="price_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') ? 'selected' : '' ?>>Price Descending</option>
                        <option value="price_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') ? 'selected' : '' ?>>Price Ascending</option>
                    </select>
                    <select name="limit" onchange="document.getElementById('sortForm').submit()">
                        <option value="8" <?= (isset($_GET['limit']) && $_GET['limit'] == '8') ? 'selected' : '' ?>>8</option>
                        <option value="12" <?= (isset($_GET['limit']) && $_GET['limit'] == '12') ? 'selected' : '' ?>>12</option>
                        <option value="30" <?= (isset($_GET['limit']) && $_GET['limit'] == '30') ? 'selected' : '' ?>>30</option>
                        <option value="all" <?= (isset($_GET['limit']) && $_GET['limit'] == 'all') ? 'selected' : '' ?>>ALL</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Shop Product Display -->
<div class="shop_details text-center">
    <div class="product_grid">
        <?php

        $sort = $_GET['sort'] ?? 'name_desc';
        $raw_limit = $_GET['limit'] ?? 8;

        // Sorting Logic: Order by the most recent post
        switch ($sort) {
            case 'price_asc':
                $order_by = "ORDER BY price ASC"; // Sort by price ascending
                break;
            case 'price_desc':
                $order_by = "ORDER BY price DESC"; // Sort by price descending
                break;
            case 'date_asc':
                $order_by = "ORDER BY post_date ASC"; // Sort by date ascending
                break;
            case 'date_desc':
                $order_by = "ORDER BY post_date DESC"; // Sort by date descending
                break;
            case 'name_asc':
                $order_by = "ORDER BY title ASC"; // Sort by name ascending
                break;
            case 'name_desc':
            default:
                $order_by = "ORDER BY title DESC"; // Sort by name descending
                break;
        }

        // Pagination Logic
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        if ($raw_limit === 'all') {
            $limit_sql = "";
            $offset = 0;
        } else {
            $limit = max(1, intval($raw_limit));
            $offset = ($page - 1) * $limit;
            $limit_sql = "LIMIT $limit OFFSET $offset";
        }

        // Query for fetching products with limit and offset
        $query = "SELECT * FROM post $order_by $limit_sql";
        $result = mysqli_query($conn, $query);

        // Check if the query executed successfully
        if (!$result) {
            echo "Error executing query: " . mysqli_error($conn);
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = htmlspecialchars($row['title'] ?? 'Untitled');
                $price = htmlspecialchars($row['price'] ?? '0');
                $description = htmlspecialchars($row['description'] ?? 'No description available.');
                $image = !empty($row['post_img']) ?  $row['post_img'] : 'img/top-1.jpg';
        ?>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
            <a href="product-details.php?post_id=<?= $row['post_id'] ?>" class="read_more">
                <div class="single_product">
                    <div class="product_image">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="img-fluid product-img" />
                    </div>
                    </a>
                    <div class="product_btm_text">
                        <span class="product_category"><?= htmlspecialchars($row['category']) ?></span>
                        <h4><a href="product-details.php?post_id=<?= $row['post_id'] ?>"><?= $title ?></a></h4>
                        <span class="price">AED <?= $price ?></span>
                        <p class="product_description"><?= $description ?></p>
                        <a href="product-details.php?post_id=<?= $row['post_id'] ?>" class="read_more">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                
            </div>
        <?php 
            }
        }
        ?>
    </div>
</div>


        <!-- Blog Pagination -->
        <div class="col-xs-12">
            <?php
            // Get total number of posts
            $total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM post");
            $total_row = mysqli_fetch_assoc($total_result);
            $total_posts = $total_row['total'];
            $total_pages = ceil($total_posts / $limit);  // Calculate total pages
            ?>

            <!-- Blog Pagination -->
            <?php if ($limit): ?>
            <div class="col-xs-12">
                <div class="blog_pagination pgntn_mrgntp fix">
                    <div class="pagination text-center">
                        <ul>
                            <?php if ($page > 1): ?>
                                <li><a href="?page=<?= $page - 1 ?>&sort=<?= $sort ?>&limit=<?= $limit ?>"><i class="fa fa-angle-left"></i></a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li><a href="?page=<?= $i ?>&sort=<?= $sort ?>&limit=<?= $limit ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>

                            <?php if ($page < $total_pages): ?>
                                <li><a href="?page=<?= $page + 1 ?>&sort=<?= $sort ?>&limit=<?= $limit ?>"><i class="fa fa-angle-right"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

    </div>
        </div>



<style>
/* Shop Container Layout */
.shop_page_area {
    margin-top: 50px;
}

/* Shop Product Display Row */
.shop_details .product_grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(300px, 1fr));
    gap: 20px;
    width: 100%;
}

/* PRODUCT CARD */
.single_product {
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease-in-out;
    height: 400px; /* Maintain the same fixed height */
    width: 300px; /* Ensure full width of grid cell */
}

/* Hover effect on product card */
.single_product:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.product_image {
    width: 100%;
    height: 160px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 8px;
    margin-bottom: 10px;
    background-color: #f1f5f9;
}

.product_image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

/* BOTTOM TEXT */
.product_btm_text {
    padding: 14px 16px;
    background-color: #f9fafb;
    text-align: left;
    border-top: 1px solid #e5e7eb;
    border-radius: 0 0 12px 12px;
}

.product_btm_text h4 {
    font-size: 18px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 6px;
    text-transform: capitalize;
}

.product_btm_text .price {
    font-size: 16px;
    font-weight: 600;
    color: #fb923c; /* Warm orange */
    margin-bottom: 8px;
}

.product_description {
    font-size: 14px;
    color: #6b7280;
    line-height: 1.5;
    margin-bottom: 10px;
    height: 42px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product_category {
    display: inline-block;
    background-color: #e0f2fe;
    color: #0284c7;
    font-size: 12px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 2px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

/* READ MORE */
.read_more {
    font-size: 13px;
    font-weight: 500;
    color: #0284c7;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: color 0.3s ease;
}

.read_more i {
    margin-left: 6px;
    transition: transform 0.3s ease;
}

.read_more:hover {
    color: #0369a1;
}

.read_more:hover i {
    transform: translateX(4px);
}

/* SORTING AND PAGINATION */
.short_by_inner {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.short_by_inner select {
    padding: 6px 10px;
    font-size: 14px;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    background-color: #f1f5f9;
    color: #1e293b;
}

/* Pagination */
.pagination ul {
    display: flex;
    justify-content: center;
    padding: 0;
    list-style: none;
}

.pagination ul li {
    margin: 0 5px;
}

.pagination ul li a {
    font-size: 16px;
    color: #334155;
    text-decoration: none;
    padding: 6px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    background-color: #f8fafc;
    transition: all 0.3s ease;
}

.pagination ul li a.active,
.pagination ul li a:hover {
    background-color: #fb923c;
    color: #fff;
    border-color: #fb923c;
}

/* Responsiveness for various screen sizes */

/* Two products per row on medium screens */
@media (max-width: 1200px) {
    .shop_details .row {
        grid-template-columns: repeat(2, minmax(300px, 1fr)); /* 2 items per row on medium screens */
    }
}

/* One product per row on smaller screens */
@media (max-width: 768px) {
    .shop_details .product_grid {
        grid-template-columns: 1fr; /* 1 item per row on smaller screens */
    }
}
</style>

		<!--  FOOTER START  -->
		<footer class="footer_area">
			<div class="container">
				<div class="row">				
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Contact</h4>
							<ul>
                            <li style="display: flex; align-items: flex-start;">
        						<i class="fa fa-map-marker" style="margin-right: 10px; margin-top: 3px;"></i>
        						<span style="display: inline-block; word-break: break-word; overflow-wrap: break-word;">
          						Jarn Yafour, Mafraq Industrial Area Abu Dhabi, UAE
        						</span>
      						</li>

								<li><i class="fa fa-phone" style="margin-right: 10px;"></i>058-9948428<br><span style="margin-left: 25px;">055-8118758</span></li>
								<li>
                                  <i class="fa fa-envelope" style="margin-right: 10px;"></i>
                                  <a href="mailto:listed.transport@yahoo.com">listed.transport@yahoo.com</a><br>
                                  <span style="display: inline-block; margin-left: 25px;">
                                    <a href="mailto:listedgeneraltransport@gmail.com">listedgeneraltransport@gmail.com</a>
                                  </span>
                                </li>
							</ul>
						</div>
					</div> <!--  End Col -->
					
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Navigate</h4>
							<ul>
								<li><a href="about-us.php"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>About Us</a></li>
								<li><a href="contact.php"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Delivery Information</a></li>
								<li><a href="#"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Privacy Policy</a></li>
								<li><a href="#"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Terms & Conditions</a></li>
								<li><a href="contact.php"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Contact Us</a></li>
							</ul>
						</div>
					</div> <!--  End Col -->
					
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Solution</h4>
							<ul>
								<li><a href="#"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Returns</a></li>
								<li><a href="#"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Site Map</a></li>
								<li><a href="#"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Wish List</a></li>
								<li><a href="#"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>My Account</a></li>
								<li><a href="#"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>Order History</a></li>
							</ul>
						</div>
					</div> <!--  End Col -->	
					
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Follow Us</h4>
							<div class="ftr_social_icon">
								<ul>
                                <li><a href="https://www.facebook.com/listedgeneraltransport"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/listed_earthmoving/"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
					</div> <!--  End Col -->
					
				</div>
			</div>
	
		
			<div class="ftr_btm_area">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="ftr_social_icon">
								<ul>
                                <li><a href="https://www.facebook.com/listedgeneraltransport"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/listed_earthmoving/"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<p class="copyright_text text-center">&copy; 2025 All Rights Reserved Listed Transport</p>
						</div>
						
						<div class="col-sm-4">
							<div class="payment_mthd_icon text-right">
								<ul>
									<li><i class="fa fa-cc-paypal"></i></li>
									<li><i class="fa fa-cc-visa"></i></li>
									<li><i class="fa fa-cc-discover"></i></li>
									<li><i class="fa fa-cc-mastercard"></i></li>
									<li><i class="fa fa-cc-amex"></i></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--  FOOTER END  -->

		<script src="js/vendor/jquery-1.12.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.meanmenu.min.js"></script>
		<script src="js/jquery.mixitup.js"></script>
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/waypoints.min.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/venobox.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/simplePlayer.js"></script>
		<script src="js/main.js"></script>
		<script src="script.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');
  const suggestionsContainer = document.getElementById('suggestions');
  
  // Handle search submit
  document.getElementById('searchForm').addEventListener('submit', async function (event) {
    event.preventDefault();
    const query = searchInput.value.trim().toLowerCase();

    // Redirect to specific pages based on keywords
    if (query === 'rent') {
      window.location.href = 'rent.php';
      return;
    } else if (query === 'sale') {
      window.location.href = 'sale.php';
      return;
    }

    try {
      const response = await fetch('get-product-id.php?query=' + encodeURIComponent(query));
      const data = await response.json();

      if (data.success && data.post_id) {
        window.location.href = 'product-details.php?post_id=' + data.post_id;
      } else {
        alert('Product not found.');
      }
    } catch (error) {
      console.error('Search error:', error);
      alert('Something went wrong.');
    }
  });

  // Fetch suggestions on input
  searchInput.addEventListener('input', async function () {
    const query = searchInput.value.trim();

    if (query.length === 0) {
      suggestionsContainer.innerHTML = '';
      suggestionsContainer.style.display = 'none';  // Hide suggestions if query is empty
      return;
    }

    try {
      const response = await fetch('get-suggestions.php?query=' + encodeURIComponent(query));
      const suggestions = await response.json();

      suggestionsContainer.innerHTML = '';  // Clear previous suggestions
      if (suggestions.length > 0) {
        suggestionsContainer.style.display = 'block';  // Show suggestions if any
        suggestions.forEach(item => {
          const li = document.createElement('div'); // Changed to div for styling purpose
          li.textContent = item.name;
          li.classList.add('suggestion-item'); // Add the suggestion-item class
          li.addEventListener('click', () => {
            window.location.href = 'product-details.php?post_id=' + item.post_id;
          });
          suggestionsContainer.appendChild(li);
        });
      } else {
        suggestionsContainer.style.display = 'none';  // Hide if no suggestions
      }
    } catch (error) {
      console.error('Suggestion error:', error);
    }
  });

  // Hide suggestions when clicking outside
  document.addEventListener('click', function (event) {
    if (
      !searchInput.contains(event.target) &&
      !suggestionsContainer.contains(event.target)
    ) {
      suggestionsContainer.innerHTML = '';  // Clear suggestions
      suggestionsContainer.style.display = 'none';  // Hide suggestions container
    }
  });
});

		</script>
<script>
// Add this to your existing JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-btn');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            toggleButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.backgroundColor = 'transparent';
                btn.style.color = '#666';
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            this.style.backgroundColor = '#FF6A18';
            this.style.color = 'white';
            
            // Store the selected type (buy/rent)
            const selectedType = this.getAttribute('data-type');
            // You can use this selectedType value for your search functionality
        });
    });
});
</script>        
	</body>
</html>