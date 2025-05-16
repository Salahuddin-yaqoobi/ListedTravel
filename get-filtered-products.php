<?php
include "config.php";

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

$sql = "SELECT * FROM post WHERE 1=1";

if ($filter !== 'all') {
    $category = ($filter === 'sale') ? 'for sale' : 'for rent';
    $sql .= " AND LOWER(category) = LOWER('$category')";
}

$sql .= " ORDER BY post_id DESC LIMIT 8";
$result = mysqli_query($conn, $sql);

$products = array();

while ($row = mysqli_fetch_assoc($result)) {
    $cat_class = '';
    if (strtolower($row['category']) === 'for sale') {
        $cat_class = 'sale';
    } elseif (strtolower($row['category']) === 'for rent') {
        $cat_class = 'bslr';
    }
    
    $products[] = array(
        'post_id' => $row['post_id'],
        'title' => htmlspecialchars($row['title']),
        'post_img' => htmlspecialchars($row['post_img']),
        'price' => number_format($row['price'], 2),
        'cat_class' => $cat_class
    );
}

header('Content-Type: application/json');
echo json_encode($products);
?> 