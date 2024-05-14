<?php

require_once "class/class.Conexao.php";

class SQL {
    var $conexao;

    function SQL() {
        $oConexao = new Conexao();

        $this->conexao = $oConexao->conexao;
    }

    // function queryResult($sql) {

    //     @$res = pg_query($this->conexao, $sql) or die("erro: " . pg_last_error());

    //     if ($res) {
    //         if (pg_num_rows($res) > 0) {
    //             while ($aReg = @pg_fetch_assoc($res)) {
    //                 $aObj[] = $aReg;
    //             }
    //         }
    //         return (pg_num_rows($res) > 0) ? $aObj : false;
    //     } else {
    //         return false;
    //     }
    // }

    function insert($nome, $email, $telefone, $sexo, $data_nascimento, $cidade, $estado, $endereco, $senha) {
        // echo 'entrou na função';
        // exit;
        $sql = "INSERT INTO estagiarios.formulario_teste
        (nome, email, telefone, sexo, data_nasc, cidade, estado, endereco, senha)
         VALUES 
         ('$nome','$email', '$telefone', '$sexo', '$data_nascimento', '$cidade', '$estado', '$endereco', '$senha')
         ";


        // echo "<pre>";print_r($sql);exit;

        // $res = queryResult($sql);
        $res = pg_query($this->conexao, $sql);
        // echo "<pre>";print_r($res);exit;

        return $res;
    }

    function select($email, $senha) {
        $sql = "SELECT * FROM estagiarios.formulario_teste WHERE email = '$email' and senha = '$senha'";

        $res = pg_query($this->conexao, $sql);

        return pg_num_rows($res);
    }

    function selectEmail($email) {
        $sql = "SELECT * FROM estagiarios.formulario_teste WHERE email = '$email'";

        $res = pg_query($this->conexao, $sql);

        return pg_num_rows($res);
    }

    function selectUsuarios() {
        $sql = "SELECT * FROM estagiarios.formulario_teste ORDER BY cd_form_teste DESC";

        $res = pg_query($this->conexao, $sql);

        return $res;

    }

    function selectId($id) {
        $sql = "SELECT * FROM estagiarios.formulario_teste WHERE cd_form_teste=$id";

        $res = pg_query($this->conexao, $sql);

        return $res;
    }

    function update($nome, $email, $telefone, $sexo, $data_nascimento, $cidade, $estado, $endereco, $senha, $id) {
        $sql = "UPDATE estagiarios.formulario_teste SET nome='$nome', email='$email', telefone='$telefone', sexo='$sexo', data_nasc='$data_nascimento', cidade='$cidade', estado='$estado', endereco='$endereco', senha='$senha' WHERE cd_form_teste='$id'";

        $res = pg_query($this->conexao, $sql);

        return $res;
    }

    function delete($id) {
        $sql = "DELETE FROM estagiarios.formulario_teste WHERE cd_form_teste=$id";

        $res = pg_query($this->conexao, $sql);

        return $res;
    }

    function selectPesquisa($data) {

        $sql = "SELECT * FROM estagiarios.formulario_teste WHERE 
        --cd_form_teste LIKE %$data% or
        nome LIKE '%$data%' or 
        email LIKE '%$data%' 
        ORDER BY cd_form_teste DESC";

        // echo $sql;

        $res = pg_query($this->conexao, $sql);

        return $res;
    }
}


