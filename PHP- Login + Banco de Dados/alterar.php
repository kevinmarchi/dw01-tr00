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
    <style>
        table {
            width: 50%;
        }
    </style>
</head>
<body>   
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Alterar</th>
            <th>Deletar</th>
        </tr>
        <?php
            include 'conexao.php';

            $query = $conecta->query("SELECT `id`, `nome`, `idade` FROM `cadastro`");

            while($dados = $query->fetch_assoc()) {
                $id = $dados['id'];
                $nome = $dados['nome'];
                $idade = $dados['idade'];
                echo 
                "<tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$idade</td>
                    <td> <a href='alterar.php?id=$id&nome=$nome&idade=$idade'>Alterar</a> </td>
                    <td> <a href='alterar.php?idDelete=$id'>Deletar</a> </td>
                </tr>";
            }
            
            if (isset($_GET['id'])) {
                $aId = $_GET['id'];
                $aNome = $_GET['nome'];
                $aIdade = $_GET['idade'];
            }
            else {
                $aNome = ' ';
            }
            ?>
    </table>
    <br>
    <br>
    <br>
    <form action="alterar.php" method="get">
            <legend>Alterar Cadastro</legend>
            <fieldset>
                <input type="hidden" name="id" value="<?php echo "$aId" ?>">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required value="<?php echo "$aNome" ?>" autocomplete="off" >
                <br>
                <br>
                <label for="idade">Idade:</label>
                <input type="number" name="idade" id="idade" required value="<?php echo "$aIdade" ?>" autocomplete="off">
                <br>
                <br>
                <input type="submit" value="Salvar" name="gravar">
            </fieldset>
    </form>

    <?php
        include 'conexao.php';

        if (isset($_GET['nome']) && isset($_GET['idade'])) {
            $id3 = $_GET['id'];
            $nome2 = $_GET['nome'];
            $idade2 = $_GET['idade'];
        }        
    
        if (isset($_GET['gravar'])) {
            $conecta->query("UPDATE `cadastro` SET `nome` = '$nome2', `idade` = $idade2 WHERE `id` = $id3");
            header('location: alterar.php');
        }

        if (isset($_GET['idDelete'])) {
            $idDelete = $_GET['idDelete'];
            $conecta->query("DELETE FROM cadastro WHERE id = $idDelete");
            header('location: alterar.php');
        }
    ?>
    <br>
    <br>
    <a href="cadastro.php">Página de Cadastro</a>
    <br>
    <br>
    <a href="login.php?deslogar=true">Deslogar</a>
</body>
</html>