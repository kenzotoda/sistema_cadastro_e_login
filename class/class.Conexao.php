<?php

class Conexao {
    var $conexao;        

    function conexao() {
        $dbHost = '';
        $dbName = '';
        $dbUsername = '';
        $dbpassword = '';
       
        // Conexão com o banco de dados PostgreSQL
        $conexao = pg_connect("host=$dbHost dbname=$dbName user=$dbUsername password=$dbpassword");

        // Verifica se a conexão foi bem-sucedida
        if (!$conexao) {
            echo "Erro de conexão";
            exit;
        }
        else {
            // echo "Conexão efetuada com sucesso";
        }


        $this->conexao = $conexao;
    }
}