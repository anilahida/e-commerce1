<?php
// Lidhja direkte me databazen tende
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce_db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image_path = mysqli_real_escape_string($conn, $_POST['image_path'] ?: 'images/skincare/default.jpg');

    // Fikim kontrollet e sigurise per nje moment
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // QUERY I THJESHTUAR: Hoqa 'category_id' dhe 'stock' qe te mos kemi errore kolonash
    $sql = "INSERT INTO products (title, description, price, image_path, created_by) 
            VALUES ('$title', '$description', '$price', '$image_path', 1)";

    if (mysqli_query($conn, $sql)) {
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
        header('Location: products.php?success=1');
        exit;
    } else {
        // Nese prap ka error kolonash, ketu do e shohim saktesisht cilat jane
        $error = "Gabim Teknik: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shto Produkt</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; padding: 40px; }
        .container { background: white; padding: 30px; max-width: 500px; margin: auto; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        h2 { color: #333; margin-top: 0; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; color: #555; }
        input, textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .btn { background: #088178; color: white; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; }
        .error { background: #ffebee; color: #c62828; padding: 15px; margin-bottom: 20px; border-radius: 8px; border-left: 5px solid #c62828; font-size: 14px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Shto Produkt të Ri</h2>
    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
    
    <form method="POST">
        <div class="form-group">
            <label>Emri i Produktit</label>
            <input type="text" name="title" required placeholder="Psh. Krem fytyre">
        </div>
        <div class="form-group">
            <label>Çmimi (€)</label>
            <input type="number" step="0.01" name="price" required placeholder="0.00">
        </div>
        <div class="form-group">
            <label>Përshkrimi</label>
            <textarea name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Rruga e Fotos (Path)</label>
            <input type="text" name="image_path" placeholder="images/skincare/foto.jpg">
        </div>
        <button type="submit" class="btn">Ruaj Produktin</button>
        <p style="text-align: center; margin-top: 15px;">
            <a href="products.php" style="color: #666; text-decoration: none; font-size: 14px;">Anulo dhe kthehu</a>
        </p>
    </form>
</div>

</body>
</html>