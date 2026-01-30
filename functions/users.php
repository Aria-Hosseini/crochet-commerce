<?php

require_once __DIR__ . "/DB.php";

function checkuser($email){
    global $conn;
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}