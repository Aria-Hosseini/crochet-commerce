<?php

require_once __DIR__ . "/../../functions/DB.php";

function getUsers(){
    global $conn;
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}