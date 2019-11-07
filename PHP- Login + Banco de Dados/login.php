<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tela de Login</h1>
    <form action="login.php" method="POST">
    <fieldset>
        <legend>Login</legend>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required autocomplete="off">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required autocomplete="off">
        <br>
        <br>
        <input type="submit" name="logar" value="Logar">
    </fieldset>
    <br>
    <a href="cadastroLogin.php">Realizar o cadastro</a>
    </form>
    
</body>
</html>

<?php
    include 'conexao.php';
    session_start();

    if (isset($_POST['nome']) && isset($_POST['senha'])) {
        $login = $_POST['nome'];
        $senha = $_POST['senha'];

       $query = $conecta->query("SELECT `login`, `senha` FROM `login`");
       $achou = false;

       while ($dados = $query->fetch_assoc()) {
           $bLogin = $dados['login'];
           $bSenha = $dados['senha'];
           if ($login == $bLogin && md5($senha) == $bSenha) {
               $_SESSION['login'] = $login;
               $_SESSION['senha'] = $senha;
               header('location:alterar.php');
               $achou = true;
           }
        }
        
        if ($achou = false) {
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header('location:login.php');
        }
    }

    if (isset($_GET['deslogar'])) {
        session_destroy();
        header('location:login.php');
    }

    
?>