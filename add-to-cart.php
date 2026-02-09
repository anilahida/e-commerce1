<?php
// Startojmë sesionin që serveri të mbajë mend produktet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lidhemi me konfigurimet tuaja
require_once __DIR__ . '/includes/init.php';

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Krijohet shporta nëse nuk ekziston
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Shtohet produkti: nëse është brenda, rritet sasia, nëse jo, shtohet për herë të parë
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }

    // Kjo të kthen automatikisht te faqja ku ishe (Home ose Products)
    echo "<script>
    alert('Produkti u shtua me sukses në shportë!');
    window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
</script>";
exit();
} else {
    // Nëse dikush hyn pa ID, e dërgojmë në index
    header('Location: index.php');
    exit();
}