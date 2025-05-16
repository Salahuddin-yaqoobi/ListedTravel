<?php
include "config.php";
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listed Transport - Ecommerce Bootstrap Template</title>
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

    <!-- Mobile Menu Panel -->
    <div class="mobile-menu-panel">
        <div class="mobile-menu-content">
            <a href="index.php">Home</a>
            <a href="about-us.php">About Us</a>
            <a href="rent.php">For Rent</a>
            <a href="product.html">For Sale</a>
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
                    <li><a href="index.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">Home</a></li>
                    <li><a href="about-us.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">About Us</a></li>
                    <li><a href="rent.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">For Rent</a></li>
                    <li><a href="product.php" class="active" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">For Sale</a></li>
                    <li><a href="contact.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">Contact</a></li>
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

        @media (max-width: 768px) {
            #slider_area {
                margin-top: 15px !important;
                padding: 0 10px;
            }

            .single_slide {
                height: 400px !important;
                border-radius: 10px !important;
                margin: 0 !important;
            }

            .slider_content {
                padding: 20px !important;
            }

            .slider_content p {
                font-size: 14px !important;
                margin-bottom: 8px !important;
            }

            .slider_content h1 {
                font-size: 28px !important;
                margin-bottom: 8px !important;
            }

            .slider_content h4 {
                font-size: 16px !important;
                margin-bottom: 15px !important;
            }

            .exploreInventoryBtn.btn.main_btn {
                padding: 8px 20px !important;
                font-size: 14px !important;
            }

            /* Fix for overlapping slides */
            .owl-carousel .owl-item {
                padding: 0 !important;
            }

            .owl-carousel .owl-stage {
                padding: 0 !important;
            }

            /* Adjust dots navigation position */
            #slider_area .owl-dots {
                bottom: 10px !important;
            }

            #slider_area .owl-dot {
                margin: 0 3px !important;
            }

            #slider_area .owl-dot > span {
                width: 8px !important;
                height: 8px !important;
            }
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

	<?php

// Check if 'post_id' is set in the URL and is a valid number
if (isset($_GET['post_id']) && is_numeric($_GET['post_id'])) {
    $post_id = $_GET['post_id'];  // Use 'post_id' from the URL

    // Prepare the SQL query to get the current product details
    $query = "SELECT * FROM post WHERE post_id = ?";
    $stmt = $conn->prepare($query);

    // Check if the prepare() method was successful
    if ($stmt === false) {
        // If prepare() failed, display the error and exit
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind the 'post_id' parameter to the query
    $stmt->bind_param("i", $post_id);  // 'i' stands for integer

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if product is found
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Get the category of the current product
        $category = $product['category'];

        // Prepare the SQL query to fetch related products from the same category
        $related_query = "SELECT * FROM post WHERE category = ? AND post_id != ? LIMIT 4"; // Get 4 related products
        $related_stmt = $conn->prepare($related_query);
        $related_stmt->bind_param("si", $category, $post_id);  // Bind category and post_id (excluding current product)

        // Execute the related products query
        $related_stmt->execute();
        $related_result = $related_stmt->get_result();
    } else {
        // If no product is found, show an error message
        echo "Product not found.";
        exit;
    }
} else {
    // If 'post_id' is not set or not valid, show an error
    echo "Invalid product ID.";
    exit;
}
?>

<style>
.pd_img img {
  width: 100%;
  height: 300px;
  object-fit: contain; /* Show entire image, might leave blank space */
  background-color: #f5f5f5; /* Optional: background behind image */
  border-radius: 8px;
}

</style>
<!-- Product Details Area -->
<div class="prdct_dtls_page_area" style="margin-top: 35px;">
    <div class="container">
        <div class="row">
            <!-- Product Details Image -->
            <div class="col-md-6 col-xs-12">
                <div class="pd_img fix">
				<a class="venobox" href="<?= htmlspecialchars($product['post_img']) ?>">
                  <img src="<?= htmlspecialchars($product['post_img']) ?>" alt="<?= htmlspecialchars($product['title']) ?>" />
                 </a>
                </div>
            </div>
            <!-- Product Details Content -->
            <div class="col-md-6 col-xs-12">
                <div class="prdct_dtls_content">
                    <a class="pd_title" href="#"><?= htmlspecialchars($product['title']) ?></a>
                    <div class="pd_price_dtls fix">
                        <?php if ($product['product_status'] == 'sold'): ?>
                            <div class="sold-badge" style="
                                background: linear-gradient(to right, #ff4d4d, #ff1a1a);
                                color: white;
                                padding: 8px 25px;
                                border-radius: 25px;
                                display: inline-block;
                                font-weight: bold;
                                font-size: 16px;
                                text-transform: uppercase;
                                letter-spacing: 1px;
                                box-shadow: 0 2px 4px rgba(255, 26, 26, 0.2);
                                margin: 10px 0;
                            ">
                                SOLD
                            </div>
                        <?php else: ?>
                            <div class="pd_price">
                                <span class="new">AED <?= htmlspecialchars($product['price']) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="pd_text">
                        <h4>overview:</h4>
                        <p><?= htmlspecialchars($product['description']) ?></p>
                    </div>
                
                    <div class="pd_btn fix">
					<p style="font-size: 16px; color: #333; margin-bottom: 10px;">
 						 <i class="fa fa-phone" aria-hidden="true" style="color: #28a745; background: #e8f5e9; padding: 8px; border-radius: 50%; margin-right: 10px; box-shadow: 0 0 5px rgba(40,167,69,0.5);"></i>
 						 <strong>+971 58 994 8428</strong>
					</p>

					<p style="font-size: 16px; color: #333; margin-bottom: 10px;">
					    <i class="fa fa-envelope" aria-hidden="true" style="color: #007bff; background: #e3f2fd; padding: 8px; border-radius: 50%; margin-right: 10px; box-shadow: 0 0 5px rgba(0,123,255,0.5); vertical-align: top;"></i>
					    <span style="display: inline-block;">
					        <strong>listed.transport@yahoo.com</strong><br>
					        <strong>listedgeneraltransport@gmail.com</strong>
					    </span>
					</p>

					<p style="font-size: 16px; color: #333;">
					  	<i class="fa fa-map-marker" aria-hidden="true" style="color: #dc3545; background: #fdecea; padding: 8px; border-radius: 50%; margin-right: 10px; box-shadow: 0 0 5px rgba(220,53,69,0.5);"></i>
  						<strong>Jarn Yafour, Mafraq Industrial Area Abu Dhabi, UAE</strong>
					</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Related Product Area -->
<div class="related_prdct_area text-center" style="padding: 50px 0;">
    <div class="container" style="max-width: 1300px; margin: 0 auto;">
        <!-- Section Title -->
        <div class="rp_title text-center">
            <h3 style="font-size: 30px; font-weight: bold; margin-bottom: 30px;">Related products</h3>
        </div>

        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px;">
            <?php
            if ($related_result->num_rows > 0) {
                while ($related_product = $related_result->fetch_assoc()) {
            ?>
<div class="col-lg-3 col-md-4 col-sm-6" style="display: flex; justify-content: center; align-items: stretch;">
    <a href="product-details.php?post_id=<?= htmlspecialchars($related_product['post_id']) ?>" style="text-decoration: none; color: inherit; width: 100%;">
        <div class="single_product" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%; width: 100%; background: #fff; border: 1px solid #ddd; border-radius: 5px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            
            <div class="product_image" style="position: relative; height: 220px; overflow: hidden;">
                <img src="<?= htmlspecialchars($related_product['post_img']) ?>" alt="<?= htmlspecialchars($related_product['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;" />
                <div class="box-content" style="position: absolute; bottom: 10px; left: 10px; right: 10px; display: flex; justify-content: space-between; opacity: 0; transition: opacity 0.3s ease;">
                    <i class="fa fa-heart-o" style="color: #fff; background-color: rgba(0,0,0,0.6); padding: 8px; border-radius: 50%; font-size: 16px;"></i>
                    <i class="fa fa-cart-plus" style="color: #fff; background-color: rgba(0,0,0,0.6); padding: 8px; border-radius: 50%; font-size: 16px;"></i>
                    <i class="fa fa-search" style="color: #fff; background-color: rgba(0,0,0,0.6); padding: 8px; border-radius: 50%; font-size: 16px;"></i>
                </div>
            </div>

            <div class="product_btm_text" style="padding: 15px; text-align: center;">
                <h4 style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">
                    <?= htmlspecialchars($related_product['title']) ?>
                </h4>
                <span class="price" style="font-size: 15px; font-weight: bold; color: #1F92C1;">AED <?= htmlspecialchars($related_product['price']) ?></span>
            </div>

        </div>
    </a>
</div>

            <?php
                }
            } else {
                echo '<p>No related products found.</p>';
            }
            ?>
        </div>
    </div>
</div>



		<!--  FOOTER START  -->
		<footer class="footer_area">
			<div class="container">
				<div class="row">				
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Contact</h4>
							<ul>
								<li><i class="fa fa-map-marker" style="margin-right: 10px;"></i>Jarn Yafour, Mafraq Industrial Area Abu Dhabi, UAE</li>
								<li><i class="fa fa-phone" style="margin-right: 10px;"></i>058-9948428<br><span style="margin-left: 25px;">055-8118758</span></li>
								<li><i class="fa fa-envelope" style="margin-right: 10px;"></i>listed.transport@yahoo.com<br><span style="margin-left: 25px;">listedgeneraltransport@gmail.com</span></li>
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