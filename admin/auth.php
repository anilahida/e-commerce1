<?php
session_start();
require_once __DIR__ . '/../includes/init.php';

// Kjo rresht të bën Admin automatikisht pa pasur nevojë për Login
$isAdmin = true;
$_SESSION['user_id'] = 1; 

$baseUrl = '../'; 
// Kemi hequr kontrollin që të dërgon te login.php
?>