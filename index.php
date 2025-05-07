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
		<div class="preloader bg-white">
  <header class="bg-white border-b border-gray-200">
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
  </header>

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
		</div>

		
		<!--  Start Header  -->
<header id="header_area" style="background: linear-gradient(90deg, #003566, #00509d); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  <!-- Top Section: Logo, Search, Navigation -->
  <div style="display: flex; align-items: center; justify-content: space-between; padding: 16px 32px; flex-wrap: wrap; gap: 20px;">
    
    <!-- Logo -->
	<div style="flex-shrink: 0;">
      <a href="index.php" style="display: inline-block; padding: 6px 10px; border-radius: 8px; transition: all 0.3s ease;">
        <img src="img/logo.png" alt="Logo" style="height: 60px; filter: drop-shadow(0 0 10px rgba(255, 106, 24, 0.8)); transition: all 0.3s ease; animation: pulseGlow 1.5s infinite;">
      </a>
    </div>
<style>
  @keyframes pulseGlow {
    0% {
      filter: drop-shadow(0 0 10px rgba(255, 106, 24, 0.6));
    }
    50% {
      filter: drop-shadow(0 0 20px rgba(255, 106, 24, 1));
    }
    100% {
      filter: drop-shadow(0 0 10px rgba(255, 106, 24, 0.6));
    }
  }

  /* Hover effect to scale the logo */
  a:hover img {
    transform: scale(1.1);
    filter: drop-shadow(0 0 25px rgba(255, 106, 24, 1));
  }
</style>
    <!-- Search Bar -->
	<form id="searchForm" onsubmit="return handleSearch(event)" style="flex: 1; max-width: 600px;">
  <div style="position: relative;">
    <input 
      type="text" 
      id="searchInput"
      name="query"
      placeholder="Search for equipment..." 
      autocomplete="off"
      style="
        width: 100%; 
        padding: 10px 16px 10px 40px; 
        border: 1px solid #d1d5db; 
        border-radius: 9999px; 
        outline: none; 
        font-size: 16px;
        transition: all 0.3s ease;
        background-color: #ffffff; /* Ensure white background */
      "
      onfocus="this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.5)'; this.style.borderColor='transparent';"
      onblur="this.style.boxShadow='none'; this.style.borderColor='#d1d5db';"
    />
    
    <div id="suggestions" style="position: absolute; top: 100%; margin-top: 4px; left: 0; right: 0; background: white; border: 1px solid #d1d5db; border-top: none; max-height: 200px; overflow-y: auto; display: none;"></div>
    
    <!-- Search Icon -->
    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;">
      <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
      </svg>
    </div>
  </div>
</form>


 <!-- Navigation Menu -->
<nav style="flex-shrink: 0;">
  <ul style="display: flex; align-items: center; gap: 24px; margin: 0; padding: 0; list-style: none; font-weight: 600; font-size: 16px;">
    <li><a href="index.html" style="color: #ffffff; text-decoration: none; position: relative;">Home</a></li>
    <li><a href="rent.php" style="color: #ffffff; text-decoration: none; position: relative;">For Rent</a></li>
    <li><a href="shop.html" style="color: #ffffff; text-decoration: none; position: relative;">New for Sale</a></li>

    <!-- Uncomment for future use -->
    <!-- <li><a href="used-products.html" style="color: #ffffff; text-decoration: none; position: relative;">Used for Sale</a></li>
    <li><a href="admin.php" style="color: #ffffff; text-decoration: none; position: relative;">Admin Panel</a></li> -->

    <li><a href="contact.html" style="color: #ffffff; text-decoration: none; position: relative;">Contact</a></li>
  </ul>
</nav>

<style>
  /* Basic styles for the link */
  nav a {
    position: relative;
    color: #ffffff;
    text-decoration: none;
    display: inline-block;
  }

  /* Underline styles */
  nav a::after {
    content: '';
    position: absolute;
    bottom: -5px; /* Positioning it below the link */
    left: 50%; /* Start at the center */
    transform: translateX(-50%); /* Center it horizontally */
    width: 0; /* Initially the width is zero */
    height: 3px; /* Line thickness */
    background-color: #ffffff; /* Underline color */
    transition: width 0.3s ease, left 0.3s ease;
    border-radius: 5px; /* Rounded corners for the underline */
  }

  /* On hover, expand the underline to the full width of the element */
  nav a:hover::after {
    width: 100%; /* Expand the underline to full width */
  }
</style>
  </div>

  <!-- Suggestions Styling -->
  <style>
    #suggestions {
      position: absolute;
      top: 100%;
      margin-top: 4px;
      left: 0;
      right: 0;
      background: white;
      border: 1px solid #d1d5db;
      border-top: none;
      border-radius: 0 0 12px 12px;
      max-height: 200px;
      overflow-y: auto;
      display: none;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      z-index: 10;
      padding: 4px 0;
    }

    .suggestion-item {
      padding: 10px 16px;
      font-size: 16px;
      cursor: pointer;
      color: #374151;
      transition: background 0.2s, color 0.2s;
    }

    .suggestion-item:hover {
      background-color: #f3f4f6;
      color: #2563eb;
    }
  </style>
</header>

		
	<div id="dynamicContent">	
		<!-- Start Slider Area -->
<style>
	/* Professional slider text styling */
.slider_content p {
  color: #f0f0f0;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  margin-bottom: 10px;
}

.slider_content h1 {
  color: #003566 !important;
  font-size: 48px;
  font-weight: 700;
  text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
  margin-bottom: 10px;
}

.slider_content h4 {
  color: #f5f5f5;
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
  top: 50%;
  width: 100%;
  display: flex;
  justify-content: space-between;
  transform: translateY(-50%);
  pointer-events: none;
}

</style>
<section id="slider_area" class="text-center">
  <div class="slider_active owl-carousel">

    <div class="single_slide" style="background-image: url(img/top-1.jpg); background-size: cover; background-position: center; opacity: 1;">
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

    <div class="single_slide" style="background-image: url(img/Banner_image_-_english_3.jpg); background-size: cover; background-position: center ; opacity: 1;">
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

    <div class="single_slide" style="background-image: url(img/Banner_image_-_english_4.jpg); background-size: cover; background-position: center ; opacity: 1;">
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
</section>

		<!-- End Slider Area -->		
	
		<!--  Promo ITEM STRAT  -->
		<section id="promo_area" class="section_padding">
  <div class="container">
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
					$mysqli = new mysqli("localhost", "root", "", "news-site");
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
                            <a href="#"><i class="fa fa-search"></i></a>
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
							<p style="font-size: large;">Founded in 1978, Al Marwan has established itself as a trusted partner in the heavy equipment supply industry. We have introduced the region’s first e-commerce platform to better meet MENA’s growing demand for heavy equipment.</p>							
							<a href="product.html" class="btn main_btn">Explore</a>					
						</div>
					</div>
				</div>

			</div>
		</div> <!-- End Special Offer Area -->

		<!-- Start Featured product Area -->
		<section id="featured_product" class="featured_product_area section_padding">
			<div class="container">		
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">						
							<h2>Brand -  <span> new arrivals</span></h2>
							<div class="divider"></div>							
						</div>
					</div>
				</div>
<style>
	/* Ensure that all product blocks are of equal height and adjust according to image sizes */
.single_product {
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid #ddd;
    padding: 10px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Ensure images fit without distortion */
.product_image img {
    width: 100%;
    height: 200px; /* Set a fixed height for uniformity */
    object-fit: cover; /* Make sure the images cover the area without distortion */
    border-radius: 5px;
}

/* If you want to ensure consistent height for product items, you can adjust this */
.product_btm_text {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.p_rating i {
    color: #f39c12;
}

.price {
    font-size: 18px;
    color: #333;
}

/* Additional margin below each item */
.mb-4 {
    margin-bottom: 30px;
}

</style>
				<div class="container">
    <div class="row text-center d-flex flex-wrap justify-content-between">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="single_product">
                <div class="product_image">
                    <img src="img/featured-1.webp" alt=""/>
                    <div class="box-content">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>                                         
                </div>

                <div class="product_btm_text">
                    <h4><a href="#">Product Title</a></h4>
                    <span class="price">$123.00</span>
                </div>
            </div>                                
        </div> <!-- End Col -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="single_product">
                <div class="product_image">
                    <img src="img/featured-2.webp" alt=""/>
                    <div class="box-content">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>                                         
                </div>
            
                <div class="product_btm_text">                                         
                    <h4><a href="#">Product Title</a></h4>
                    <div class="p_rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>                                     
                    <span class="price">$123.00</span>
                </div>
            </div>
        </div> <!-- End Col -->
		
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="single_product">
                <div class="product_image">
                    <img src="img/all-1.webp" alt=""/>
                    <div class="box-content">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>                                         
                </div>
            
                <div class="product_btm_text">                                         
                    <h4><a href="#">Product Title</a></h4>
                    <div class="p_rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>                                     
                    <span class="price">$123.00</span>
                </div>
            </div>
        </div> <!-- End Col -->
		
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="single_product">
                <div class="product_image">
                    <img src="img/all-2.webp" alt=""/>
                    <div class="box-content">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>                                         
                </div>
            
                <div class="product_btm_text">                                         
                    <h4><a href="#">Product Title</a></h4>
                    <div class="p_rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>                                     
                    <span class="price">$123.00</span>
                </div>
            </div>
        </div> <!-- End Col -->
		

        <!-- Repeat the above block for all other products -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

			</div>
		</section>
		<!-- End Featured Products Area -->

		<!-- Testimonials Area -->
		<section id="testimonials" class="testimonials_area section_padding" style="background: url(img/cutomer.jpg); background-size: cover; background-attachment: fixed;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="testimonial-slider" class="owl-carousel">
							<div class="testimonial">
								<div class="pic">
									<img src="img/Nakheel.webp" alt="" style="width: 100%; height: 100%; object-fit: cover;">
								</div>
								<div class="testimonial-content">
									<p class="description">
										We're happy to have partnered with Al Marwan knowing they have the capacity to complete the project effectively....
									</p>
									<h3 class="testimonial-title">Nakheel</h3>
									<small class="post"> - Developer</small>
									<div class="p_rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>			
								</div>
							</div>
			 
							<div class="testimonial">
								<div class="pic">
									<img src="img/record-2.png" alt="">
								</div>
								<div class="testimonial-content">
									<p class="description">
										We appreciate the coordinated efforts of Al Marwan for the success and timely completion of this project....
									</p>
									<h3 class="testimonial-title">
										Hamriyah Freezone Authority</h3>
									<small class="post"> - Government</small>
									<div class="p_rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>	
								</div>
							</div>	 
							
							
							<div class="testimonial">
								<div class="pic">
									<img src="img/record-3.png" alt="">
								</div>
								<div class="testimonial-content">
									<p class="description">
										We are immensely proud to have worked with Al Marwan to bring this iconic hotel to life....
									</p>
									<h3 class="testimonial-title">DoubleTree by Hilton									</h3>
									<small class="post"> - Hotel</small>
									<div class="p_rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- End STestimonials Area -->		
	
				<!-- Special Offer Area -->
				<div class="special_offer_area gray_section" style="margin-top: 70px;">
					<div class="container">
						<div class="row">

							<div class="col-md-7 text-left">
								<div class="special_info">			
									<h1 style="margin-bottom: 15px; font-weight: bolder; font-size: x-large;">Pioneering Digital Machinery Solutions</h1>
									<p style="font-size: large;">Founded in 1978, Al Marwan has established itself as a trusted partner in the heavy equipment supply industry. We have introduced the region’s first e-commerce platform to better meet MENA’s growing demand for heavy equipment.</p>							
									<a href="#" class="btn main_btn">Explore</a>					
								</div>
							</div>
							<div class="col-md-5">
								<div class="special_img text-left">
									<img src="img/special-offer.webp" width="370" alt="" class="img-responsive">
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
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single_blog">
							<div class="single_blog_img">
								<img src="img/news-1.png" alt="">
							</div>
												
							<div class="blog_content">	
								<div class="date">
									<p style="color: #9BA5CD;">22 Apr, 2025 By <span style="color: #FF6A18; font-weight: bold;">Reef Halaseh</span></p>
								</div>
								<h4 class="post_title"><a href="#">20 Years of Kobelco and Al Marwan</a> </h4>						
								<p>A Legacy in the Making In the fast-
									evolving world of construction
									machinery, true partnerships stan...</p>
							</div>
						</div>
					</div> <!--  End Col -->				
					
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single_blog">
							<div class="single_blog_img">
								<img src="img/news-2.png" alt="">
							</div>
												
							<div class="blog_content">	
								<div class="date">
									<p style="color: #9BA5CD;">22 Apr, 2025 By <span style="color: #FF6A18; font-weight: bold;">Reef Halaseh</span></p>
								</div>
								<h4 class="post_title"><a href="#">20 Years of Kobelco and Al Marwan</a> </h4>						
								<p>A Legacy in the Making In the fast-
									evolving world of construction
									machinery, true partnerships stan...</p>
							</div>
						</div>
					</div> <!--  End Col -->				
					
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single_blog">
							<div class="single_blog_img">
								<img src="img/news-3.png" alt="">
							</div>
												
							<div class="blog_content">	
								<div class="date">
									<p style="color: #9BA5CD;">22 Apr, 2025 By <span style="color: #FF6A18; font-weight: bold;">Reef Halaseh</span></p>
								</div>
								<h4 class="post_title"><a href="#">20 Years of Kobelco and Al Marwan</a> </h4>						
								<p>A Legacy in the Making In the fast-
									evolving world of construction
									machinery, true partnerships stan...</p>
							</div>
						</div>
					</div> <!--  End Col -->

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
								<li>4060 Reppert Coal Road Jackson, MS 39201 USA</li>
								<li>(+123) 685 78 <br> (+064) 987 245</li>
								<li>Contact@yourcompany.com</li>
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
							<p class="copyright_text text-center">&copy; 2024 All Rights Reserved FancyShop</p>
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

</html>
			
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