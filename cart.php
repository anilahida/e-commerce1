<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/header.php';

$cartProducts = [];
$total = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $product = $productModel->getById($id); 
        if ($product) {
            $product['quantity'] = $quantity;
            $product['subtotal'] = $product['price'] * $quantity;
            $total += $product['subtotal'];
            $cartProducts[] = $product;
        }
    }
}
?>

<section id="page-header" class="cart-header" style="background-color: #e9b5b9; padding: 40px; text-align: center;">
    <h2>Shporta Ime</h2>
    <p>Produktet që keni shtuar</p>
</section>

<section id="cart" class="section-p1" style="padding: 40px;">
    <?php if (empty($cartProducts)): ?>
        <div style="text-align:center;">
            <h3>Shporta është e zbrazët!</h3>
            <a href="index.php" class="btn-header" style="display:inline-block; margin-top:20px;">Kthehu te produktet</a>
        </div>
    <?php else: ?>
        <table width="100%" style="border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 1px solid #ddd; text-align: left;">
                    <th style="padding: 10px;">Foto</th>
                    <th>Produkti</th>
                    <th>Çmimi</th>
                    <th>Sasia</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartProducts as $item): ?>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px;"><img src="<?php echo h($item['image_path']); ?>" width="70"></td>
                    <td><?php echo h($item['title']); ?></td>
                    <td><?php echo number_format($item['price'], 2); ?>€</td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo number_format($item['subtotal'], 2); ?>€</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="text-align: right; margin-top: 30px;">
            <h3 style="font-size: 24px;">Total: <span style="color: #088178;"><?php echo number_format($total, 2); ?>€</span></h3>
            
            <a href="checkout.php">
                <button class="normal" style="background:#088178; color:white; padding:15px 30px; border:none; cursor:pointer; margin-top:10px; font-weight: bold; border-radius: 4px;">
                    VAZHDO TE PAGESA
                </button>
            </a>
        </div>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>