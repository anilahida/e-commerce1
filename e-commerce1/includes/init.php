<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/News.php';
require_once __DIR__ . '/../classes/Page.php';
require_once __DIR__ . '/../classes/Contact.php';

$db = new Database();
$userModel = new User($db);
$productModel = new Product($db);
$newsModel = new News($db);
$pageModel = new Page($db);
$contactModel = new Contact($db);

$currentUser = null;
if (!empty($_SESSION['user_id'])) {
    $currentUser = $userModel->findById($_SESSION['user_id']);
}
$isAdmin = $currentUser && ($currentUser['role'] ?? '') === 'admin';

function h($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}
