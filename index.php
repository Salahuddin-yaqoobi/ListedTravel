<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FancyShop - Ecommerce Bootstrap Template</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">	
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/owl.theme.default.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/meanmenu.min.css" />
	<link rel="stylesheet" href="css/venobox.css" />
	<link rel="stylesheet" href="css/font-awesome.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />	
	<link rel="stylesheet" href="style.css" />
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
	
		<!--  Preloader  -->
		
		<div class="preloader">
			<div class="status-mes">
				<div class="bigSqr">
					<div class="square first"></div>
					<div class="square second"></div>
					<div class="square third"></div>
					<div class="square fourth"></div>
				</div>
				<div class="text_loading text-center">loading</div>
			</div>
		</div>
		
		<!--  Start Header  -->
		<header id="header_area" style="background-color: #ffffff; border-bottom: 1px solid #e5e7eb;">
			<!-- Top Section: Logo, Search, Icons -->
			<div style="display: flex; align-items: center; justify-content: space-between; padding: 16px 32px;">
			  
			  <!-- Logo -->
			  <div>
				<a href="index.html">
				  <img src="img/logo.png" alt="Logo" style="height: 50px;">
				</a>
			  </div>
		  
			  <!-- Search Bar -->
			  <div style="flex: 1; max-width: 500px; margin: 0 32px;">
				<div style="position: relative;">
				  <input 
					type="text" 
					placeholder="Search for equipment..." 
					style="
					  width: 100%; 
					  padding: 10px 16px 10px 40px; 
					  border: 1px solid #d1d5db; 
					  border-radius: 9999px; 
					  outline: none; 
					  font-size: 16px;
					  transition: all 0.3s ease;
					"
					onfocus="this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.5)'; this.style.borderColor='transparent';"
					onblur="this.style.boxShadow='none'; this.style.borderColor='#d1d5db';"
				  />
				  <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;">
					<svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
					</svg>
				  </div>
				</div>
			  </div>
		  
			  <!-- Icons -->
			  <div style="display: flex; align-items: center; gap: 24px;">
				<a href="wishlist.html" style="position: relative; display: flex; align-items: center;">
				  <img src="img/heart.png" alt="Wishlist" style="height: 54px; width: 54px; object-fit: cover;">
				</a>
			  
				<a href="cart.html" style="position: relative; display: flex; align-items: center;">
				  <img src="img/cart.jpg" alt="Cart" style="height: 54px; width: 54px; object-fit: cover;">
				</a>
			  
				<a class="profile-btn" onclick="openSidebar()" style="position: relative; display: flex; align-items: center;">
				  <img src="img/contact.jpg" alt="User" style="height: 74px; width: 74px; border-radius: 50%; object-fit: cover;">
				</a>
			  
				<div id="sidebar" class="sidebar">
				  <button class="close-btn" onclick="closeSidebar()">×</button>
				  <h2>John Doe</h2>
			  
				  <div class="contact-item">
					<span>Email</span>
					<p>johndoe@example.com</p>
				  </div>
			  
				  <div class="contact-item">
					<span>Phone</span>
					<p>+1 234 567 8901</p>
				  </div>
			  
				  <div class="contact-item">
					<span>Address</span>
					<p>1234 Elm Street, NY, USA</p>
				  </div>
			  
				  <div class="contact-item">
					<span>Website</span>
					<p>www.johndoe.com</p>
				  </div>
				</div>
			  </div>
			  
			  
			  <!-- Sidebar (keep outside of flex div) -->
			  <div id="sidebar" class="sidebar">
				<button class="close-btn" onclick="closeSidebar()">×</button>
				<h2>John Doe</h2>
			  
				<div class="contact-item">
				  <span>Email</span>
				  <p>johndoe@example.com</p>
				</div>
			  
				<div class="contact-item">
				  <span>Phone</span>
				  <p>+1 234 567 8901</p>
				</div>
			  
				<div class="contact-item">
				  <span>Address</span>
				  <p>1234 Elm Street, NY, USA</p>
				</div>
			  
				<div class="contact-item">
				  <span>Website</span>
				  <p>www.johndoe.com</p>
				</div>
			  </div>
			  
			  </div>
		  
			</div>
		  
			<!-- Bottom Section: Navigation Menu -->
			<nav style="background-color: #f9fafb; border-top: 1px solid #e5e7eb;">
			  <ul style="display: flex; justify-content: center; align-items: center; gap: 40px; padding: 12px 0; margin: 0; list-style: none; font-weight: 500; font-size: 16px;">
				<li><a href="index.html" style="color: #111827; text-decoration: none;">Home</a></li>
				<li><a href="rent.php" style="color: #111827; text-decoration: none;">For Rent</a></li>
				<li><a href="shop.html" style="color: #111827; text-decoration: none;">New for Sale</a></li>
				<li><a href="used-products.html" style="color: #111827; text-decoration: none;">Used for Sale</a></li>
				<li><a href="admin.php" style="color: #111827; text-decoration: none;">Admin panel</a></li>
				<li><a href="#" onclick="openSidebar()" style="color: #111827; text-decoration: none;">Contact</a></li>
			  </ul>
			</nav>
		  </header>
		  
		<!--  End Header  -->
		
	<div id="dynamicContent">	
		<!-- Start Slider Area -->
		<section id="slider_area" class="text-center">
			<div class="slider_active owl-carousel">
				<div class="single_slide" style="background-image: url(img/top-1.jpg); background-size: cover; background-position: center; opacity: 1;">
					<div class="container">	
						<div class="single-slide-item-table">
							<div class="single-slide-item-tablecell">
								<div class="slider_content text-left slider-animated-1">						
									<p class="animated">Al marwan</p>
									<h1 class="animated">Koeblco distribution</h1>
									<h4 class="animated">Authorized dealer for Japanese tecnology, built to last</h4>
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
									<p class="animated">Al marwan</p>
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
									<p class="animated">Al marwan</p>
									<h1 class="animated">Low-hours used machinary</h1>
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
							<div class="single_promo">
								<img src="img/Adobe Express - file.webp" alt="">
								<div class="box-content">
									<h3 class="title">Rental</h3>
									<span class="post">2024 Collection</span>
								</div>
							</div>
						</a>						
					</div><!--  End Col -->						
					
					<div class="col-lg-4 col-md-6 col-sm-12">	
						<a href="#">
							<div class="single_promo">
								<img src="img/after-banner-2.webp" alt="">
								<div class="box-content">
									<h3 class="title">New for sale</h3>
									<span class="post">2024 Collection</span>
								</div>
							</div>	
						</a>	

						<a href="#">
							<div class="single_promo">
								<img src="img/after-banner-3.webp" alt="">
								<div class="box-content">
									<h3 class="title">Used for sale</h3>
									<span class="post">2024 Collection</span>
								</div>
							</div>	
						</a>	
						
					</div><!--  End Col -->					

					<div class="col-lg-4 col-md-6 col-sm-12">
						<a href="#">
							<div class="single_promo">
								<img src="img/after-banner-4.webp" alt="">
								<div class="box-content">
									<h3 class="title">New</h3>
									<span class="post">2024 Collection</span>
								</div>
							</div>
						</a>	
					</div><!--  End Col -->					
				
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
							<h2>Our <span>Products</span></h2>
							<div class="divider"></div>							
						</div>
					</div>
				</div>
			
				<div class="text-center">
					<div class="product_filter">
						<ul>
							<li class="active filter" data-filter="all">ALL</li>
							<li class="filter" data-filter=".sale">Sale</li>
							<li class="filter" data-filter=".bslr">Bestseller</li>
							<li class="filter" data-filter=".ftrd">Featured</li>
						</ul>
					</div>
					
					<div class="product_item">
						<div class="row">					
							<!-- Product 1 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix sale">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-1.webp" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="new_badge">New</div>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>										
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>
		
							<!-- Product 2 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix ftrd">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-2.webp" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="new_badge">New</div>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">										
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>											
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>
		
							<!-- Product 3 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-3.webp" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="new_badge">New</div>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>											
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>
		
							<!-- Product 4 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-4.webp" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>											
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>
		
							<!-- Product 5 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix ftrd">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-5.webp" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">										
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>											
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>
		
							<!-- Product 6 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-6.png" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>											
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>
		
							<!-- Product 7 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-7.webp" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>											
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>
		
							<!-- Product 8 -->
							<div class="col-lg-3 col-md-4 col-sm-6 mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/all-8.webp" alt="" style="width: 100%; height: 300px; object-fit: cover;" />
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>										
									</div>
									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i><i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>											
										<span class="price">$123.00</span>
									</div>
								</div>
							</div>					
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
							<span class="off_baudge text-center">30% <br /> Off</span>
						</div>
					</div>			

					<div class="col-md-7 text-left">
						<div class="special_info">			
							<h1 style="margin-bottom: 5px;">Pioneering Digital Machinery Solutions</h1>
							<p style="font-size: large;">Founded in 1978, Al Marwan has established itself as a trusted partner in the heavy equipment supply industry. We have introduced the region’s first e-commerce platform to better meet MENA’s growing demand for heavy equipment.</p>							
							<a href="#" class="btn main_btn">Explore</a>					
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

				<div class="row text-center">					
					<div class="col-lg-3 col-md-4 col-sm-6">
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

					<div class="col-lg-3 col-md-4 col-sm-6">
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

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/featured-3.webp" alt=""/>
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

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/featured-4.webp" alt=""/>
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

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/featured-5.webp" alt=""/>
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

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/featured-6.webp" alt=""/>
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

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/featured-7.webp" alt=""/>
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
					
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/featured-8.webp" alt=""/>
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
				</div>
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
									<h1 style="margin-bottom: 5px;">Pioneering Digital Machinery Solutions</h1>
									<p style="font-size: large;">Founded in 1978, Al Marwan has established itself as a trusted partner in the heavy equipment supply industry. We have introduced the region’s first e-commerce platform to better meet MENA’s growing demand for heavy equipment.</p>							
									<a href="#" class="btn main_btn">Explore</a>					
								</div>
							</div>
							<div class="col-md-5">
								<div class="special_img text-left">
									<img src="img/special-offer.webp" width="370" alt="" class="img-responsive">
									<span class="off_baudge text-center">30% <br /> Off</span>
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