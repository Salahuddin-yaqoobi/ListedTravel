<?php
include "config.php";

$sql = "SELECT COUNT(*) as count FROM blogs WHERE blog_location = 'main'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
echo json_encode(['count' => $row['count']]);
?>
