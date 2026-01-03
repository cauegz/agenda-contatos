<?php
    require __DIR__ . "/../config/conexao.php";

    session_start();

    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header("Location: ../index.php");
        exit;
    }

    $name = trim($_POST['name'] ?? "");
    $phone = $_POST['phone'] ?? "";
    $email = trim($_POST['email'] ?? "");

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['erro'] = "Email não é válido";
        header("Location: ../index.php");
        exit;
    }

    $sql = "INSERT INTO contatos (nome,telefone,email) VALUES 
            (:nome, :phone, :email);
    ";

    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $name,
        ':phone' => $phone,
        ':email' => $email
    ]);

    header("Location: ../index.php");
    exit;