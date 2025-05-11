<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<title>Shop - Ecommerce Bootstrap Template</title>
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		<!--  End Header  -->			
<!-- Shop Product Area -->
        <div class="shop_page_area">
    <div class="container">
        <!-- Shop Bar -->
        <div class="shop_bar_tp fix mb-4">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="short_by_inner d-flex flex-wrap align-items-center">
                        <label class="me-2">Sort by:</label>
                        <form method="GET" id="sortForm" class="d-flex gap-2">
                            <select name="sort" onchange="document.getElementById('sortForm').submit()">
                                <option value="name_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'name_desc') ? 'selected' : '' ?>>Name Descending</option>
                                <option value="name_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'name_asc') ? 'selected' : '' ?>>Name Ascending</option>
                                <option value="date_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'date_desc') ? 'selected' : '' ?>>Date Descending</option>
                                <option value="date_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'date_asc') ? 'selected' : '' ?>>Date Ascending</option>
                                <option value="price_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') ? 'selected' : '' ?>>Price Descending</option>
                                <option value="price_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') ? 'selected' : '' ?>>Price Ascending</option>
                            </select>
                            <select name="limit" onchange="document.getElementById('sortForm').submit()">
                                <option value="8" <?= (isset($_GET['limit']) && $_GET['limit'] == '8') ? 'selected' : '' ?>>8</option>
                                <option value="12" <?= (isset($_GET['limit']) && $_GET['limit'] == '12') ? 'selected' : '' ?>>12</option>
                                <option value="30" <?= (isset($_GET['limit']) && $_GET['limit'] == '30') ? 'selected' : '' ?>>30</option>
                                <option value="all" <?= (isset($_GET['limit']) && $_GET['limit'] == 'all') ? 'selected' : '' ?>>ALL</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

			<!-- Shop Product Display -->
			<div class="shop_details text-center">
				<div class="product_grid">
					<?php
					include 'config.php';

					$sort = $_GET['sort'] ?? 'name_desc';
					$limit = $_GET['limit'] ?? 8;

					// Sorting Logic: Order by the most recent post
					switch ($sort) {
						case 'price_asc':
							$order_by = "ORDER BY price ASC"; // Sort by price ascending
							break;
						case 'price_desc':
							$order_by = "ORDER BY price DESC"; // Sort by price descending
							break;
						case 'date_asc':
							$order_by = "ORDER BY post_date ASC"; // Sort by date ascending
							break;
						case 'date_desc':
							$order_by = "ORDER BY post_date DESC"; // Sort by date descending
							break;
						case 'name_asc':
							$order_by = "ORDER BY title ASC"; // Sort by name ascending
							break;
						case 'name_desc':
						default:
							$order_by = "ORDER BY title DESC"; // Sort by name descending
							break;
					}

					// Pagination Logic
					$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
					$limit = 12; // Limit to 3 products per page
					$offset = ($page - 1) * $limit;

					// Query for fetching products with limit and offset
					$query = "SELECT * FROM post $order_by LIMIT $limit OFFSET $offset";
					$result = mysqli_query($conn, $query);

					// Check if the query executed successfully
					if (!$result) {
						echo "Error executing query: " . mysqli_error($conn);
					} else {
						while ($row = mysqli_fetch_assoc($result)) {
							$title = htmlspecialchars($row['title'] ?? 'Untitled');
							$price = htmlspecialchars($row['price'] ?? '0');
							$description = htmlspecialchars($row['description'] ?? 'No description available.');
							$image = !empty($row['post_img']) ?  $row['post_img'] : 'img/top-1.jpg';  
					?>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
							<div class="single_product">
								<div class="product_image">
									<img src="<?= $image ?>" alt="<?= $title ?>" class="img-fluid product-img" />
								</div>
								<div class="product_btm_text">
									<span class="product_category"><?= htmlspecialchars($row['category']) ?></span>
									<h4><a href="#"><?= $title ?></a></h4>
									<span class="price">$<?= $price ?></span>
									<p class="product_description"><?= $description ?></p>
									<a href="product-details.php?post_id=<?= $row['post_id'] ?>" class="read_more">Read More <i class="fa fa-arrow-right"></i></a>
									</div>
							</div>
						</div>
					<?php 
						}
					}
					?>
				</div>
			</div>

        <!-- Blog Pagination -->
        <div class="col-xs-12">
            <?php
            // Get total number of posts
            $total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM post");
            $total_row = mysqli_fetch_assoc($total_result);
            $total_posts = $total_row['total'];
            $total_pages = ceil($total_posts / $limit);  // Calculate total pages
            ?>

            <!-- Blog Pagination -->
            <?php if ($limit): ?>
            <div class="col-xs-12">
                <div class="blog_pagination pgntn_mrgntp fix">
                    <div class="pagination text-center">
                        <ul>
                            <?php if ($page > 1): ?>
                                <li><a href="?page=<?= $page - 1 ?>&sort=<?= $sort ?>&limit=<?= $limit ?>"><i class="fa fa-angle-left"></i></a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li><a href="?page=<?= $i ?>&sort=<?= $sort ?>&limit=<?= $limit ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>

                            <?php if ($page < $total_pages): ?>
                                <li><a href="?page=<?= $page + 1 ?>&sort=<?= $sort ?>&limit=<?= $limit ?>"><i class="fa fa-angle-right"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

    </div>
        </div>



<style>
/* Shop Container Layout */
.shop_page_area {
    margin-top: 50px;
}

/* Shop Product Display Row */
.shop_details .product_grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(300px, 1fr));
    gap: 20px;
    width: 100%;
}

/* PRODUCT CARD */
.single_product {
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease-in-out;
    height: 400px; /* Maintain the same fixed height */
    width: 300px; /* Ensure full width of grid cell */
}

/* Hover effect on product card */
.single_product:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.product_image {
    width: 100%;
    height: 160px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 8px;
    margin-bottom: 10px;
    background-color: #f1f5f9;
}

.product_image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

/* BOTTOM TEXT */
.product_btm_text {
    padding: 14px 16px;
    background-color: #f9fafb;
    text-align: left;
    border-top: 1px solid #e5e7eb;
    border-radius: 0 0 12px 12px;
}

.product_btm_text h4 {
    font-size: 18px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 6px;
    text-transform: capitalize;
}

.product_btm_text .price {
    font-size: 16px;
    font-weight: 600;
    color: #fb923c; /* Warm orange */
    margin-bottom: 8px;
}

.product_description {
    font-size: 14px;
    color: #6b7280;
    line-height: 1.5;
    margin-bottom: 10px;
    height: 42px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product_category {
    display: inline-block;
    background-color: #e0f2fe;
    color: #0284c7;
    font-size: 12px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 2px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

/* READ MORE */
.read_more {
    font-size: 13px;
    font-weight: 500;
    color: #0284c7;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: color 0.3s ease;
}

.read_more i {
    margin-left: 6px;
    transition: transform 0.3s ease;
}

.read_more:hover {
    color: #0369a1;
}

.read_more:hover i {
    transform: translateX(4px);
}

/* SORTING AND PAGINATION */
.short_by_inner {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.short_by_inner select {
    padding: 6px 10px;
    font-size: 14px;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    background-color: #f1f5f9;
    color: #1e293b;
}

/* Pagination */
.pagination ul {
    display: flex;
    justify-content: center;
    padding: 0;
    list-style: none;
}

.pagination ul li {
    margin: 0 5px;
}

.pagination ul li a {
    font-size: 16px;
    color: #334155;
    text-decoration: none;
    padding: 6px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    background-color: #f8fafc;
    transition: all 0.3s ease;
}

.pagination ul li a.active,
.pagination ul li a:hover {
    background-color: #fb923c;
    color: #fff;
    border-color: #fb923c;
}

/* Responsiveness for various screen sizes */

/* Two products per row on medium screens */
@media (max-width: 1200px) {
    .shop_details .row {
        grid-template-columns: repeat(2, minmax(300px, 1fr)); /* 2 items per row on medium screens */
    }
}

/* One product per row on smaller screens */
@media (max-width: 768px) {
    .shop_details .row {
        grid-template-columns: 1fr; /* 1 item per row on smaller screens */
    }
}
</style>

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
	</body>
</html>