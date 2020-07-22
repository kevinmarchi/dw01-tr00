<form action="?" method="post">
    <fieldset>
        <legend>Login</legend>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required autocomplete="off">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <br>
    </fieldset>

    <input type="submit" class="btn btn-dark" value="Logar" name="salvar">
    <a class="btn btn-light" href="?modulo=login&pagina=cadastro">Cadastro de usuário de login</a>
</form>
<br>
<br>

<?php
    $achou = false;
    if (isset($_POST['login']) && isset($_POST['senha'])) {
        $login = $_POST['login'];
        $senha = md5 ($_POST['senha']);
        
        if (isset($_POST['salvar'])) {
            $query = $conecta->query("SELECT `login`, `senha` FROM `login`");

            while ($dados = $query->fetch_assoc()) {
                if ($dados['login'] == $login && $dados['senha'] == $senha) {
                    $_SESSION['login'] = $login;
                    $_SESSION['senha'] = $senha;
                    $achou = true;
                    header('location:?');
                }
            }
            if ($achou == false) {
                echo "Login ou senha inválidos";
                    unset ($_SESSION['login']);
                    unset ($_SESSION['senha']);
            }
        }
    }
    if (isset($_GET['deslogar'])) {
        session_destroy();
        header('location:?');
    }
?>