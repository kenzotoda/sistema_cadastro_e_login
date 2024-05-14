<?php


    if (!empty($_GET['cd_form_teste'])) {

        require_once "class/class.SQL.php";

        $sql = new SQL();

        $id = $_GET['cd_form_teste'];

        $select = $sql->selectId($id);

        if (pg_num_rows($select) > 0) {
            while ($user_data = pg_fetch_assoc($select)) {

            // Prepara as variáveis
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $data_nascimento = $user_data['data_nasc'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
            $senha = $user_data['senha'];
            }
            
        } else {
            header('Location: sistema.php');
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

    <title>Editar</title>
</head>
<body>
    <a href="sistema.php" class="btn__back">Voltar</a>
    <div class="main">
        <div class="mensagem">
            <h3 class="mensagem__titulo">Edite os seus dados!</h3>
            <i class="bi bi-arrow-right-circle-fill"></i>
        </div>

        <div class="box">
            <h3 class="box__titulo">Formulário de Cadastro</h3>
            <br>
            <form action="saveEdit.php" method="POST">
                        <div class="conteudo">
                            <input type="text" name="nome" id="nome" class="box__input" placeholder="Nome completo" value="<?php echo $nome ?>" required>

                            <input type="text" name="email" id="email" class="box__input" placeholder="Email" value="<?php echo $email ?>" required>

                            <input type="tel" name="telefone" id="telefone" class="box__input" placeholder="Telefone" value="<?php echo $telefone ?>"required>
                            
                            <div class="sexo">
                                <p class="texto">Sexo:</p>

                                <input type="radio" value="feminino" name="sexo" id="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : '' ?> required>
                                <label for="feminino" class="texto">Feminino</label>

                                <input type="radio" value="masculino" name="sexo" id="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '' ?> required>
                                <label for="masculino" class="texto">Masculino</label>

                                <input type="radio" value="outro" name="sexo" id="outro" <?php echo ($sexo == 'outro') ? 'checked' : '' ?> required>
                                <label for="outro" class="texto">Outro</label>
                            </div>

                            <label for="data_nascimento" class="texto">Data de nascimento:</label>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="box__input" value="<?php echo $data_nascimento ?>" required>

                            <input type="text" name="cidade" id="cidade" class="box__input" placeholder="Cidade" value="<?php echo $cidade ?>" required>

                            <input type="text" name="estado" id="estado" class="box__input" placeholder="Estado" value="<?php echo $estado ?>" required>

                            <input type="text" name="endereco" id="endereco" class="box__input" placeholder="Endereço" value="<?php echo $endereco ?>" required>

                            <input type="text" name="senha" id="senha" class="box__input" placeholder="Senha" value="<?php echo $senha ?>" required>
                            
                            <input type="hidden" name="cd_form_teste" value="<?php echo $id ?>">

                            <input class="box__input" type="submit" id="submit" name="submit">

                        </div>         
            </form>
        </div>
    </div>
</body>
</html>