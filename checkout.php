<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/header.php';

// Kontrollojmë nëse forma është dërguar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Këtu mund të ruani të dhënat në databazë nëse dëshironi
    echo "<script>
        alert('Faleminderit! Porosia mberrin per 2 dite. Pagesa behet cash pas hapjes se produkteve.');
        window.location.href = 'index.php';
    </script>";
    // Pas porosisë, zbrazim shportën
    unset($_SESSION['cart']);
    exit();
}
?>

<section id="checkout-form" class="section-p1" style="padding: 40px; max-width: 600px; margin: auto;">
    <h2 style="text-align: center; margin-bottom: 20px;">Të dhënat e dërgesës</h2>
    <form action="checkout.php" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        <input type="text" name="emri" placeholder="Emri" required style="padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
        <input type="text" name="mbiemri" placeholder="Mbiemri" required style="padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
        <input type="text" name="adresa" placeholder="Adresa e saktë" required style="padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
        <input type="text" name="komuna" placeholder="Komuna" required style="padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
        <input type="tel" name="telefoni" placeholder="Nr. i telefonit" required style="padding: 12px; border: 1px solid #ddd; border-radius: 5px;">
        
        <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; border-left: 5px solid #088178;">
            <p style="margin: 0; font-size: 14px; color: #555;">
                <strong>Mënyra e pagesës:</strong> Cash pas hapjes së produktit (Posta).
            </p>
        </div>

        <button type="submit" class="normal" style="background: #088178; color: white; padding: 15px; border: none; cursor: pointer; border-radius: 5px; font-weight: bold;">
            PËRFUNDO POROSINË
        </button>
    </form>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>