<?php
require_once __DIR__ . '/includes/init.php';
$id = (int)($_GET['id'] ?? 0);
$product = $id ? $productModel->getById($id) : null;
if (!$product) {
    header('Location: products.php');
    exit;
}
$currentPage = 'products';
$baseUrl = '';
$pageTitle = $product['title'];
require_once __DIR__ . '/includes/header.php';
?>

<section id="page-header" class="product-header">
    <h2><?php echo h($product['title']); ?></h2>
</section>

<section id="product-detail" class="section-p1">
    <div class="single-pro-image" style="flex:1; max-width:400px;">
        <img src="<?php echo h($product['image_path'] ?? 'images/skincare/skincare1.webp'); ?>" alt="">
    </div>
    <div class="single-pro-details" style="flex:1;">
        <h1><?php echo h($product['title']); ?></h1>
        <h4><?php echo number_format((float)$product['price'], 2); ?>€</h4>
        <p><?php echo nl2br(h($product['description'] ?? '')); ?></p>
        <?php if (!empty($product['pdf_path'])): ?>
        <a href="<?php echo h($product['pdf_path']); ?>" target="_blank" class="normal">Shiko PDF</a>
        <?php endif; ?>
        <button type="button" class="normal add-cart-single" data-name="<?php echo h($product['title']); ?>" data-price="<?php echo h($product['price']); ?>" data-img="<?php echo h($product['image_path'] ?? ''); ?>">Shto ne shporte</button>
    </div>
</section>

<style>#product-detail{display:flex;gap:40px;flex-wrap:wrap;}</style>
<script>
document.querySelector('.add-cart-single')?.addEventListener('click', function(){
    var name = this.getAttribute('data-name'), price = this.getAttribute('data-price'), img = this.getAttribute('data-img') || '';
    var cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    var found = false;
    for (var i = 0; i < cart.length; i++) { if (cart[i].name === name) { cart[i].qty = (cart[i].qty || 1) + 1; found = true; break; } }
    if (!found) cart.push({ name: name, price: price, img: img, qty: 1 });
    localStorage.setItem('cart', JSON.stringify(cart));
    var c = document.getElementById('cart-count'), cm = document.getElementById('cart-count-mob');
    var t = 0; for (var j = 0; j < cart.length; j++) t += cart[j].qty || 1;
    if (c) c.textContent = t; if (cm) cm.textContent = t;
    alert('Shtuar ne shporte!');
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
