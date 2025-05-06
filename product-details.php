<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>FancyShop - Ecommerce Bootstrap Template</title>
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
	</head>

	<body>

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
				<li><a href="index.php" style="color: #111827; text-decoration: none;">Home</a></li>
				<li><a href="rent.php" style="color: #111827; text-decoration: none;">For Rent</a></li>
				<li><a href="shop.html" style="color: #111827; text-decoration: none;">New for Sale</a></li>
				<li><a href="used-products.html" style="color: #111827; text-decoration: none;">Used for Sale</a></li>
				<li><a href="admin.php" style="color: #111827; text-decoration: none;">Admin panel</a></li>
				<li><a href="#" onclick="openSidebar()" style="color: #111827; text-decoration: none;">Contact</a></li>
			  </ul>
			</nav>
		  </header>
	<!--  End Header  -->
	

	<!-- Page item Area -->
	<div id="page_item_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-left">
					<h3>Product Details</h3>
				</div>		

				<div class="col-sm-6 text-right">
					<ul class="p_items">
						<li><a href="#">home</a></li>
						<li><a href="#">category</a></li>
						<li><span>Product Title</span></li>
					</ul>					
				</div>	
					
			
				
			</div>
		</div>
	</div>



	<?php
include('config.php');  // Include the database connection file

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


<!-- Product Details Area -->
<div class="prdct_dtls_page_area">
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
                        <div class="pd_price">
                            <span class="new">$ <?= htmlspecialchars($product['price']) ?></span>
                            <span class="old">(60.00)</span>
                        </div>
                     
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
  						<i class="fa fa-envelope" aria-hidden="true" style="color: #007bff; background: #e3f2fd; padding: 8px; border-radius: 50%; margin-right: 10px; box-shadow: 0 0 5px rgba(0,123,255,0.5);"></i>
  						<strong>contact@example.com</strong>
					</p>

					<p style="font-size: 16px; color: #333;">
					  	<i class="fa fa-map-marker" aria-hidden="true" style="color: #dc3545; background: #fdecea; padding: 8px; border-radius: 50%; margin-right: 10px; box-shadow: 0 0 5px rgba(220,53,69,0.5);"></i>
  						<strong>123 Street Name, City, Country</strong>
					</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Related Product Area -->
<div class="related_prdct_area text-center" style="padding: 50px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <!-- Section Title -->
        <div class="rp_title text-center">
            <h3 style="font-size: 30px; font-weight: bold; margin-bottom: 30px;">Related products</h3>
        </div>

        <div class="row" style="display: flex; flex-wrap: wrap; gap: 15px;">
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
                <span class="price" style="font-size: 15px; font-weight: bold; color: #1F92C1;">$ <?= htmlspecialchars($related_product['price']) ?></span>
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