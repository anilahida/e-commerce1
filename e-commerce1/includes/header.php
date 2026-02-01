<?php
if (!isset($baseUrl)) $baseUrl = '';
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? h($pageTitle) . ' | ' : ''; ?><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>style.css">
</head>
<body>
<section id="header">
    <a href="<?php echo $baseUrl; ?>index.php"><img src="<?php echo $baseUrl; ?>images/skincare/logoja.jpg" class="logo" alt="Logo"></a>
    <div>
        <ul id="navbar">
            <li><i id="close" class="fas fa-times" aria-hidden="true"></i></li>
            <li><a href="<?php echo $baseUrl; ?>index.php" <?php echo ($currentPage ?? '') === 'home' ? 'class="active"' : ''; ?>>Home</a></li>
            <li><a href="<?php echo $baseUrl; ?>about.php" <?php echo ($currentPage ?? '') === 'about' ? 'class="active"' : ''; ?>>Rreth nesh</a></li>
            <li><a href="<?php echo $baseUrl; ?>products.php" <?php echo ($currentPage ?? '') === 'products' ? 'class="active"' : ''; ?>>Products</a></li>
            <li><a href="<?php echo $baseUrl; ?>news.php" <?php echo ($currentPage ?? '') === 'news' ? 'class="active"' : ''; ?>>News</a></li>
            <li><a href="<?php echo $baseUrl; ?>contact.php" <?php echo ($currentPage ?? '') === 'contact' ? 'class="active"' : ''; ?>>Contact</a></li>
            <?php if ($currentUser): ?>
                <li><a href="<?php echo $baseUrl; ?>my-account.php" <?php echo ($currentPage ?? '') === 'account' ? 'class="active"' : ''; ?>>Llogaria ime</a></li>
                <?php if ($isAdmin): ?>
                    <li><a href="<?php echo $baseUrl; ?>admin/" class="btn-header">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="<?php echo $baseUrl; ?>logout.php" class="btn-header">Dil</a></li>
            <?php else: ?>
                <li><a href="<?php echo $baseUrl; ?>login.php" class="btn-header">Login</a></li>
            <?php endif; ?>
            <li><a href="<?php echo $baseUrl; ?>cart.html" class="btn-header"><i class="fa-solid fa-basket-shopping"></i><span id="cart-count" class="cart-count">0</span></a></li>
        </ul>
    </div>
    <div id="mobile">
        <a href="<?php echo $baseUrl; ?>cart.html"><i class="fa-solid fa-basket-shopping"></i><span id="cart-count-mob" class="cart-count">0</span></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>
