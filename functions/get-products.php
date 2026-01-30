<?php
require_once __DIR__ . "/DB.php";
global $conn;

$category = $_GET['category'] ?? 'all';

if ($category === 'all') {
  $stmt = $conn->prepare("SELECT * FROM products");
} else {
  $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :cat");
  $stmt->bindParam(':cat', $category, PDO::PARAM_INT);
}

$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($products as &$product) {
  $product['image_url'] = "src/img/" . $product['image'];
  $product['product_url'] = "singleproduct.php?id=" . $product['id'];
}

header('Content-Type: application/json');
echo json_encode($products);