<?php
$database = "agenda";
$username = "root";
$password = "";
$server   = "localhost";
$charset  = "utf8mb4";

try {
    $pdo = new PDO(
        "mysql:host=$server;dbname=$database;charset=$charset",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}
