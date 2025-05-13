<?php
include "config.php";

if (isset($_GET['query'])) {
    $search = mysqli_real_escape_string($conn, $_GET['query']);
    
    $sql = "SELECT blog_id, blog_title FROM blogs 
            WHERE blog_title LIKE ?
            LIMIT 5";
            
    $stmt = mysqli_prepare($conn, $sql);
    $searchParam = "%" . $search . "%";
    mysqli_stmt_bind_param($stmt, "s", $searchParam);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $suggestions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = array(
            'id' => $row['blog_id'],
            'title' => $row['blog_title']
        );
    }
    
    header('Content-Type: application/json');
    echo json_encode($suggestions);
}
?>
