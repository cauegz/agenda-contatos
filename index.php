<?php
    require "config/conexao.php";

    //checa se o usuário clicou no botao de exibir todos
    if(isset($_GET['botao'])){
        unset($search);
    }

    if(isset($_GET['search'])){
        $search = $_GET['search'];
    }

    //listar usuarios
    if(!isset($search)){
        $sql = "SELECT * FROM contatos";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
        $contatos = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    
    //pesquisar usuario
    else{
        $sql = "SELECT * FROM contatos 
                WHERE nome LIKE :search";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":search" => "%" . $search . "%"
        ]);
        $contatos = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="d-flex flex-column justify-content-evenly position-absolute top-50 start-50 translate-middle w-75 h-auto border p-4 rounded shadow">
        <div class="group">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
                <g>
                <path
                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                ></path>
                </g>
            </svg>

            <form action="index.php" method="get">
                <input
                    id="query"
                    class="input w-100"
                    type="search"
                    placeholder="Pesquisar por nome..."
                    name="search"
                    required
                />
            </form>
            <form action="index.php" method="get">
                <button type="submit" name="botao" value="true" class="btn btn-outline-light">Exibir todos</button>
            </form>
        </div>
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