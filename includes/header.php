<?php
// Sigurohemi që sesioni është i nisur
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($baseUrl)) $baseUrl = '';
if (!defined('SITE_NAME')) define('SITE_NAME', 'Skincare Shop');

// Llogaritja e produkteve në shportë në mënyrë dinamike
$cartCount = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $cartCount += $quantity;
    }
}

// Kontrolli i Adminit
$isUserLoggedIn = isset($_SESSION['user_id']);
$isAdmin = (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin');
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | ' : ''; ?><?php echo SITE_NAME; ?></title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>style.css">

    <style>
        #navbar { display: flex; list-style: none; align-items: center; }
        #navbar li { padding: 0 20px; position: relative; }
        #navbar li a { text-decoration: none; font-weight: 600; color: #1a1a1a; transition: 0.3s; }
        #navbar li a.active, #navbar li a:hover { color: #088178; }
        
        .btn-header { background: #088178; color: white !important; padding: 10px 20px; border-radius: 4px; }
        
        .cart-count { 
            background: #e74c3c; 
            color: white; 
            padding: 1px 6px; 
            border-radius: 50%; 
            font-size: 11px; 
            position: absolute;
            top: -10px;
            right: 5px;
            font-weight: bold;
        }

        /* NDRYSHIMI KËTU: Ngjyra u bë #ffffff (e bardhë) */
        #header { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            padding: 20px 80px; 
            background: #ffffff; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.08); 
            position: sticky; 
            top: 0; 
            z-index: 999; 
        }

        .logo { width: 100px; height: auto; }
        .logout-link { color: #e74c3c !important; font-weight: bold; }
    </style>
</head>
<body>
<section id="header">
    <a href="<?php echo $baseUrl; ?>index.php"><img src="<?php echo $baseUrl; ?>images/skincare/logoja.jpg" class="logo" alt="Logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="<?php echo $baseUrl; ?>index.php" <?php echo ($currentPage ?? '') === 'home' ? 'class="active"' : ''; ?>>Home</a></li>
            <li><a href="<?php echo $baseUrl; ?>products.php" <?php echo ($currentPage ?? '') === 'products' ? 'class="active"' : ''; ?>>Shop</a></li>
            <li><a href="<?php echo $baseUrl; ?>news.php" <?php echo ($currentPage ?? '') === 'news' ? 'class="active"' : ''; ?>>News</a></li>
            <li><a href="<?php echo $baseUrl; ?>contact.php" <?php echo ($currentPage ?? '') === 'contact' ? 'class="active"' : ''; ?>>Contact</a></li>
            
            <?php if ($isUserLoggedIn): ?>
                <?php if ($isAdmin): ?>
                    <li><a href="<?php echo $baseUrl; ?>admin/products.php" class="btn-header">Admin</a></li>
                <?php endif; ?>
                <li><a href="<?php echo $baseUrl; ?>logout.php" class="logout-link">Dil</a></li>
            <?php else: ?>
                <li><a href="<?php echo $baseUrl; ?>login.php" class="btn-header">Login</a></li>
            <?php endif; ?>

            <li id="lg-bag">
                <a href="<?php echo $baseUrl; ?>cart.php" style="position: relative;">
                    <i class="fa-solid fa-basket-shopping" style="font-size: 20px; color: #1a1a1a;"></i>
                    <?php if ($cartCount > 0): ?>
                        <span class="cart-count"><?php echo $cartCount; ?></span>
                    <?php endif; ?>
                </a>
            </li>
        </ul>
    </div>
</section>