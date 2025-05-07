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
    <li><a href="index.php" style="color: #ffffff; text-decoration: none; position: relative;">Home</a></li>
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
	<!--  End Header  -->

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
                        <div class="pd_price">
                            <span class="new">$ <?= htmlspecialchars($product['price']) ?></span>
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
	</body>
</html>