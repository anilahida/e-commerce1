<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/includes/init.php';

// Ky bllok ekzekutohet kur klikon butonin "Hyr si Admin"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_id'] = 1; 
    $_SESSION['user_role'] = 'admin';
    session_write_close(); 
    header('Location: admin/products.php');
    exit;
}

$pageTitle = 'Hyrje';
require_once __DIR__ . '/includes/header.php';
?>

<div style="background: #e9b5b9; padding: 60px 0; text-align: center; color: white;">
    <h1 style="font-size: 35px; margin-bottom: 10px;">Hyrje në llogari</h1>
    <p>Hyni për të menaxhuar produktet e dyqanit</p>
</div>

<section style="padding: 50px 0; display: flex; justify-content: center; background: #fdfdfd;">
    <div style="background: white; padding: 40px; width: 100%; max-width: 450px; border-radius: 10px; box-shadow: 0 5px 25px rgba(0,0,0,0.05); border: 1px solid #eee;">
        <h2 style="margin-bottom: 25px; color: #333;">Hyr</h2>
        
        <form action="login.php" method="POST">
            <div style="margin-bottom: 15px;">
                <input type="text" placeholder="Email juaj" disabled style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 3px; background: #f9f9f9;">
            </div>
            <div style="margin-bottom: 20px;">
                <input type="password" placeholder="Fjalëkalimi" disabled style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 3px; background: #f9f9f9;">
            </div>

            <button type="submit" style="width: 100%; padding: 15px; background: #088178; color: white; border: none; border-radius: 3px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s;">
                LOG IN SI ADMIN
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #666;">
            Nuk keni llogari? <a href="#" style="color: #088178; text-decoration: none; font-weight: bold;">Regjistrohu</a>
        </p>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>