<?php
session_start();


?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listed Travel</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet"> 
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

  <!-- Owl Carousel CSS + JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>
	<body>
	
	<!-- New Preloader (Skeleton Loader) -->
		<!-- <div class="preloader bg-white">
  <!-- <header class="bg-white border-b border-gray-200">
    <div class="flex items-center justify-between p-4">
      <div class="animate-pulse">
        <div class="h-12 w-32 bg-gray-300 rounded"></div>
      </div>
      <form class="flex-1 max-w-md mx-8">
        <div class="relative">
          <input type="text" class="w-full h-10 bg-gray-300 rounded-full pl-10" aria-label="Search input" />
          <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
            <div class="h-5 w-5 bg-gray-300 rounded-full"></div>
          </div>
        </div>
      </form>
      <div class="flex items-center gap-6">
        <div class="animate-pulse h-14 w-14 bg-gray-300 rounded-full"></div>
        <div class="animate-pulse h-14 w-14 bg-gray-300 rounded-full"></div>
        <div class="animate-pulse h-16 w-16 bg-gray-300 rounded-full"></div>
      </div>
    </div>
    <nav class="bg-gray-100 border-t border-gray-200">
      <ul class="flex justify-center items-center gap-10 py-3">
        <li class="animate-pulse h-6 w-20 bg-gray-300 rounded"></li>
        <li class="animate-pulse h-6 w-20 bg-gray-300 rounded"></li>
        <li class="animate-pulse h-6 w-20 bg-gray-300 rounded"></li>
        <li class="animate-pulse h-6 w-20 bg-gray-300 rounded"></li>
        <li class="animate-pulse h-6 w-20 bg-gray-300 rounded"></li>
        <li class="animate-pulse h-6 w-20 bg-gray-300 rounded"></li>
      </ul>
    </nav>
  </header> -->
<!-- 
  <div id="dynamicContent">
    <section id="slider_area" class="text-center p-4 flex gap-4 justify-center">
      <div class="animate-pulse h-64 w-64 bg-gray-300 rounded"></div>
      <div class="animate-pulse h-64 w-64 bg-gray-300 rounded"></div>
      <div class="animate-pulse h-64 w-64 bg-gray-300 rounded"></div>
    </section>

    <section id="promo_area" class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="animate-pulse h-48 bg-gray-300 rounded"></div>
      <div class="space-y-4">
        <div class="animate-pulse h-48 bg-gray-300 rounded"></div>
        <div class="animate-pulse h-48 bg-gray-300 rounded"></div>
      </div>
      <div class="animate-pulse h-48 bg-gray-300 rounded"></div>
    </section>
  </div>
		</div> --> 

		
		<!--  Start Header  -->
<header id="header_area">
    <!-- Top Bar with Logo, Search, and Icons -->
    <div class="top-bar" style="background-color:#F3F4F6; padding: 15px 0;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;">
    <!-- Logo -->
                <div class="logo-container" style="flex: 0 0 200px;">
                    <a href="index.php">
                        <img src="img/logo.png" alt="Listed General Transport" style="max-width: 200px; height: auto;">
      </a>
    </div>

    <!-- Updated Search Bar with new icon color -->
                <div class="search-container" style="flex: 1;">
                    <form id="searchForm" onsubmit="return handleSearch(event)">
                        <div style="position: relative;">
                            <input 
                                type="text" 
                                id="searchInput"
                                placeholder="Search for equipment..." 
                                style="
                                    width: 100%; 
                                    padding: 10px 45px 10px 20px;
                                    border: 1px solid #f39c12;
                                    border-radius: 5px;
                                    background: #ffffff;
                                    font-size: 14px;
                                    height: 42px;
                                "
                            >
                            <button type="button" 
                                onclick="document.getElementById('searchInput').focus();"
                                style="
                                    position: absolute;
                                    right: 10px;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    background: none;
                                    border: none;
                                    color: #f39c12;
                                    cursor: pointer;
                                "
                            >
                                <i class="fa fa-search"></i>
                            </button>
                            <div id="suggestions" style="
                                position: absolute;
                                top: 100%;
                                left: 0;
                                right: 0;
                                background: #ffffff;
                                border: 1px solid #f39c12;
                                border-top: none;
                                border-radius: 0 0 5px 5px;
                                max-height: 200px;
                                overflow-y: auto;
                                z-index: 1000;
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
  </div>
        </div>
    </div>

 <!-- Navigation Menu with centered container -->
    <div class="nav-bar" style="background: linear-gradient(to right, #f39c12, #e67e22); box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-left: 95px; margin-right: 95px; margin-bottom: 10px; border-radius: 10px;">
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
                    <li><a href="product.html" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">New for Sale</a></li>
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
            color: #ffffff !important;
        }

        .nav-bar a::after {
    content: '';
    position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #ffffff;
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
  </style>
</header>

		
	<div id="dynamicContent">	
		<!-- Start Slider Area -->
<style>
	/* Professional slider text styling */
.slider_content p {
  color: #1D576F;
  font-size: 18px;
  font-weight: 600;
  letter-spacing: 1px;
  margin-bottom: 10px;
  text-shadow: 0 0 1px black;
  
}

.slider_content h1 {
  color: #003566 !important;
  font-size: 48px;
  font-weight: 700;
  text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
  margin-bottom: 10px;
}

.slider_content h4 {
  color: #0084BD;
  font-size: 20px;
  font-weight: 400;
  margin-bottom: 25px;


}

.exploreInventoryBtn.btn.main_btn {
  background-color: #003566 !important;
  color: #ffffff !important;
  padding: 12px 30px;
  border-radius: 25px;
  font-weight: 600;
  font-size: 16px;
  text-decoration: none;
  display: inline-block;
  transition: all 0.3s ease;
  border: 2px solid transparent;
}

.exploreInventoryBtn.btn.main_btn:hover {
  background-color: #ffffff !important;
  color: #003566 !important;
  border: 2px solid #003566 !important;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.owl-dots .owl-dot span {
  width: 12px;
  height: 12px;
  background: #ccc !important;
  display: block;
  border-radius: 50%;
  margin: 5px;
  transition: background 0.3s ease;
}

.owl-dots .owl-dot.active span {
  background: #003566 !important; /* Your brand blue */
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.25);
  transform: scale(1.2);
}

.owl-dots .owl-dot:hover span {
  background: #003566 !important;
}

.owl-nav {
  position: absolute;
  display: none !important;
  top: 50%;
  width: 100%;
  display: flex;
  justify-content: space-between;
  transform: translateY(-50%);
  pointer-events: none;
}

</style>
<section id="slider_area" class="text-center" style="border-radius: 20px; overflow: hidden; margin-top:30px;">
  <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
    <div class="slider_active owl-carousel" >

      <div class="single_slide" style="border-radius: 20px; background-image: url(img/top-1.jpg); background-size: cover; background-position: center; opacity: 1;">
        <div class="container">  
          <div class="single-slide-item-table">
            <div class="single-slide-item-tablecell">
              <div class="slider_content text-left slider-animated-1">           
                <p class="animated">Listed Travel</p>
                <h1 class="animated">Koeblco distribution</h1>
                <h4 class="animated">Authorized dealer for Japanese technology, built to last</h4>
                <a href="product.html" class="exploreInventoryBtn btn main_btn animated">Explore inventory</a>
              </div>
            </div>
          </div>            
        </div>
      </div>

      <div class="single_slide" style="border-radius: 20px; background-image: url(img/Banner_image_-_english_3.jpg); background-size: cover; background-position: center ; opacity: 1;">
        <div class="container">    
          <div class="single-slide-item-table">
            <div class="single-slide-item-tablecell">
              <div class="slider_content text-center slider-animated-2">           
                <p class="animated">Listed Travel</p>
                <h1 class="animated">Skip the upfront cost</h1>
                <h4 class="animated">Discover equipment rentals with certified operators</h4>
                <a href="product.html" class="exploreInventoryBtn btn main_btn animated">Browse inventory</a>
              </div>
            </div>
          </div>  
        </div>
      </div>

      <div class="single_slide" style="border-radius: 20px; background-image: url(img/Banner_image_-_english_4.jpg); background-size: cover; background-position: center ; opacity: 1;">
        <div class="container">
          <div class="single-slide-item-table">
            <div class="single-slide-item-tablecell">
              <div class="slider_content text-right slider-animated-3">           
                <p class="animated">Listed Travel</p>
                <h1 class="animated">Low-hours used machinery</h1>
                <h4 class="animated">Trusted brands. Top quality. Well-maintained.</h4>
                <a href="product.html" class="exploreInventoryBtn btn main_btn animated">Browse inventory</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

		<!-- End Slider Area -->		
	
		<!--  Promo ITEM STRAT  -->
		<section id="promo_area" class="section_padding">
  <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <a href="#">
          <div class="single_promo" style="border-radius: 10px; overflow: hidden; position: relative; background-color: #003566; color: #ffffff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <img src="img/Adobe Express - file.webp" alt="" style="width: 100%; height: auto;">
            <div class="box-content" style="position: absolute; bottom: 20px; left: 20px; color: #ffffff; z-index: 10;">
              <h3 class="title" style="background-color: #003566; border-radius: 10px; font: bolder; font-weight: 900;">Rental</h3>
              <span class="post">2024 Collection</span>
            </div>
          </div>
        </a>
      </div><!-- End Col -->

      <div class="col-lg-4 col-md-6 col-sm-12">
        <a href="#">
          <div class="single_promo" style="border-radius: 10px; overflow: hidden; position: relative; background-color: #003566; color: #ffffff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <img src="img/after-banner-2.webp" alt="" style="width: 100%; height: auto;">
            <div class="box-content" style="position: absolute; bottom: 20px; left: 20px; color: #ffffff; z-index: 10;">
              <h3 class="title" style="background-color: #003566; border-radius: 10px; font: bolder; font-weight: 900;">New for sale</h3>
              <span class="post">2024 Collection</span>
            </div>
          </div>
        </a>

        <a href="#">
          <div class="single_promo" style="border-radius: 10px; overflow: hidden; position: relative; background-color: #003566; color: #ffffff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <img src="img/after-banner-3.webp" alt="" style="width: 100%; height: auto;">
            <div class="box-content" style="position: absolute; bottom: 20px; left: 20px; color: #ffffff; z-index: 10;">
              <h3 class="title" style="background-color: #003566; border-radius: 10px; font: bolder; font-weight: 900;">Used for sale</h3>
              <span class="post">2024 Collection</span>
            </div>
          </div>
        </a>
      </div><!-- End Col -->

      <div class="col-lg-4 col-md-6 col-sm-12">
        <a href="#">
          <div class="single_promo" style="border-radius: 10px; overflow: hidden; position: relative; background-color: #003566; color: #ffffff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <img src="img/after-banner-4.webp" alt="" style="width: 100%; height: auto;">
            <div class="box-content" style="position: absolute; bottom: 20px; left: 20px; color: #ffffff; z-index: 10;">
              <h3 class="title" style="background-color: #003566; border-radius: 10px; font: bolder; font-weight: 900;">New</h3>
              <span class="post">2024 Collection</span>
            </div>
          </div>
        </a>
      </div><!-- End Col -->
    </div>
  </div>
</section>
		<!--  Promo ITEM END -->	
		<!-- Start product Area -->
		<section id="product_area" class="section_padding">
			<div class="container">		
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">						
							<h2>Our <span style="color: #003566;">Products</span></h2>
							<div class="divider"></div>							
						</div>
					</div>
				</div>
			
				<?php
					ini_set('display_errors', 1);
					error_reporting(E_ALL);

					// Database connection
					$mysqli = new mysqli("localhost", "root", "", "travel");
                     if ($mysqli->connect_errno) {
					    die("Connection failed: " . $mysqli->connect_error);
					}
					?>

				<div class="text-center">
    <div class="product_filter text-center">
        <ul>
            <li class="active filter" data-filter="all">ALL</li>
            <li class="filter" data-filter="sale">Sale</li>
            <li class="filter" data-filter="bslr">Rent</li>
        </ul>
    </div>

    <div class="product_item">
        <div class="row" id="product-container">
            <?php
            $sql = "SELECT * FROM post ORDER BY post_id DESC LIMIT 8";
            $result = $mysqli->query($sql);

            while ($row = $result->fetch_assoc()):
                $cat_class = '';
                if (strtolower($row['category']) === 'for sale') {
                    $cat_class = 'sale';
                } elseif (strtolower($row['category']) === 'for rent') {
                    $cat_class = 'bslr';
                }
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 product-item <?= $cat_class ?> mb-4">
                <div class="single_product">
                    <div class="product_image">
                        <img src="<?= htmlspecialchars($row['post_img']) ?>" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
                        <div class="box-content">
                            <a href="#"><i class="fa fa-heart-o"></i></a>
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                        </div>
                    </div>
                    <div class="product_btm_text">
                        <h4><a href="#"><?= htmlspecialchars($row['title']) ?></a></h4>
                        <div class="p_rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="price">$<?= number_format($row['price'], 2) ?></span>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
				</div>
			</div>
		</section>
		
		<!-- End product Area -->

		<!-- Special Offer Area -->
		<div class="special_offer_area gray_section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="special_img text-left">
							<img src="img/single-1.webp" width="370" alt="" class="img-responsive">
						</div>
					</div>			

					<div class="col-md-7 text-left">
						<div class="special_info">			
							<h1 style="margin-bottom: 15px; font-weight: bolder; font-size: x-large;">Pioneering Digital Machinery Solutions</h1>
							<p style="font-size: large;">Founded in 1978, Al Marwan has established itself as a trusted partner in the heavy equipment supply industry. We have introduced the region's first e-commerce platform to better meet MENA's growing demand for heavy equipment.</p>							
							<a href="product.html" class="btn main_btn">Explore</a>					
								</div>
							</div>
						</div>
		
					</div>
				</div> <!-- End Special Offer Area -->

        <!--  Blog -->
        <section id="blog_area" class="section_padding">
            <div class="container">	
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">							
							<h2>latest <span>news and updates</span></h2>
							<div class="divider"></div>
						</div>
					</div>
				</div>			
				
				<div class="row">
					<?php
					// Include database connection
					include "config.php";
					
					// Fetch 3 most recent blogs with 'main' location
					$sql = "SELECT * FROM blogs WHERE blog_location = 'main' ORDER BY blog_date DESC LIMIT 3";
					$result = mysqli_query($conn, $sql);
					
					if(mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							// Limit description to 100 characters
							$short_desc = strlen($row['blog_description']) > 100 ? 
										substr($row['blog_description'], 0, 100) . '...' : 
										$row['blog_description'];
					?>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single_blog">
							<div class="single_blog_img">
								<img src="uploads/<?php echo $row['blog_img']; ?>" alt="<?php echo $row['blog_title']; ?>">
							</div>
													
							<div class="blog_content">	
								<div class="date">
									<p style="color: #9BA5CD;">
										<?php echo date('d M, Y', strtotime($row['blog_date'])); ?> 
										By <span style="color: #FF6A18; font-weight: bold;">Listed Travel</span>
									</p>
								</div>
								<h4 class="post_title">
									<a href="blog.php?id=<?php echo $row['blog_id']; ?>">
										<?php echo $row['blog_title']; ?>
									</a>
								</h4>						
								<p><?php echo $short_desc; ?></p>
								<a href="blog.php?id=<?php echo $row['blog_id']; ?>" class="read_more" style="color: #003566; font-weight: bold;">
									Read More <i class="fa fa-arrow-right"></i>
								</a>
							</div>
						</div>
					</div> <!--  End Col -->
					<?php
						}
					} else {
						echo "<div class='col-12 text-center'><p>No blogs found</p></div>";
					}
					?>
				</div>
            </div>
        </section>
        <!--  Blog end -->
		
		
        <!--  Process -->
		<section class="process_area section_padding gradient_section">
			<div class="container">
				<div class="row text-center" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
					<div class="col-lg-3 col-md-6 col-sm-6" style="flex: 1 1 250px; max-width: 300px;">
						<div class="single-process" style="height: 350px; border: 1px solid #ccc; padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
							<img src="img/diamond.png" alt="" style="width: 60px; margin-bottom: 15px;">
							<div class="process_content">
								<h3 style="font-weight: 1000;">Great values</h3>
								<p>Competitively priced, top-condition equipment from reputable manufacturers.</p>
							</div>
						</div>
					</div>
		
					<div class="col-lg-3 col-md-6 col-sm-6" style="flex: 1 1 250px; max-width: 300px;">
						<div class="single-process" style="height: 350px; border: 1px solid #ccc; padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
							<img src="img/credit-card.png" alt="" style="width: 60px; margin-bottom: 15px;">
							<div class="process_content">
								<h3 style="font-weight: 1000;">Safe Transaction</h3>
								<p>100% secure payment options with worldwide support</p>
							</div>
						</div>
					</div>
		
					<div class="col-lg-3 col-md-6 col-sm-6" style="flex: 1 1 250px; max-width: 300px;">
						<div class="single-process" style="height: 350px; border: 1px solid #ccc; padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
							<img src="img/medal-1.png" alt="" style="width: 60px; margin-bottom: 15px;">
							<div class="process_content">
								<h3 style="font-weight: 1000;">Trusted Quality</h3>
								<p>A wide range of heavy equipment in stock,</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
        <!--  End Process -->

		<section class="customers-header">
			<div class="container">
				<div class="section-heading">
					<span class="subtitle">OUR CUSTOMERS</span>
					<h2 class="title">Satisfied customers we are proud of</h2>
				</div>
			</div>
		</section>
		

        <!--  Brand -->
		<section id="brand_area" class="text-center" style="padding: 40px 0;">
			<div class="container">					
				<div class="row">
					<div class="col-sm-12">
						<div class="brand_slide owl-carousel">
							<div class="item text-center">
								<a href="#"><img src="img/clients/ACTCO.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/AD_Ports.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Al_Faris.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Al_Jaber.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Al_Jada.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Al_Rajhi.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Applied_Tech.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Arada.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/AST.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/AUS.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/CCECC.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/dozers.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Dubai_Municipality.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Dynapac_Logo.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Gov_Dubai.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Gov_Sharjah.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/Gulf_Rock.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/GUNAL.webp" alt="" class="brand-img" /></a>
							</div>
							<div class="item text-center">
								<a href="#"><img src="img/clients/HEC.webp" alt="" class="brand-img" /></a>
							</div>
						</div>
						<div class="brand-scroll-indicator text-center mt-3">
							<span class="dot active"></span>
							<span class="dot"></span>
							<span class="dot"></span>
							<span class="dot"></span>
							<span class="dot"></span>
							<span class="dot"></span>
						  </div>
						  
					</div>
				</div>
			</div>        
		</section>
			  
        <!--   Brand end  -->	
	</div>
		<!--  FOOTER START  -->
		<footer class="footer_area">
			<div class="container">
				<div class="row">				
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Contacts</h4>
							<ul>
								<li>Jarn Yafour, Mafraq Industrial AreaAbu Dhabi, UAE</li>
								<li>058-9948428 <br> 055-8118758</li>
								<li>listed.transport@yahoo.com <br> listedgeneraltransport@gmail.com </li>
							</ul>
						</div>
					</div> <!--  End Col -->
					
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
					</div> <!--  End Col -->
					
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Services</h4>
							<ul>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Site Map</a></li>
								<li><a href="#">Wish List</a></li>
								<li><a href="#">My Account</a></li>
								<li><a href="#">Order History</a></li>
							</ul>
						</div>
					</div> <!--  End Col -->	
					
					<div class="col-md-3 col-sm-6">
						<div class="single_ftr">
							<h4 class="sf_title">Newsletter</h4>
							<div class="newsletter_form">
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have </p>
								<form method="post" class="form-inline">				
									<input name="EMAIL" id="email" placeholder="Enter Your Email" class="form-control" type="email">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</form>
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
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<p class="copyright_text text-center">&copy; 2024 All Rights Reserved listedtravel</p>
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

<!-- End of website -->
</body>
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




document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll('.product_filter .filter');
    const allItems = document.querySelectorAll('.product-item');
    
    // Initially, show all items
    allItems.forEach(item => item.classList.add('visible'));
    
    filterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');
            
            // Set the active class on the clicked filter
            filterButtons.forEach(function(el) {
                el.classList.remove('active');
            });
            this.classList.add('active');
            
            // Animate items based on the selected category
            allItems.forEach(function(item) {
                if (filterValue === 'all') {
                    item.classList.remove('hidden');
                    item.classList.add('visible');
                } else {
                    if (item.classList.contains(filterValue)) {
                        item.classList.remove('hidden');
                        item.classList.add('visible');
                    } else {
                        item.classList.remove('visible');
                        item.classList.add('hidden');
                    }
                }
            });
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
