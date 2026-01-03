<?php
    require "config/conexao.php";

    $sql = "SELECT * FROM contatos";

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $contatos = $stmt -> fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex flex-column justify-content-evenly position-absolute top-50 start-50 translate-middle w-75 h-auto border p-4 rounded shadow">
    <h1 class="text-center">Agenda de contatos</h1>
        <table class="table table-sm table-dark text-center align-middle table-bordered">
            <thead>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach($contatos as $c): ?>
                    <tr>
                        <td> <?=htmlspecialchars($c['nome'])?> </td>
                        <td> <?=htmlspecialchars($c['telefone'])?> </td>
                        <td> <?=htmlspecialchars($c['email'])?> </td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="contatos/editar.php?id=<?=$c['id'] ?>" class="btn btn-outline-warning">Editar</a>
                                <a href="contatos/excluir.php?id=<?=$c['id'] ?>" class="btn btn-outline-danger" onclick="return confirmar_exclusao()">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center"><a href="contatos/criar.php" class="btn btn-outline-primary">Criar um contato</a></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        function confirmar_exclusao(){
            return confirm("Tem certeza que deseja excluir?");
        }
    </script>
</body>
</html>