<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>listedtravel - Ecommerce Bootstrap Template</title>
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
    <div class="nav-bar" style="background-color:#F3F4F6;  margin-left: 95px; margin-right: 95px; margin-bottom: 10px; border-radius: 10px;">
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

        /* .nav-bar a:hover {
            color: #ffffff !important;
        } */

        .nav-bar a::after {
    content: '';
    position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #1B3C73;
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