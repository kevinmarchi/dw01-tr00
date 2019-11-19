<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="cadastroLogin.php" method="POST">
        <fieldset>
            <legend>Cadastro de Login</legend>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required autocomplete="off">
            <br>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required autocomplete="off">
            <br>
            <br>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required autocomplete="off">
            <br>
            <br>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required autocomplete="off">
            <br>
            <br>
            <br>
            <input type="submit" name="gravar" value="Realizar Cadastro">
        </fieldset>
    </form>
    <br>
    <br>
    <a href="login.php">Ir para página de login</a>
</body>

<?php
    include 'conexao.php';

    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $email = $_POST['email'];
        $nome = $_POST['nome'];
    }

    if (isset($_POST['gravar'])) {
        $conecta->query("INSERT INTO `login`(`login`, `senha`, `nome`, `email`) VALUES ('$login','$senha','$email','$nome')");
    }
?>
</html>