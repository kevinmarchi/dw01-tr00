<?php
    session_start();

    if ( (!isset($_SESSION['login']) == true) && (!isset($_SESSION['senha']) == true) ) {
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        header('location:login.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="?=cadastro.php" method="GET">
        <legend>Cadastro de Usuário</legend>
        <fieldset>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required autocomplete="off">
            <br>
            <br>
            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" required autocomplete="off">
            <br>
            <br>
            <input type="submit" value="Salvar" name='gravar'>
        </fieldset>
    </form>
    <br>
    <br>
    <a href="alterar.php">Página Alterar</a>
    <br>
    <br>
    <a href="login.php?deslogar=true">Deslogar</a>
</body>
</html>

<?php
    include 'conexao.php';

    if (isset($_GET['nome']) && isset($_GET['idade'])) {
        $nome = $_GET['nome'];
        $idade = $_GET['idade'];
    }
    

    if (isset($_GET['gravar'])) {
        $conecta->query("INSERT INTO cadastro (nome,idade) VALUES ('$nome',$idade)");
    }
    
?>