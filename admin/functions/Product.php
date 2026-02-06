<?php

require_once __DIR__ . "/../../functions/DB.php";

function getProducts(){
    global $conn;
    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
    }