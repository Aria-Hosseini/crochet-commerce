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

if(isset($_GET['new-product']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];

    $image = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = time() . '_' . $_FILES['image']['name'];

        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/shop/src/img/' . $image;

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
    }

    global $conn;

    $query = $conn->prepare(
        "INSERT INTO products (title, description, price, stock, category_id, image)
         VALUES (:title, :description, :price, :stock, :category, :image)"
    );

    $query->execute([
        ':title' => $title,
        ':description' => $description,
        ':price' => $price,
        ':stock' => $stock,
        ':category' => $category,
        ':image' => $image
    ]);
}

if(isset($_GET['new-category']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];

    global $conn;

    $query = $conn->prepare(
        "INSERT INTO category (title, created_at) VALUES (:title, NOW())"
    );

    $query->execute([
        ':title' => $title
    ]);
}