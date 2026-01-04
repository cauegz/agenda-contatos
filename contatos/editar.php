<?php
    require __DIR__ . "/../config/conexao.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM contatos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);

    $valores = $stmt->fetch(PDO::FETCH_ASSOC);

    
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c25eca0384.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="position-absolute top-50 start-50 translate-middle w-50">
        <h1 class="text-center">Editar um contato na agenda</h1>
        <form action="salvar.php?id=<?= $id ?>" method="post" class="border p-4 rounded shadow">

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-user icon"></i></span>
                <div class="form-floating">
                    <input type="text" name="name" id="input-name-create" class="form-control" placeholder="Nome" value="<?= $valores['nome'] ?>">
                    <label class="form-label">Nome</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-message icon"></i></span>
                <div class="form-floating">
                    <input type="email" name="email" id="input-email-create" class="form-control" placeholder="Email" value="<?= $valores['email'] ?>">
                    <label class="form-label">Email</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                <div class="form-floating">
                    <input type="text" name="phone" id="input-phone-create" class="form-control" placeholder="Telefone" value="<?= $valores['telefone'] ?>">
                    <label class="form-label">Telefone</label>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-4">
                <button type="submit" class="btn btn-outline-light">Salvar</button>
                <a href="../index.php" class="btn btn-outline-danger">Voltar</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        $('#input-phone-create').mask('(00) 00000-0000');
    </script>
</body>
</html>