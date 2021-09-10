<?php
require("./funcoes.php");
$funcionarios = lerArquivo("funcionarios.json");

if (isset($_GET["buscarFuncionario"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Empresa X</title>
</head>

<body>
    <h1>Funcionários da empresa X</h1>
    <p>A empresa conta com <em> <?= count($funcionarios) ?> </em></p>

    <form>
        <input type="text" value="<?= isset($_GET["filtro"]) ? $_GET["buscarFuncionario"] : "" ?>" name="buscarFuncionario" placeholder="Buscar Funcionário">
        <button>Buscar</button>
    </form>

    <button id="btnAddFuncionario"> Adicionar novo funcionário +</button>

    <div class="modal-form">
        <form id="form-funcionario" action="acoes.php" method="POST">
            <h1>Adicionando funcionário</h1>
            <input type="text" placeholder="Digite o id" name="id">
            <input type="text" placeholder="Digite o primeiro nome" name="first_name">
            <input type="text" placeholder="Digite o último nome" name="last_name">
            <input type="text" placeholder="Digite o e-mail " name="email">
            <input type="text" placeholder="Digite o sexo" name="gender">
            <input type="text" placeholder="Digite o IP" name="ip_address">
            <input type="text" placeholder="Digite o país" name="country">
            <input type="text" placeholder="Digite o departamento" name="department">
            <button>Salvar</button>
        </form>
    </div>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Sexo</th>
            <th>Endereço IP</th>
            <th>País</th>
            <th>Departamento</th>
            <th>Ações</th>
        </tr>
        <?php
        foreach ($funcionarios as $funcionario) :
        ?>

            <tr>
                <td><?= $funcionario->id ?></td>
                <td><?= $funcionario->first_name ?></td>
                <td><?= $funcionario->last_name ?></td>
                <td><?= $funcionario->email ?></td>
                <td><?= $funcionario->gender ?></td>
                <td><?= $funcionario->ip_address ?></td>
                <td><?= $funcionario->country ?></td>
                <td><?= $funcionario->department ?></td>

                <td>
                    <button class="material-icons">edit</button>
                    <button onclick="deletar(<?= $funcionario->id?>)" class="material-icons">delete</button>
                </td>
            </tr>

        <?php
        endforeach;
        ?>

    </table>

</body>

</html>