<?php
require_once __DIR__ . '/../includes/init.php'; 

$baseUrl = '../'; 
$pageTitle = 'Menaxhimi i Produkteve';

// Merr produktet nga databaza
$products = $productModel->getAll();

require_once __DIR__ . '/../includes/header.php';
?>

<style>
    .manage-products {
        padding: 40px 80px;
    }
    .table-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-top: 20px;
        overflow-x: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table th, table td {
        text-align: left;
        padding: 15px;
        border-bottom: 1px solid #eee;
    }
    table th {
        background-color: #f8f9fa;
        color: #088178;
    }
    .btn-add {
        background: #088178;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: 600;
    }
    .product-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }
    .btn-delete { color: #e74c3c; margin-left: 10px; text-decoration: none; }
    .btn-edit { color: #3498db; text-decoration: none; }
</style>

<div class="manage-products">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Lista e Produkteve</h2>
        <a href="add-product.php" class="btn-add">+ Shto Produkt të Ri</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Emri</th>
                    <th>Çmimi</th>
                    <th>Veprimet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td><img src="../<?php echo $p['image_path']; ?>" class="product-img"></td>
                    <td><?php echo h($p['title']); ?></td>
                    <td><?php echo number_format($p['price'], 2); ?>€</td>
                    <td>
                        <a href="edit-product.php?id=<?php echo $p['id']; ?>" class="btn-edit"><i class="fas fa-edit"></i></a>
                        <a href="delete-product.php?id=<?php echo $p['id']; ?>" class="btn-delete" onclick="return confirm('A jeni i sigurt?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>