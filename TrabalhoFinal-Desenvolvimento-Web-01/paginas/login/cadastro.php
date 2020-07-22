<form action="?modulo=login&pagina=cadastro" method="POST">
    <fieldset>
        <legend>Cadastro de Login</legend>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required autocomplete="off">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required autocomplete="off">
        <br>
        <br>
    </fieldset>

    <a class="btn btn-light" href="?modulo=login&pagina=login">Voltar</a>
    <input type="submit" class="btn btn-dark" value="Salvar" name="salvar">
</form>

<?php
    $achou = false;
    if ( isset($_POST['login']) && isset($_POST['senha']) && $_POST['email']) {
        $login = $_POST['login'];
        $senha = md5 ($_POST['senha']);
        $email = $_POST['email'];

        if (isset($_POST['salvar'])) {
            $query = $conecta->query("SELECT `login` FROM `login`");
            while ($dados = $query->fetch_assoc()) {
                if ($dados['login'] == $login) {
                    echo '<div class="alert alert-success" role="alert">Usuário já cadastrado</div>';
                    $achou = true;
                }
            }
            if ($achou == false) {
                $conecta->query("INSERT INTO `login` (`login`, `senha`, `email`) VALUES ('$login','$senha','$email')");
                echo '<div class="alert alert-success" role="alert">Cadastro efetuado com sucesso</div>';
            }
        }
    }
?>