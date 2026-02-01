<?php
require_once __DIR__ . '/auth.php';
$pageTitle = 'Dashboard';
require_once __DIR__ . '/../includes/header.php';
?>

<section id="page-header" style="padding: 40px 80px;">
    <h2>Dashboard</h2>
    <p>Mireserdhe, <?php echo h($currentUser['name']); ?></p>
</section>

<section class="section-p1" style="padding: 20px 80px;">
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap:20px;">
        <a href="products.php" style="padding:24px; background:#f5f5f5; border-radius:8px; text-align:center; text-decoration:none; color:#1a1a1a;">
            <i class="fas fa-box" style="font-size:32px; margin-bottom:10px;"></i>
            <strong>Produktet</strong>
        </a>
        <a href="news.php" style="padding:24px; background:#f5f5f5; border-radius:8px; text-align:center; text-decoration:none; color:#1a1a1a;">
            <i class="fas fa-newspaper" style="font-size:32px; margin-bottom:10px;"></i>
            <strong>Lajmet</strong>
        </a>
        <a href="messages.php" style="padding:24px; background:#f5f5f5; border-radius:8px; text-align:center; text-decoration:none; color:#1a1a1a;">
            <i class="fas fa-envelope" style="font-size:32px; margin-bottom:10px;"></i>
            <strong>Mesazhet e kontaktit</strong>
        </a>
        <a href="pages.php" style="padding:24px; background:#f5f5f5; border-radius:8px; text-align:center; text-decoration:none; color:#1a1a1a;">
            <i class="fas fa-file-alt" style="font-size:32px; margin-bottom:10px;"></i>
            <strong>Faqet (Home, About)</strong>
        </a>
        <a href="users.php" style="padding:24px; background:#f5f5f5; border-radius:8px; text-align:center; text-decoration:none; color:#1a1a1a;">
            <i class="fas fa-users" style="font-size:32px; margin-bottom:10px;"></i>
            <strong>Përdoruesit</strong>
        </a>
    </div>
    <p style="margin-top:30px;"><a href="<?php echo $baseUrl; ?>/index.php">Kthehu te faqja kryesore</a></p>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
