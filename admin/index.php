<?php
// Dalim nje nivel lart per te gjetur init.php
require_once __DIR__ . '/../includes/init.php'; 

// Identifikojme qe jemi ne Admin dhe duhet te kthehemi nje nivel mbas per CSS/Images
$baseUrl = '../'; 
$pageTitle = 'Admin Dashboard';

require_once __DIR__ . '/../includes/header.php';
?>

<style>
    .admin-container {
        padding: 40px 80px;
        background: #f0f2f5;
        min-height: 80vh;
    }
    .admin-header {
        margin-bottom: 30px;
    }
    .admin-header h2 {
        color: #1a1a1a;
        font-size: 28px;
    }
    .dash-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 25px;
    }
    .dash-card {
        background: #fff;
        padding: 40px 20px;
        border-radius: 15px;
        text-align: center;
        text-decoration: none;
        color: #222;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: 0.3s;
        border-bottom: 4px solid transparent;
    }
    .dash-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        border-bottom: 4px solid #088178;
    }
    .dash-card i {
        font-size: 45px;
        color: #088178;
        margin-bottom: 15px;
        display: block;
    }
    .dash-card strong {
        font-size: 18px;
        display: block;
    }
    .back-link {
        display: inline-block;
        margin-top: 40px;
        color: #088178;
        text-decoration: none;
        font-weight: 600;
    }
</style>

<div class="admin-container">
    <div class="admin-header">
        <h2>Mirësevini në Dashboard</h2>
        <p>Menaxhoni dyqanin tuaj nga këtu.</p>
    </div>

    <div class="dash-grid">
        <a href="products.php" class="dash-card">
            <i class="fas fa-box"></i>
            <strong>Produktet</strong>
        </a>
        <a href="news.php" class="dash-card">
            <i class="fas fa-newspaper"></i>
            <strong>Lajmet</strong>
        </a>
        <a href="messages.php" class="dash-card">
            <i class="fas fa-envelope"></i>
            <strong>Mesazhet</strong>
        </a>
        <a href="users.php" class="dash-card">
            <i class="fas fa-users"></i>
            <strong>Përdoruesit</strong>
        </a>
    </div>

    <a href="../index.php" class="back-link">← Kthehu te Faqja Kryesore</a>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>