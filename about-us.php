<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us - Listed Transport</title>
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
					<a href="product.">For Sale</a>
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
							<li><a href="index.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">Home</a></li>
							<li><a href="rent.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">For Rent</a></li>
							<li><a href="product.php" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">For Sale</a></li>
							<li><a href="about-us.php" class="active" style="color: #1B3C73; text-decoration: none; font-weight: 600; font-size: 15px; text-transform: uppercase;">About Us</a></li>
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
		
		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>About Us</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="#">home</a></li>
							<li><span>About Us</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
	<!-- About Page -->
	
	<div class="about_page_area fix">
		<div class="container">
			<div class="row about_inner">
				<div class="about_img_area col-lg-6 col-md-12 col-xs-12">
					
					  <img src="img/logo.png" alt="Video Screenshot">
					
				</div>
				
				<div class="about_content_area col-lg-6  col-md-12 col-xs-12">
					<h2 style="color: #28425B;">Who we are</h2>
					<p style="color: black;" ><strong> LISTED CONSTRUCTION EQUIPMENT</strong><br>
						Offers complete range of equipment solutions with technically competent operations and maintenance team
						serving a wide range of infrastructure sectors like highways, power, telecom, real estate, ports, railways, airports,
						etc. under its Rental Services vertical. Being at the forefront of providing innovative solutions to the construction 
					   equipment industry, our aim is to become leading organized complete equipment solution provider. following the best
						practices of innovation, transparency and service excellence our aim is to partner the infrastructure industry by 
					   providing timely and innovative infrastructure equipment solutions thus reducing the risks and enhance profitability 
					   of our customers. <br><br>
					   <i style="color: black; font-weight:1000;"> Listed General Transport Equipment's Rental Services vertical is one of the upcoming organized equipment services
						provider which offers a bouquet of offerings for customers through: </i>
						<ul style="color: black;">
							<li><strong>></strong> Innovative equipment solutions</li>
							<li><strong>></strong> Extensive footprints across United Arab Emirates</li>
							<li><strong>></strong> Large variety of fleet across makes & models</li>
							<li><strong>></strong> Managing fleet equipment across business lines</li>
							<li><strong>></strong> High quality asset management capability</li>
							<li><strong>></strong> In depth knowledge and expertise in equipment rental and allied business</li>
					   
					</ul>
					</p>
				</div>
				
			</div>
			
			<div class="team_area">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">							
							<h2>Our <span>Products</span></h2>
							<div class="divider"></div>
						</div>
					</div>
				</div>	
				<style>
  					.our-team .team-content .title {
    					color: #E79C19;
    					transition: color 0.3s ease;
  					}

                </style>

				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="our-team">
							<div class="pic">
								<img src="category img on main/Bobcat S130-SKID-STEER LOADERS.png" alt="image of truck">
							</div>
							<div class="team-content">
								<h3 class="title">Bobcat S130</h3>
								<span class="post">SKID-STEER LOADERS</span>
								<ul class="social">
									<li><a href="https://www.facebook.com/listedgeneraltransport"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://www.instagram.com/listed_earthmoving/"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="our-team">
							<div class="pic">
								<img src="category img on main/Caterpillar 966H-WHEEL LOADER.png" alt="">
							</div>
							<div class="team-content">
								<h3 class="title">Caterpillar 966H</h3>
								<span class="post">WHEEL LOADER</span>
								<ul class="social">
									<li><a href="https://www.facebook.com/listedgeneraltransport"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://www.instagram.com/listed_earthmoving/"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- End Col -->				

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="our-team">
							<div class="pic">
								<img src="category img on main/Caterpillar CS533-ROAD ROLLERS.png" alt="">
							</div>
							<div class="team-content">
								<h3 class="title">Caterpillar CS533</h3>
								<span class="post">ROAD ROLLERS</span>
								<ul class="social">
									<li><a href="https://www.facebook.com/listedgeneraltransport"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://www.instagram.com/listed_earthmoving/"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- End Col -->			
					
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="our-team">
							<div class="pic">
								<img src="category img on main/JCB 4cx- Backhoe Loader.png" alt="">
							</div>
							<div class="team-content">
								<h3 class="title">JCB 4cx</h3>
								<span class="post">Backhoe Loader</span>
								<ul class="social">
									<li><a href="https://www.facebook.com/listedgeneraltransport"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://www.instagram.com/listed_earthmoving/"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- End Col -->
					
				</div>				
				
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
					<script>
						$(document).ready(function() {
							$('#contactForm').on('submit', function(e) {
								e.preventDefault();
								
								$.ajax({
									type: 'POST',
									url: 'contactform.php',
									data: $(this).serialize(),
									success: function(response) {
										Swal.fire({
											title: 'Success!',
											text: 'Thank you for your message. We will get back to you soon!',
											icon: 'success',
											confirmButtonText: 'OK'
										}).then((result) => {
											if (result.isConfirmed) {
												$('#contactForm')[0].reset();
											}
										});
									},
									error: function() {
										Swal.fire({
											title: 'Error!',
											text: 'Something went wrong. Please try again later.',
											icon: 'error',
											confirmButtonText: 'OK'
										});
									}
								});
							});
						});
					</script>
					<script>
						document.addEventListener('DOMContentLoaded', function() {
							try {
								const searchInput = document.getElementById('searchInput');
								const suggestionsContainer = document.getElementById('suggestions');
								
								if (!searchInput || !suggestionsContainer) {
									console.log('Search elements not found');
									return;
								}
						
								// Handle search submit
								const searchForm = document.getElementById('searchForm');
								if (searchForm) {
									searchForm.addEventListener('submit', async function(event) {
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
										}
									});
								}
						
								// Fetch suggestions on input
								searchInput.addEventListener('input', async function() {
									const query = this.value.trim();
						
									if (query.length === 0) {
										suggestionsContainer.innerHTML = '';
										suggestionsContainer.style.display = 'none';
										return;
									}
						
									try {
										const response = await fetch('get-suggestions.php?query=' + encodeURIComponent(query));
										const suggestions = await response.json();
						
										suggestionsContainer.innerHTML = '';
										if (suggestions.length > 0) {
											suggestionsContainer.style.display = 'block';
											suggestions.forEach(item => {
												const div = document.createElement('div');
												div.textContent = item.name;
												div.classList.add('suggestion-item');
												div.addEventListener('click', () => {
													window.location.href = 'product-details.php?post_id=' + item.post_id;
												});
												suggestionsContainer.appendChild(div);
											});
										} else {
											suggestionsContainer.style.display = 'none';
										}
									} catch (error) {
										console.error('Suggestion error:', error);
									}
								});
						
								// Hide suggestions when clicking outside
								document.addEventListener('click', function(event) {
									if (!searchInput.contains(event.target) && !suggestionsContainer.contains(event.target)) {
										suggestionsContainer.innerHTML = '';
										suggestionsContainer.style.display = 'none';
									}
								});
						
								// Toggle buttons functionality
								const toggleButtons = document.querySelectorAll('.toggle-btn');
								if (toggleButtons) {
									toggleButtons.forEach(button => {
										button.addEventListener('click', function() {
											toggleButtons.forEach(btn => {
												btn.classList.remove('active');
												btn.style.backgroundColor = 'transparent';
												btn.style.color = '#666';
											});
											
											this.classList.add('active');
											this.style.backgroundColor = '#FF6A18';
											this.style.color = 'white';
										});
									});
								}
							} catch (error) {
								console.error('Initialization error:', error);
							}
						});
						</script>
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
	</body>
</html>