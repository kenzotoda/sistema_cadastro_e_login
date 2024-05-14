<?php

    session_start();
    // print_r($_SESSION);
    require_once "class/class.SQL.php";

    $sql = new SQL();

    if ((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true )) {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    $logado = $_SESSION['email'];

    if (!empty($_GET['search'])) {

        // echo 'entrou'; 

        $data = $_GET['search'];
        $listarUsuarios = $sql->selectPesquisa($data);
        // print_r($listarUsuarios);

    }
    else {
        $listarUsuarios = $sql->selectUsuarios();
    }

    
    // print_r($listarUsuarios);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/sistema.css">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Sistema</title>
</head>
<body id="body">
    <nav class="navegacao">
        <a href="#" class="navegacao__title">SISTEMA DA PLATAFORMA</a>
        <a href="sair.php" class="btn btn-danger" id="botao">Sair</a>
    </nav>
    <br><br>
    <?php
        echo "<h2>Bem vindo <u>$logado</u></h2>";
    ?>
    <br><br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button class="btn btn-primary" onclick="searchData()">
            <i class="bi bi-search"></i>
        </button>
    </div>
    <div class="m-5">
        <table class="table table-warning" style="font-size: 12px;">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Sexo</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Endereço</th>
                <th scope="col">Senha</th>
                <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = pg_fetch_assoc($listarUsuarios)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['cd_form_teste'] . "</td>";
                        echo "<td>" . $user_data['nome'] . "</td>";
                        echo "<td>" . $user_data['email'] . "</td>";
                        echo "<td>" . $user_data['telefone'] . "</td>";
                        echo "<td>" . $user_data['sexo'] . "</td>";
                        echo "<td>" . $user_data['data_nasc'] . "</td>";
                        echo "<td>" . $user_data['cidade'] . "</td>";
                        echo "<td>" . $user_data['estado'] . "</td>";
                        echo "<td>" . $user_data['endereco'] . "</td>";
                        echo "<td>" . $user_data['senha'] . "</td>";
                        echo "<td>
                            <a class='btn btn-primary btn-sm' href='edit.php?cd_form_teste=$user_data[cd_form_teste]'>
                            <i class='bi bi-pencil'></i>
                            </a>
                            <a class='btn btn-danger btn-sm' href='delete.php?cd_form_teste=$user_data[cd_form_teste]'>
                                <i class='bi bi-trash-fill'></i>
                            </a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- JAVASCRIPT -->
    <?php
        if ($_REQUEST['status'] == "editado") {
        echo "<script>alert('Editado com sucesso!')</script>";
    }

    if ($_REQUEST['status'] == "excluido") {
        echo "<script>alert('Excluido com sucesso!')</script>";
    }
    ?>

    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        })

        function searchData() {
            window.location = 'sistema.php?search='+search.value;
        }
    </script>
</body>
</html>