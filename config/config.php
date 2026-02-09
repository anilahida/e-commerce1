<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'ecommerce_db'); // Përdor këtë sepse këtu janë tabelat!
define('DB_USER', 'root');
define('DB_PASS', '');
define('BASE_URL', '/e-commerce1-test/');

// Krijimi i lidhjes (SHTOJE KËTË)
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("Lidhja dështoi: " . mysqli_connect_error());
}