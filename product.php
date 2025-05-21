<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet"/> 
  <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">	
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/meanmenu.min.css" />
  <link rel="stylesheet" href="css/venobox.css" />
  <link rel="stylesheet" href="css/font-awesome.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />	
  <link rel="stylesheet" href="style.css?v=123" />
  <link rel="stylesheet" href="css/responsive.css" />	
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <title>Sale - Listed Transport</title>

  <!-- Load jQuery first -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- You can also use your local version of jQuery, like:
  <script src="js/jquery.min.js"></script>
  -->

  <title>Sale - Listed Transport</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .product-card img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      aspect-ratio: 16/9;
      object-fit: cover;
    }
    .product-card .favorite-icon {
      float: right;
      font-size: 1.2em;
      color: #888;
      cursor: pointer;
    }
    .product-card .favorite-icon:hover {
      color: #e53e3e;
    }
    .for-sale-tag {
      background-color: #f0c300;
      color: #1a202c;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 0.75rem;
      display: inline-block;
      margin-top: 0.5rem;
      font-weight: 900;
      height: 20px;
    }
    .condition-tag {
      background-color: #48bb78;
      color: white;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 0.75rem;
      display: inline-block;
      margin-left: 0.5rem;
    }
    .condition-tag.used {
      background-color: #a0aec0;
    }
    /* Custom Select Styling for Filter Sidebar */
    #filterForm select {
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
        width: 100%;
    }

    #filterForm select:hover {
        border-color: #E79C19;
    }

    #filterForm select:focus {
        outline: none;
        border-color: #E79C19;
        box-shadow: 0 0 0 2px rgba(231, 156, 25, 0.1);
    }

    /* Hide default arrow in IE */
    #filterForm select::-ms-expand {
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

    /* Active Navigation Link */
    .nav-bar a.active {
        color: #E79C19 !important;
    }

    .nav-bar a.active::after {
        width: 100%;
        background-color: #E79C19;
    }
  </style>
</head>
<body class="bg-gray-100">
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
                    <li><a href="post.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'post.php' ? 'active' : ''; ?>" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">Dashboard</a></li>
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
  </style>
</header>

      

  <div class="w-full max-w-[1400px] mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Heavy Equipment Marketplace</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <!-- Filter Sidebar -->
      <aside class="md:col-span-1 bg-white p-4 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">Filters</h2>
        <form id="filterForm" method="GET" action="">
        <div class="space-y-4">
          <div>
                    <label class="block text-sm font-medium mb-1">Category</label>
                <select name="category" class="w-full border p-2 rounded">
                    <option value="">All Categories</option>
                    <option value="For Sale" <?php
                        echo (!isset($_GET['category']) || $_GET['category'] === 'For Sale') ? 'selected' : '';
                    ?>>For Sale</option>
                    <option value="For Rent" <?php
                        echo (isset($_GET['category']) && $_GET['category'] === 'For Rent') ? 'selected' : '';
                    ?>>For Rent</option>
                </select>

          </div>
                
          <div>
                    <label class="block text-sm font-medium mb-1">Vehicle Type</label>
                    <select name="vehicle_type" class="w-full border p-2 rounded">
                        <option value="">All Types</option>
                        <?php
                      
                        $type_sql = "SELECT * FROM vehicle_category";
                        $type_result = mysqli_query($conn, $type_sql);
                        if($type_result) {
                            while($type = mysqli_fetch_assoc($type_result)) {
                                $selected = (isset($_GET['vehicle_type']) && $_GET['vehicle_type'] == $type['category_id']) ? 'selected' : '';
                                echo "<option value='".$type['category_id']."' ".$selected.">".$type['category_name']."</option>";
                            }
                        }
                        ?>
            </select>
          </div>

          <div>
                    <label class="block text-sm font-medium mb-1">Price Range (AED)</label>
            <div class="flex gap-2">
                        <input type="number" name="min_price" placeholder="Min" class="w-1/2 border p-2 rounded" 
                               value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : ''; ?>" />
                        <input type="number" name="max_price" placeholder="Max" class="w-1/2 border p-2 rounded"
                               value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : ''; ?>" />
            </div>
          </div>

                <div class="space-y-2">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200 font-semibold">
                        Apply Filters
                    </button>
                    <a href="product.php" class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded hover:bg-gray-300 transition duration-200 font-semibold text-center block">
                        Clear Filters
                    </a>
                </div>
        </div>
        </form>
      </aside>

      <!-- Product Grid -->
      <section class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
      
        
      $where_conditions = array();

      // Apply 'For Sale' by default if no category is selected
      if (!isset($_GET['category'])) {
          $category = 'For Sale'; // default
      } else {
          $category = mysqli_real_escape_string($conn, $_GET['category']);
      }
      
      // Add to query if not empty
      if (!empty($category)) {
          $where_conditions[] = "p.category = '$category'";
      }
      

        if(isset($_GET['vehicle_type']) && !empty($_GET['vehicle_type'])) {
            $vehicle_type = mysqli_real_escape_string($conn, $_GET['vehicle_type']);
            $where_conditions[] = "p.vehicle_cat = '$vehicle_type'";
        }

        if(isset($_GET['min_price']) && !empty($_GET['min_price'])) {
            $min_price = mysqli_real_escape_string($conn, $_GET['min_price']);
            $where_conditions[] = "p.price >= '$min_price'";
        }

        if(isset($_GET['max_price']) && !empty($_GET['max_price'])) {
            $max_price = mysqli_real_escape_string($conn, $_GET['max_price']);
            $where_conditions[] = "p.price <= '$max_price'";
        }

        $where_clause = '';
        if(!empty($where_conditions)) {
            $where_clause = "WHERE " . implode(" AND ", $where_conditions);
        }

        $sql = "SELECT p.*, vc.category_name 
                FROM post p 
                LEFT JOIN vehicle_category vc ON p.vehicle_cat = vc.category_id 
                $where_clause 
                ORDER BY p.post_id DESC";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="bg-white rounded-lg shadow p-4 product-card">
          <a href="product-details.php?post_id=<?php echo $row['post_id']; ?>">
                <img src="<?php echo $row['post_img']; ?>" alt="<?php echo $row['title']; ?>" />
                </a>
            <div class="mt-2">
                    <span class="for-sale-tag"><?php echo $row['category']; ?></span>
                    <span class="condition-tag"><?php echo $row['category_name']; ?></span>
            </div>
                <h3 class="text-xlg font-semibold mt-2"><?php echo $row['title']; ?></h3>
                <p class="text-lg font-bold text-gray-900 mt-1">
                    AED <?php echo number_format($row['price']); ?>
                    <?php if($row['category'] == 'For Rent'): ?>
                        <span class="text-sm">/ <?php echo $row['duration']; ?></span>
                    <?php endif; ?>
                </p>
                <p class="text-md text-gray-500 mt-1 line-clamp-2"><?php echo $row['description']; ?></p>
                <a href="product-details.php?post_id=<?php echo $row['post_id']; ?>" class="text-blue-600 text-sm mt-2 inline-block font-bold">View Details</a>
            <span class="favorite-icon">&#9825;</span>
          </div>
        <?php 
            }
        } else {
            echo "<div class='text-center py-4'>No products found</div>";
        }
        ?>
      </section>
    </div>
  </div>





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













 
  <script>
    document.querySelectorAll('.favorite-icon').forEach(icon => {
      icon.addEventListener('click', function () {
        this.textContent = this.textContent === '♥' ? '♡' : '♥';
      });
    });
  </script>
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
	</body>
</html>
