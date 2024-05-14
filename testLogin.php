<?php
    session_start();

    // print_r($_REQUEST);
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //Acessa
        require_once "class/class.SQL.php";

        $sql = new SQL();

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // verificar se está chegando
        // print_r($email);
        // print_r("<br>");
        // print_r($senha);

        $verificar = $sql->select($email, $senha);

        if ($verificar < 1) {

            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php?status=rejeitado');

        } else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }

        // print_r($verificar);

    } else {
        // Não acessa
        header('Location: login.php');
    }

?>