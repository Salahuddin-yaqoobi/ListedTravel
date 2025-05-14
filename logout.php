<?php 
include "config.php";
session_start();

session_unset();   //it remove the values which we have added in it

session_destroy();

header("Location: " . APP_URL . "/");

?>
