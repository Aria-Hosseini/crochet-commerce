<?php

require_once __DIR__ . "/config.php";

function getCategory(){
    global $conn;
    $sql = "SELECT * FROM category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}