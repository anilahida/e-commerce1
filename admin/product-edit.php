<?php
require_once __DIR__ . '/auth.php'; 

// Rregullimi i rrugës
$baseUrl = '../'; 

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = $id > 0 ? $productModel->getById($id) : null;

// Kur shtypet butoni "Ruaj"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_path = $_POST['image_path'];
    $pdf_path = null; 
    $user_id = $_SESSION['user_id'] ?? 1;

    if ($id > 0) {
        // UPDATE (Ndrysho)
        $productModel->update($id, $title, $description, $price, $image_path, $pdf_path, $user_id);
    } else {
        // CREATE (Shto)
        $productModel->create($title, $description, $price, $image_path, $pdf_path, $user_id);
    }
    header('Location: products.php');
    exit;
}

$pageTitle = $id > 0 ? 'Modifiko Produktin' : 'Shto Produkt';
require_once __DIR__ . '/../includes/header.php';
?>

<section class="section-p1">
    <h2 style="margin-bottom: 20px;"><?php echo $id > 0 ? 'Modifiko Produktin' : 'Shto Produkt të Ri'; ?></h2>
    
    <form method="POST" style="max-width: 600px; display: flex; flex-direction: column; gap: 15px; background: #f9f9f9; padding: 25px; border-radius: 8px;">
        
        <div>
            <label style="display:block; margin-bottom: 5px;">Titulli:</label>
            <input type="text" name="title" value="<?php echo $product ? h($product['title']) : ''; ?>" required style="width:100%; padding:10px;">
        </div>

        <div>
            <label style="display:block; margin-bottom: 5px;">Përshkrimi:</label>
            <textarea name="description" rows="4" style="width:100%; padding:10px;"><?php echo $product ? h($product['description']) : ''; ?></textarea>
        </div>

        <div>
            <label style="display:block; margin-bottom: 5px;">Çmimi (€):</label>
            <input type="number" step="0.01" name="price" value="<?php echo $product ? $product['price'] : ''; ?>" required style="width:100%; padding:10px;">
        </div>

        <div>
            <label style="display:block; margin-bottom: 5px;">Rruga e Fotos (Path):</label>
            <input type="text" name="image_path" value="<?php echo $product ? h($product['image_path']) : 'images/skincare/skincare1.webp'; ?>" style="width:100%; padding:10px;">
            <small>Shembull: images/skincare/foto_re.webp</small>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit" style="background: #088178; color: white; padding: 12px 25px; border: none; border-radius: 4px; cursor: pointer;">
                <?php echo $id > 0 ? 'Përditëso Produktin' : 'Ruaj Produktin'; ?>
            </button>
            <a href="products.php" style="margin-left: 15px; color: #555; text-decoration: none;">Anulo</a>
        </div>
    </form>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>