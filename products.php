<?php
require_once __DIR__ . '/includes/init.php';
$currentPage = 'products';
$products = $productModel->getAll();
$baseUrl = '';
require_once __DIR__ . '/includes/header.php';
?>

<section id="page-header">
    <h2>Products</h2>
    <p>Te gjitha produktet tona</p>
</section>

<section id="product1" class="section-p1">
    <h1>Koleksioni</h1>
    <p>Koleksioni me i ri</p>
    <div class="pro-container">
        <?php foreach ($products as $p): ?>
        <div class="pro" data-pro-name="<?php echo h($p['title']); ?>" data-pro-price="<?php echo h($p['price']); ?>" data-pro-img="<?php echo h($p['image_path'] ?? ''); ?>">
            <img src="<?php echo h($p['image_path'] ?? 'images/skincare/skincare1.webp'); ?>" alt="">
            <div class="des">
                <span><?php echo h($p['title']); ?></span>
                <h5><?php echo h($p['description'] ?? $p['title']); ?></h5>
                <div class="star">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <h4><?php echo number_format((float)$p['price'], 2); ?>€</h4>
            </div>
            <a href="javascript:void(0)" class="add-cart"><i class="fa-solid fa-cart-shopping cart"></i></a>
            <a href="product-detail.php?id=<?php echo (int)$p['id']; ?>" class="pro-link">Shiko detajet</a>
        </div>
        <?php endforeach; ?>
        <?php if (empty($products)): ?>
        <p>Nuk ka produkte akoma.</p>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
