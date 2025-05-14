<?php
session_start();
include "config.php";

// Get specific blog based on ID
$blog_id = isset($_GET['id']) ? $_GET['id'] : 0;
$sql = "SELECT * FROM blogs WHERE blog_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $blog_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$blog = mysqli_fetch_assoc($result);

if (!$blog) {
    header("Location: " . APP_URL . "/index.php");
    exit();
}

// Get related blogs based on title similarity
$related_sql = "SELECT * FROM blogs 
                WHERE blog_id != ? 
                AND blog_title LIKE ? 
                LIMIT 3";
$stmt = mysqli_prepare($conn, $related_sql);
$title_pattern = "%" . substr($blog['blog_title'], 0, 5) . "%";
mysqli_stmt_bind_param($stmt, "is", $blog_id, $title_pattern);
mysqli_stmt_execute($stmt);
$related_blogs = mysqli_stmt_get_result($stmt);

// Get all blog categories (unique titles)
$categories_sql = "SELECT DISTINCT blog_title FROM blogs LIMIT 6";
$categories_result = mysqli_query($conn, $categories_sql);

// Get popular posts
$popular_sql = "SELECT * FROM blogs ORDER BY blog_id DESC LIMIT 3";
$popular_result = mysqli_query($conn, $popular_sql);
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog Details - listedtravel</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet"> 
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/owl.theme.default.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/meanmenu.min.css" />
	<link rel="stylesheet" href="css/venobox.css" />
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="css/font-awesome.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />	
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="css/responsive.css" />
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
            <a href="rent.php">For Rent</a>
            <a href="product.html">New for Sale</a>
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
                    <li><a href="rent.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">For Rent</a></li>
                    <li><a href="product.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">New for Sale</a></li>
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
  </style>
</header>
		<!--  End Header  -->
		
		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3><?php echo htmlspecialchars($blog['blog_title']); ?></h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="index.php">home</a></li>
							<li><a href="#">blogs</a></li>
							<li><span><?php echo htmlspecialchars($blog['blog_title']); ?></span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
				
		<!-- Blog Details Page -->
		<div id="blog_page_area">
			<div class="container">
				<div class="row">					
					<div class="col-md-8 col-xs-12">
						<!-- Single blog -->
						<div class="single_blog">								
							<div class="single_blog_img">
								<img src="uploads/<?php echo $blog['blog_img']; ?>" alt="<?php echo htmlspecialchars($blog['blog_title']); ?>" style="width: 100%; height: auto;">
							</div>
						
								<div class="blog_content">
									<h2 class="blog_title"><?php echo htmlspecialchars($blog['blog_title']); ?></h2>
									<div class="blog_meta">
										<span><i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($blog['blog_date'])); ?></span>
										<span><i class="fa fa-user"></i> Listed Travel</span>
									</div>
									<p class="blog_dtls_page"><?php echo nl2br(htmlspecialchars($blog['blog_description'])); ?></p>
								</div>							
						</div>		
						<!-- End Single blog -->
						
					</div>
				
					<!-- Blog Sidebar -->
					<div class="col-md-4 col-xs-12">							
						<div class="single_sidebar search_widget">
							<h3 class="sdbr_title">Search</h3>
							<div class="sdbr_inner">
								<form class="search_form" id="blogSearchForm">
									<div class="search_container">
										<input type="text" class="form-control search_input" id="blogSearchInput" placeholder="Search blogs...">
										<button type="submit" class="search_button"><i class="fa fa-search"></i></button>
										<div id="searchSuggestions" class="search-suggestions"></div>
									</div>
								</form>
							</div>
						</div>
						
						<div class="single_sidebar category">
							<h3 class="sdbr_title">categories</h3>
							<div class="sdbr_inner">
								<ul>
									<?php 
									$cat_sql = "SELECT DISTINCT blog_id, blog_title FROM blogs LIMIT 6";
									$cat_result = mysqli_query($conn, $cat_sql);
									while($category = mysqli_fetch_assoc($cat_result)) { ?>
										<li><a href="blog-details.php?id=<?php echo $category['blog_id']; ?>">
											<?php echo htmlspecialchars($category['blog_title']); ?>
										</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>

						<div class="single_sidebar popular_post">
							<h3 class="sdbr_title">popular post</h3>
							<div class="sdbr_inner">
								<?php while($popular = mysqli_fetch_assoc($popular_result)) { ?>
									<div class="single_popular_post fix">
										<a href="blog-details.php?id=<?php echo $popular['blog_id']; ?>" class="spp_img">
											<img src="uploads/<?php echo $popular['blog_img']; ?>" alt="">
										</a>
										<div class="spp_text fix">
											<a href="blog-details.php?id=<?php echo $popular['blog_id']; ?>">
												<?php echo htmlspecialchars($popular['blog_title']); ?>
											</a>
											<p>Posted on <?php echo date('d M Y', strtotime($popular['blog_date'])); ?></p>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
											
						<div class="single_sidebar tags fix">
							<h3 class="sdbr_title">tags</h3>
							<div class="sdbr_inner">
								<a href="#" style="background: #28425B; color: white;">Travel Tips</a>
								<a href="#" style="background: #28425B; color: white;">Equipment</a>
								<a href="#" style="background: #28425B; color: white;">Machinery</a>
								<a href="#" style="background: #28425B; color: white;">Construction</a>
								<a href="#" style="background: #28425B; color: white;">Industry News</a>
								<a href="#" style="background: #28425B; color: white;">Technology</a>
								<a href="#" style="background: #28425B; color: white;">Innovation</a>
								<a href="#" style="background: #28425B; color: white;">Safety</a>
							</div>
						</div>
					</div><!-- End Blog Sidebar -->
					
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
								<li><a href="about-us.html"><i class="fa fa-angle-right" style="margin-right: 10px;"></i>About Us</a></li>
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
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
							<p class="copyright_text text-center">&copy; 2025 All Rights Reserved listedtravel</p>
						</div>
						
						<div class="col-sm-4">
							<div class="payment_mthd_icon text-right">
								<ul>
                                <li><a href="https://www.facebook.com/listedgeneraltransport"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/listed_earthmoving/"><i class="fa fa-instagram"></i></a></li>
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
        <script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenuPanel = document.querySelector('.mobile-menu-panel');
    
    if (mobileMenuBtn && mobileMenuPanel) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenuPanel.classList.toggle('active');
        });
    }
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

		<style>
		.search_container {
			position: relative;
		}

		.search-suggestions {
			position: absolute;
			top: 100%;
			left: 0;
			right: 0;
			background: #ffffff;
			border: 1px solid #28425B;
			border-top: none;
			border-radius: 0 0 4px 4px;
			max-height: 200px;
			overflow-y: auto;
			z-index: 1000;
			box-shadow: 0 4px 6px rgba(0, 108, 85, 0.1);
		}

		.suggestion-item {
			padding: 10px 15px;
			cursor: pointer;
			border-bottom: 1px solid rgba(0, 108, 85, 0.1);
		}

		.suggestion-item:hover {
			background-color: rgba(0, 108, 85, 0.1);
		}

		.blog_title {
			font-size: 28px;
			margin-bottom: 15px;
			color: #28425B;
			font-weight: 600;
		}

		.blog_meta {
			margin-bottom: 20px;
			color: #7f8c8d;
		}

		.blog_meta span {
			margin-right: 15px;
		}

		.blog_meta i {
			margin-right: 5px;
		}

		.single_blog_img img {
			border-radius: 8px;
			margin-bottom: 20px;
		}

		/* Tag styling */
		.sdbr_inner a {
			display: inline-block;
			padding: 8px 15px;
			margin: 4px;
			border-radius: 20px;
			text-decoration: none;
			transition: all 0.3s ease;
		}

		.sdbr_inner a:hover {
			transform: translateY(-2px);
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		/* Search button styling */
		.search_button {
			background-color: #28425B;
			color: white;
			border: none;
			padding: 8px 15px;
			border-radius: 20px;
			cursor: pointer;
			transition: all 0.3s ease;
		}


		/* Search input styling */
		.search_input {
			border-radius: 25px;
			border: 1px solid #e0e0e0;
			padding: 10px 15px;
			transition: all 0.3s ease;
		}

		.search_input:focus {
			border-color:rgb(71, 118, 163);
			box-shadow: 0 0 0 2px rgba(0, 108, 85, 0.1);
		}

		.sdbr_title {
			color: #28425B;
			border-bottom: 2px solid #28425B;
			padding-bottom: 10px;
			margin-bottom: 20px;
		}

		.tags .sdbr_inner a {
			background: #28425B !important;
			color: white !important;
		}

		.tags .sdbr_inner a:hover {
			background:rgb(29, 51, 71) !important;
		}

		.single_blog .blog_title {
			color: #28425B;
			font-weight: 600;
		}

		.popular_post .spp_text a:hover,
		.category ul li a:hover {
			color: #28425B;
		}

		/* Owl Carousel area updates */
		#slider_area .owl-dot.active>span {
			background: #28425B;
			border: 1px solid #28425B;
		}

		#slider_area .owl-nav .owl-next,
		#slider_area .owl-nav .owl-prev {
			color: #28425B;
		}

		#slider_area .owl-nav .owl-next:hover,
		#slider_area .owl-nav .owl-prev:hover {
			border-color: #28425B;
			background: #28425B;
			color: #fff;
		}
		</style>

		<script>
		document.addEventListener('DOMContentLoaded', function() {
			const searchInput = document.getElementById('blogSearchInput');
			const suggestionsContainer = document.getElementById('searchSuggestions');
			const searchForm = document.getElementById('blogSearchForm');

			searchInput.addEventListener('input', async function() {
				const query = this.value.trim();
				
				if (query.length < 2) {
					suggestionsContainer.style.display = 'none';
					return;
				}

				try {
					const response = await fetch(`get-blog-suggestions.php?query=${encodeURIComponent(query)}`);
					const suggestions = await response.json();
					
					suggestionsContainer.innerHTML = '';
					
					if (suggestions.length > 0) {
						suggestions.forEach(blog => {
							const div = document.createElement('div');
							div.className = 'suggestion-item';
							div.textContent = blog.title;
							div.addEventListener('click', () => {
								window.location.href = `blog-details.php?id=${blog.id}`;
							});
							suggestionsContainer.appendChild(div);
						});
						suggestionsContainer.style.display = 'block';
					} else {
						suggestionsContainer.style.display = 'none';
					}
				} catch (error) {
					console.error('Error fetching suggestions:', error);
				}
			});

			// Hide suggestions when clicking outside
			document.addEventListener('click', function(e) {
				if (!searchInput.contains(e.target) && !suggestionsContainer.contains(e.target)) {
					suggestionsContainer.style.display = 'none';
				}
			});

			// Handle search form submission
			searchForm.addEventListener('submit', function(e) {
				e.preventDefault();
				const query = searchInput.value.trim();
				if (query) {
					window.location.href = `blog-search.php?q=${encodeURIComponent(query)}`;
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