<?php
require_once __DIR__ . '/../includes/init.php';
$baseUrl = '..';
if (!$currentUser || ($currentUser['role'] ?? '') !== 'admin') {
    header('Location: ' . $baseUrl . '/login.php');
    exit;
}
