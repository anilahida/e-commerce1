<?php
// Lidhja direkte me databazen
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce_db');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sigurohemi qe ID eshte numer
    
    // Fikim kontrollet e Foreign Keys qe te mos na bllokoje fshirjen
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // SQL Query direkt
    $sql = "DELETE FROM products WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Kthejme kontrollet dhe shkojme te lista
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
        header("Location: products.php?msg=Produkti u fshi me sukses");
        exit();
    } else {
        echo "Gabim gjatë fshirjes: " . mysqli_error($conn);
    }
} else {
    header("Location: products.php");
    exit();
}
?>