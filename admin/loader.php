<?php
$page = $_GET['page'] ?? 'dashboard';

$allowed = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);
$basePath = __DIR__ . "/pages/";

$htmlFile = $basePath . $allowed . ".html";
$phpFile  = $basePath . $allowed . ".php";

if (file_exists($phpFile)) {
    include $phpFile;
} elseif (file_exists($htmlFile)) {
    readfile($htmlFile);
} else {
    http_response_code(404);
    echo "<h2>صفحه پیدا نشد ❌</h2>";
}
