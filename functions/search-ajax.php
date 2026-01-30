<?php
require_once __DIR__ . "/DB.php";
global $conn;

header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['query']) || empty(trim($_GET['query']))) {
    echo json_encode([]);
    exit();
}

$query = trim($_GET['query']);
$searchParam = "%" . $query . "%";

$stmt = $conn->prepare("
    SELECT id, title, image, price 
    FROM products 
    WHERE title LIKE :search 
    OR description LIKE :search 
    LIMIT 10
");

$stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as &$result) {
    $result['image_url'] = "src/img/" . $result['image'];
    $result['product_url'] = "singleproduct.php?id=" . $result['id'];
    $result['formatted_price'] = number_format($result['price']) . " تومان";
}

echo json_encode($results);
