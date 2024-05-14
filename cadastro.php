<?php

    // if (isset($_POST['submit'])) {
    //     print_r($_POST['nome']);
    //     print_r("<br>");
    //     print_r($_POST['email']);
    //     print_r("<br>");
    //     print_r($_POST['telefone']);
    //     print_r("<br>");
    //     print_r($_POST['sexo']);
    //     print_r("<br>");
    //     print_r($_POST['data_nascimento']);
    //     print_r("<br>");
    //     print_r($_POST['cidade']);
    //     print_r("<br>");
    //     print_r($_POST['estado']);
    //     print_r("<br>");
    //     print_r($_POST['endereco']);
    //     print_r($POST['senha']);
    // }    

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        // echo 'chegou';
        // print_r($_POST);
        // exit;

        // Conexão com o banco de dados
        require_once "class/class.SQL.php";

        $sql = new SQL();

        // Prepara as variáveis
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $data_nascimento = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];

        $verificar = $sql->selectEmail($email);

        if ($verificar < 1) {
            $inserir = $sql->insert($nome, $email, $telefone, $sexo, $data_nascimento, $cidade, $estado, $endereco, $senha);
            header('Location: login.php?status=cadastrado');
        } else {
            header('Location: cadastro.php?status=existente');
        }
        
    }

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cadastro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Cadastro</title>
</head>
<body>
    <a href="home.php" class="btn__back">Voltar</a>
    <div class="main">
        <div class="mensagem">
            <h3 class="mensagem__titulo">Faça seu cadastro na plataforma!</h3>
            <i class="bi bi-arrow-right-circle-fill"></i>
        </div>

        <div class="box">
            <h3 class="box__titulo">Formulário de Cadastro</h3>
            <br>
            <form action="cadastro.php" method="POST">
                        <div class="conteudo">
                        <input type="text" name="nome" id="nome" class="box__input" placeholder="Nome completo" required>

                        <input type="text" name="email" id="email" class="box__input" placeholder="Email" required>

                        <input type="tel" name="telefone" id="telefone" class="box__input" placeholder="Telefone" required>
                        
                        <div class="sexo">
                            <p class="texto">Sexo:</p>

                            <input type="radio" value="feminino" name="sexo" id="feminino" required>
                            <label for="feminino" class="texto">Feminino</label>

                            <input type="radio" value="masculino" name="sexo" id="masculino" required>
                            <label for="masculino" class="texto">Masculino</label>

                            <input type="radio" value="outro" name="sexo" id="outro" required>
                            <label for="outro" class="texto">Outro</label>
                        </div>

                        <label for="data_nascimento" class="texto">Data de nascimento:</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" class="box__input" required>

                        <input type="text" name="cidade" id="cidade" class="box__input" placeholder="Cidade">

                        <input type="text" name="estado" id="estado" class="box__input" placeholder="Estado">

                        <input type="text" name="endereco" id="endereco" class="box__input" placeholder="Endereço">

                        <input type="password" name="senha" id="senha" class="box__input" placeholder="Senha">

                        <input class="box__input" type="submit" id="submit" name="submit">
                        </div>         
            </form>
        </div>
    </div>
    
    <!-- JAVASCRIPT -->
    <?php
        if ($_REQUEST['status'] == "existente") {
            echo "<script>alert('Esse email já existe!')</script>";
        }
    ?>

</body>
</html>