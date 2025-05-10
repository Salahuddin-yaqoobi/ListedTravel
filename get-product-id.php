<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "travel");
if ($conn->connect_error) {
    echo json_encode(['success' => false]);
    exit;
}

$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
if ($query === '') {
    echo json_encode(['success' => false]);
    exit;
}

$sql = "SELECT post_id FROM post WHERE title LIKE ?";
$params = ['%' . $query . '%'];
$types = 's';

if ($category !== '') {
    $sql .= " AND category = ?";
    $params[] = $category;
    $types .= 's';
}

$sql .= " LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'post_id' => $row['post_id']]);
} else {
    echo json_encode(['success' => false]);
}
?>
