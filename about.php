<?php
require_once __DIR__ . '/includes/init.php';
$currentPage = 'about';
$page = $pageModel->getBySlug('about');
$baseUrl = '';
require_once __DIR__ . '/includes/header.php';

$aboutTitle = 'Rreth nesh';
$aboutContent = '<p>Jemi nje dyqan online per skincare dhe bukuri.</p>';
if ($page) {
    $aboutTitle = $page['title'];
    $aboutContent = $page['content'];
}
?>

<section id="page-header" class="about-header">
    <h2><?php echo h($aboutTitle); ?></h2>
    <p>Pak info per ne</p>
</section>

<section id="about-content" class="section-p1">
    <div class="about-intro">
        <img src="images/skincare/Logo2.png" alt="Logo">
        <div>
            <?php echo $aboutContent; ?>
        </div>
    </div>
    <div class="about-values">
        <h2>Pse na zgjidhni</h2>
        <div class="values-grid">
            <div class="value-box">
                <i class="fas fa-gem"></i>
                <h4>Cilësi</h4>
                <p>Produkte te mira, sherbim i mire.</p>
            </div>
            <div class="value-box">
                <i class="fas fa-heart"></i>
                <h4>Besnikëri</h4>
                <p>Klientet jane te rendesishem per ne.</p>
            </div>
            <div class="value-box">
                <i class="fas fa-truck"></i>
                <h4>Dorëzim</h4>
                <p>Dergojme shpejt ne te gjithe vendin.</p>
            </div>
        </div>
    </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Newsletter</h4>
        <p>Regjistrohuni per oferta dhe lajme <span>special</span></p>
        <a href="login.php"><button type="button" class="normal">Regjistrohu</button></a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
