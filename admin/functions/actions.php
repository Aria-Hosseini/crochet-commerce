<?php

require_once __DIR__ . "/../../functions/DB.php";

if (isset($_GET['delete_category'])) {

    $id = intval($_GET['delete_category']);

        global $conn;

        $stmt = $conn->prepare("DELETE FROM category WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();


    header("Location: /shop/admin/pages/categories.php");
    exit;
}

if(isset($_GET['delete_product'])){
    $id = intval($_GET['delete_product']);

    global $conn;

    $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: /shop/admin/pages/products.php");
    exit;
}

if(isset($_GET['delete_user'])){
    $id = intval($_GET['delete_user']);

    global $conn;

    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: /shop/admin/pages/users.php");
    exit;
}
