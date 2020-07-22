<form action="?modulo=fornecedores&pagina=cadastro" method="post">
    <fieldset>
        <legend>Cadastro de Fornecedores</legend>
        <label for="nomeCompanhia">Nome da Companhia:</label>
        <input type="text" id="nomeCompanhia" name="nomeCompanhia" required autocomplete="off">
        <br><br>
        <label for="nomeContato">Nome do Contato:</label>
        <input type="text" id="nomeContato" name="nomeContato" autocomplete="off">
        <br><br>
        <label for="titulo">Cargo do Contato:</label>
        <input type="text" id="titulo" name="titulo" autocomplete="off">
        <br><br>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" autocomplete="off">
        <br><br>
        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" autocomplete="off">
        <br><br>
        <label for="regiao">Região:</label>
        <input type="text" id="regiao" name="regiao" autocomplete="off">
        <br><br>
        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" autocomplete="off">
        <br><br>
        <label for="pais">Pais:</label>
        <input type="text" id="pais" name="pais" autocomplete="off">
        <br><br>
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone">
        <br><br>
        <label for="fax">Fax:</label>
        <input type="text" id="fax" name="fax" autocomplete="off">
        <br><br>
        <label for="website">Website:</label>
        <input type="text" name="website" id="website">
        <br><br>
        <input type="submit" value="Salvar" name="salvar">
    </fieldset>
</form>

<?php
    $query = $conecta->query("SELECT IDFornecedor FROM fornecedores ORDER BY 1 DESC LIMIT 1");
    $dados = $query->fetch_assoc();
    $dados = $dados['IDFornecedor'] + 1;

    if (isset($_POST['nomeCompanhia'])) {
        $nomeCompanhia = $_POST['nomeCompanhia'];
        $nomeContato = $_POST['nomeContato'];
        $titulo = $_POST['titulo'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $regiao = $_POST['regiao'];
        $cep = $_POST['cep'];
        $pais = $_POST['pais'];
        $telefone = $_POST['telefone'];
        $fax = $_POST['fax'];
        $website = $_POST['website'];

        if (isset($_POST['salvar'])) {
            $conecta->query("INSERT INTO `fornecedores` VALUES ($dados,'$nomeCompanhia','$nomeContato','$titulo','$endereco',
            '$cidade','$regiao','$cep','$pais','$telefone','$fax','$website')");
        }
    }
?>