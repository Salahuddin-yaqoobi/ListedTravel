<?php
include "config.php";

$query = isset($_GET['query']) ? trim($_GET['query']) : '';
if ($query === '') {
    echo json_encode([]);
    exit;
}

$stmt = $conn->prepare("SELECT post_id, title FROM post WHERE title LIKE ? LIMIT 5");
$search = '%' . $query . '%';
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

$suggestions = [];
while ($row = $result->fetch_assoc()) {
    $suggestions[] = [
        'name' => $row['title'],
        'post_id' => $row['post_id']
    ];
}

echo json_encode($suggestions);
?>
