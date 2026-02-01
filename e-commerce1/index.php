<?php
require_once __DIR__ . '/includes/init.php';
$currentPage = 'home';
$page = $pageModel->getBySlug('home');
$products = $productModel->getAll();
$baseUrl = '';
require_once __DIR__ . '/includes/header.php';

$heroTitle = 'Oferte Mujore';
$heroSub = 'Shiko me shume & deri ne 70% zbritje';
if ($page) {
    $heroTitle = $page['title'];
    $heroSub = strip_tags($page['content']);
}
?>

<section id="hero">
    <h4>Zbulo Koleksionin</h4>
    <h1><?php echo h($heroTitle); ?></h1>
    <p><?php echo h($heroSub); ?></p>
    <a href="index.php#product1"><button>Shop Now</button></a>
</section>

<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="images/skincare/shipping.png" alt="">
        <h5>Free Shipping</h5>
    </div>
    <div class="fe-box">
        <img src="images/skincare/list.png" alt="">
        <h5>Online Order</h5>
    </div>
    <div class="fe-box">
        <img src="images/skincare/savemoney.png" alt="">
        <h5>Save Money</h5>
    </div>
    <div class="fe-box">
        <img src="images/skincare/happycustomer.png" alt="">
        <h5>Happy Client</h5>
    </div>
    <div class="fe-box">
        <img src="images/skincare/promotion.png" alt="">
        <h5>Promotion</h5>
    </div>
    <div class="fe-box">
        <img src="images/skincare/suport.webp" alt="">
        <h5>24/7 Support</h5>
    </div>
</section>

<section id="product1" class="section-p1">
    <h1>Produktet</h1>
    <p>Koleksioni me i ri</p>
    <div class="pro-container">
        <?php foreach (array_slice($products, 0, 8) as $p): ?>
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

<section id="banner" class="section-m1">
    <h4>Zbritja Momentale</h4>
    <h2>Deri ne <span>70% zbritje</span></h2>
    <a href="products.php"><button class="normal">Explore more</button></a>
</section>

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>Cozy Deals</h4>
        <h2>Buy 2 get 1 free</h2>
        <a href="products.php"><button class="white">Learn More</button></a>
    </div>
    <div class="banner-box banner-box2">
        <h4>Summer 2025</h4>
        <h2>Me te rejat</h2>
        <a href="products.php"><button class="black">Koleksioni</button></a>
    </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up For Newsletter</h4>
        <p>Get E-mail updates about our latest shop and <span>special offers</span></p>
        <div class="form">
            <input type="text" placeholder="E-mail">
            <a href="login.php"><button type="button" class="normal">Sign Up</button></a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
