<?php
require_once __DIR__ . '/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $productModel->delete((int)$_POST['delete_id']);
    header('Location: products.php');
    exit;
}

$products = $productModel->getAll();
$pageTitle = 'Produktet';
require_once __DIR__ . '/../includes/header.php';
?>

<section id="page-header" style="padding: 40px 80px;">
    <h2>Produktet</h2>
    <p><a href="product-edit.php">+ Shto produkt</a></p>
</section>

<section class="section-p1">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="border-bottom:2px solid #eee;">
                <th style="text-align:left; padding:10px;">ID</th>
                <th style="text-align:left; padding:10px;">Titulli</th>
                <th style="text-align:left; padding:10px;">Cmimi</th>
                <th style="text-align:left; padding:10px;">Shtuar nga</th>
                <th style="padding:10px;">Veprime</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:10px;"><?php echo (int)$p['id']; ?></td>
                <td style="padding:10px;"><?php echo h($p['title']); ?></td>
                <td style="padding:10px;"><?php echo number_format((float)$p['price'], 2); ?>€</td>
                <td style="padding:10px;"><?php echo h($p['created_by_name'] ?? '-'); ?></td>
                <td style="padding:10px;">
                    <a href="product-edit.php?id=<?php echo (int)$p['id']; ?>">Ndrysho</a>
                    <form method="post" style="display:inline;" onsubmit="return confirm('Fshi kete produkt?');">
                        <input type="hidden" name="delete_id" value="<?php echo (int)$p['id']; ?>">
                        <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Fshi</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (empty($products)): ?><p>Nuk ka produkte.</p><?php endif; ?>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
