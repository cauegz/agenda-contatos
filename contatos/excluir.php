<?php
    require __DIR__ . "/../config/conexao.php";

    $id = (int)$_GET['id'];
    $sql = "DELETE FROM contatos WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: ../index.php");