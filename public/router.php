<?php
$path = __DIR__ . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
if (file_exists($path) && !is_dir($path)) {
    return false; // servește fișierul direct
}
require_once __DIR__ . '/index.php'; // trimite restul către index.php
