<?php
    if (!empty($_GET['cd_form_teste'])) {

        require_once "class/class.SQL.php";

        $sql = new SQL();

        $id = $_GET['cd_form_teste'];

        $select = $sql->selectId($id);

        if (pg_num_rows($select) > 0) {

            $deletar = $sql->delete($id);
        }
    }
    header('Location: sistema.php?status=excluido');
?>