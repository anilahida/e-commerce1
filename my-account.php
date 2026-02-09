<?php
require_once __DIR__ . '/includes/init.php';

if (!$currentUser) {
    header('Location: login.php');
    exit;
}

$currentPage = 'account';
$baseUrl = '';
$pageTitle = 'Llogaria ime';
require_once __DIR__ . '/includes/header.php';

$memberSince = !empty($currentUser['created_at']) ? date('d.m.Y', strtotime($currentUser['created_at'])) : '';
?>

<section id="page-header" class="about-header">
    <h2>Llogaria ime</h2>
    <p>Te dhenat e llogarise tende</p>
</section>

<section id="account-content" class="section-p1">
    <div class="account-box" style="max-width:500px; margin:0 auto; padding:30px; border:1px solid #eee; border-radius:8px; background:#fafafa;">
        <div style="margin-bottom:20px;">
            <strong>Emri</strong><br>
            <?php echo h($currentUser['name']); ?>
        </div>
        <div style="margin-bottom:20px;">
            <strong>Email</strong><br>
            <?php echo h($currentUser['email']); ?>
        </div>
        <?php if ($memberSince): ?>
        <div style="margin-bottom:20px;">
            <strong>Anetar qe nga</strong><br>
            <?php echo h($memberSince); ?>
        </div>
        <?php endif; ?>
        <?php if ($isAdmin): ?>
        <div style="margin-top:25px; padding-top:20px; border-top:1px solid #eee;">
            <a href="admin/" class="normal" style="display:inline-block; padding:10px 20px;">Shko te Dashboard</a>
        </div>
        <?php endif; ?>
        <div style="margin-top:15px;">
            <a href="products.php">Shiko produktet</a> · <a href="contact.php">Na kontaktoni</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
