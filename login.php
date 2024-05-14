<?php

// echo "<pre>"; print_r($_REQUEST); exit;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Login</title>
</head>
<body>
    <a href="home.php" class="btn__back">Voltar</a>
    <div class="conteudo">
        <div class="mensagem">
            <h3 class="mensagem__titulo">Faça seu Login na plataforma!</h3>
            <i class="bi bi-arrow-right-circle-fill"></i>
        </div>
        <div class="box">
            <h1 class="box__titulo">Login</h1>
            <form action="testLogin.php" method="POST">
                <div class="box__inputs">
                    <input class="box__input" type="text" name="email" placeholder="Email">
                    <input class="box__input" type="password" name="senha" placeholder="Senha">
                    <input class="box__input" type="submit" name="submit" id="submit">
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
        if ($_REQUEST['status'] == "cadastrado") {
            echo "<script>alert('Cadastrado com sucesso!')</script>";
        }

        if ($_REQUEST['status'] == "rejeitado") {
            echo "<script>alert('Email ou Senha inválidos!')</script>";
        }
    ?>
</body>
</html>