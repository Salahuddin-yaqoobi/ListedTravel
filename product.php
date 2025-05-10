<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet"/> 
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
  <title>Heavy Equipment Marketplace</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .product-card img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      aspect-ratio: 16/9;
      object-fit: cover;
    }
    .product-card .favorite-icon {
      float: right;
      font-size: 1.2em;
      color: #888;
      cursor: pointer;
    }
    .product-card .favorite-icon:hover {
      color: #e53e3e;
    }
    .for-sale-tag {
      background-color: #f0c300;
      color: #1a202c;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 0.75rem;
      display: inline-block;
      margin-top: 0.5rem;
      font-weight: 900;
      height: 20px;
    }
    .condition-tag {
      background-color: #48bb78;
      color: white;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 0.75rem;
      display: inline-block;
      margin-left: 0.5rem;
    }
    .condition-tag.used {
      background-color: #a0aec0;
    }
  </style>
</head>
<body class="bg-gray-100">
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

      

  <div class="w-full max-w-[1400px] mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Heavy Equipment Marketplace</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <!-- Filter Sidebar -->
      <aside class="md:col-span-1 bg-white p-4 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">Filters</h2>
        <form id="filterForm" method="GET" action="">
        <div class="space-y-4">
          <div>
                    <label class="block text-sm font-medium mb-1">Category</label>
                    <select name="category" class="w-full border p-2 rounded">
                        <option value="">All Categories</option>
                        <option value="For Sale" <?php echo (isset($_GET['category']) && $_GET['category'] == 'For Sale') ? 'selected' : ''; ?>>For Sale</option>
                        <option value="For Rent" <?php echo (isset($_GET['category']) && $_GET['category'] == 'For Rent') ? 'selected' : ''; ?>>For Rent</option>
            </select>
          </div>
                
          <div>
                    <label class="block text-sm font-medium mb-1">Vehicle Type</label>
                    <select name="vehicle_type" class="w-full border p-2 rounded">
                        <option value="">All Types</option>
                        <?php
                        include_once "config.php";
                        $type_sql = "SELECT * FROM vehicle_category";
                        $type_result = mysqli_query($conn, $type_sql);
                        if($type_result) {
                            while($type = mysqli_fetch_assoc($type_result)) {
                                $selected = (isset($_GET['vehicle_type']) && $_GET['vehicle_type'] == $type['category_id']) ? 'selected' : '';
                                echo "<option value='".$type['category_id']."' ".$selected.">".$type['category_name']."</option>";
                            }
                        }
                        ?>
            </select>
          </div>

          <div>
                    <label class="block text-sm font-medium mb-1">Price Range (AED)</label>
            <div class="flex gap-2">
                        <input type="number" name="min_price" placeholder="Min" class="w-1/2 border p-2 rounded" 
                               value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : ''; ?>" />
                        <input type="number" name="max_price" placeholder="Max" class="w-1/2 border p-2 rounded"
                               value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : ''; ?>" />
            </div>
          </div>

                <div class="space-y-2">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200 font-semibold">
                        Apply Filters
                    </button>
                    <a href="product.php" class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded hover:bg-gray-300 transition duration-200 font-semibold text-center block">
                        Clear Filters
                    </a>
                </div>
        </div>
        </form>
      </aside>

      <!-- Product Grid -->
      <section class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        include "config.php";
        
        $where_conditions = array();

        if(isset($_GET['category']) && !empty($_GET['category'])) {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $where_conditions[] = "p.category = '$category'";
        }

        if(isset($_GET['vehicle_type']) && !empty($_GET['vehicle_type'])) {
            $vehicle_type = mysqli_real_escape_string($conn, $_GET['vehicle_type']);
            $where_conditions[] = "p.vehicle_cat = '$vehicle_type'";
        }

        if(isset($_GET['min_price']) && !empty($_GET['min_price'])) {
            $min_price = mysqli_real_escape_string($conn, $_GET['min_price']);
            $where_conditions[] = "p.price >= '$min_price'";
        }

        if(isset($_GET['max_price']) && !empty($_GET['max_price'])) {
            $max_price = mysqli_real_escape_string($conn, $_GET['max_price']);
            $where_conditions[] = "p.price <= '$max_price'";
        }

        $where_clause = '';
        if(!empty($where_conditions)) {
            $where_clause = "WHERE " . implode(" AND ", $where_conditions);
        }

        $sql = "SELECT p.*, vc.category_name 
                FROM post p 
                LEFT JOIN vehicle_category vc ON p.vehicle_cat = vc.category_id 
                $where_clause 
                ORDER BY p.post_id DESC";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="bg-white rounded-lg shadow p-4 product-card">
                <img src="<?php echo $row['post_img']; ?>" alt="<?php echo $row['title']; ?>" />
            <div class="mt-2">
                    <span class="for-sale-tag"><?php echo $row['category']; ?></span>
                    <span class="condition-tag"><?php echo $row['category_name']; ?></span>
            </div>
                <h3 class="text-xlg font-semibold mt-2"><?php echo $row['title']; ?></h3>
                <p class="text-lg font-bold text-gray-900 mt-1">
                    AED <?php echo number_format($row['price']); ?>
                    <?php if($row['category'] == 'For Rent'): ?>
                        <span class="text-sm">/ <?php echo $row['duration']; ?></span>
                    <?php endif; ?>
                </p>
                <p class="text-md text-gray-500 mt-1 line-clamp-2"><?php echo $row['description']; ?></p>
                <a href="product-details.php?post_id=<?php echo $row['post_id']; ?>" class="text-blue-600 text-sm mt-2 inline-block font-bold">View Details</a>
            <span class="favorite-icon">&#9825;</span>
          </div>
        <?php 
            }
        } else {
            echo "<div class='text-center py-4'>No products found</div>";
        }
        ?>
      </section>
    </div>
  </div>
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

  <script>
    document.querySelectorAll('.favorite-icon').forEach(icon => {
      icon.addEventListener('click', function () {
        this.textContent = this.textContent === '♥' ? '♡' : '♥';
      });
    });
  </script>
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
