<?php
  include "config.php";
  if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql ="DELETE FROM user WHERE user_id = {$user_id}";
    if(mysqli_query($conn , $sql)){
        header("Location: " . APP_URL . "/admin/users.php");
    }
    else{
        echo "<p>Query failed</p>";
    }
  }
?>