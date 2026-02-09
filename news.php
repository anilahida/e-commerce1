<?php
require_once __DIR__ . '/includes/init.php';
$currentPage = 'news';
$newsList = $newsModel->getAll();
$baseUrl = '';
require_once __DIR__ . '/includes/header.php';
?>

<section id="page-header">
    <h2>News</h2>
    <p>Lajmet dhe ofertat</p>
</section>

<section id="news-list" class="section-p1">
    <?php foreach ($newsList as $n): ?>
    <div class="news-item" style="display:flex; gap:20px; margin-bottom:30px; padding:20px; border:1px solid #eee; border-radius:8px;">
        <?php if (!empty($n['image_path'])): ?>
        <div style="flex:0 0 200px;">
            <img src="<?php echo h($n['image_path']); ?>" alt="" style="width:100%; height:auto; border-radius:6px;">
        </div>
        <?php endif; ?>
        <div style="flex:1;">
            <h3><?php echo h($n['title']); ?></h3>
            <p><?php echo nl2br(h($n['content'])); ?></p>
            <small style="color:#888;"><?php echo date('d.m.Y', strtotime($n['created_at'])); ?><?php if (!empty($n['created_by_name'])) echo ' · ' . h($n['created_by_name']); ?></small>
        </div>
    </div>
    <?php endforeach; ?>
    <?php if (empty($newsList)): ?>
    <p>Nuk ka lajme akoma.</p>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
