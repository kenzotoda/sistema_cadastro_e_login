<?php

    require_once "class/class.SQL.php";

    $sql = new SQL();

    if (isset($_POST['submit'])) {

        $id = $_POST['cd_form_teste'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $data_nascimento = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];

        $atualizar = $sql->update($nome, $email, $telefone, $sexo, $data_nascimento, $cidade, $estado, $endereco, $senha, $id);
    }
    header('Location: sistema.php?status=editado');
?>