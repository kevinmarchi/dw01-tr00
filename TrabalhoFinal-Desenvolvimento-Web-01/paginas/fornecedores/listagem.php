<table border='1'>
    <tr>
        <th>IDFornecedor</th>
        <th>NomeCompanhia</th>
        <th>NomeContato</th>
        <th>TituloContato</th>
        <th>Endereço</th>
        <th>Cidade</th>
        <th>Região</th>
        <th>CEP</th>
        <th>Pais</th>
        <th>Telefone</th>
        <th>Fax</th>
        <th>Website</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </tr>
    <?php
        $query = $conecta->query("SELECT * FROM fornecedores ORDER BY 1");

        while ($dados = $query->fetch_assoc()) {
    ?>
            <tr>
                <td><?=$dados['IDFornecedor']?></td>
                <td><?=$dados['NomeCompanhia']?></td>
                <td><?=$dados['NomeContato']?></td>
                <td><?=$dados['TItuloContato']?></td>
                <td><?=$dados['Endereco']?></td>
                <td><?=$dados['Cidade']?></td>
                <td><?=$dados['Regiao']?></td>
                <td><?=$dados['cep']?></td>
                <td><?=$dados['Pais']?></td>
                <td><?=$dados['Telefone']?></td>
                <td><?=$dados['Fax']?></td>
                <td><?=$dados['Website']?></td>
                <td><a href="?modulo=fornecedores&pagina=listagem&id=<?=$dados['IDFornecedor']?>#desce">Alterar</a></td>
                <td><a href="?modulo=fornecedores&pagina=listagem&idDelete=<?=$dados['IDFornecedor']?>">Deletar</a></td>
            </tr>
    <?php
        }
    ?>
</table>

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $conecta->query("SELECT * FROM fornecedores WHERE IDFornecedor = $id ");
        $dados = $query->fetch_assoc();
    }
?>

<form action="?modulo=fornecedores&pagina=listagem" method="post" id="desce">
    <fieldset>
        <legend>Alteração de Fornecedores</legend>
        <label for="idFornecedor">IDFornecedor:</label>
        <input type="text" name="idFornecedor" id="idFornecedor" readonly value="<?=$dados['IDFornecedor']?>">
        <br><br>
        <label for="nomeCompanhia">Nome da Companhia:</label>
        <input type="text" name="nomeCompanhia" id="nomeCompanhia" required value="<?=$dados['NomeCompanhia']?>">
        <br><br>
        <label for="nomeContato">Nome do Contato:</label>
        <input type="text" name="nomeContato" id="nomeContato" value="<?=$dados['NomeContato']?>">
        <br><br>
        <label for="tituloContato">Cargo do Contato:</label>
        <input type="text" name="tituloContato" id="tituloContato" value="<?=$dados['TItuloContato']?>">
        <br><br>
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="<?=$dados['Endereco']?>">
        <br><br>
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="<?=$dados['Cidade']?>">
        <br><br>
        <label for="regiao">Região:</label>
        <input type="text" name="regiao" id="regiao" value="<?=$dados['Regiao']?>">
        <br><br>
        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" value="<?=$dados['cep']?>">
        <br><br>
        <label for="pais">Pais:</label>
        <input type="text" name="pais" id="pais" value="<?=$dados['Pais']?>">
        <br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" value="<?=$dados['Telefone']?>">
        <br><br>
        <label for="fax">Fax:</label>
        <input type="text" name="fax" id="fax" value="<?=$dados['Fax']?>">
        <br><br>
        <label for="website">Website:</label>
        <input type="text" name="website" id="website" value="<?=$dados['Website']?>">
        <br><br>
        <input type="submit" value="Alterar" name="alterar">
    </fieldset>
</form>

<?php
    if (isset($_POST['nomeCompanhia'])) {
        $id = $_POST['idFornecedor'];
        $nomeCompanhia = $_POST['nomeCompanhia'];
        $nomeContato = $_POST['nomeContato'];
        $titulo = $_POST['tituloContato'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $regiao = $_POST['regiao'];
        $cep = $_POST['cep'];
        $pais = $_POST['pais'];
        $telefone = $_POST['telefone'];
        $fax = $_POST['fax'];
        $website = $_POST['website'];
    }

    if (isset($_POST['alterar'])) {
        $conecta->query("UPDATE `fornecedores` SET `NomeCompanhia`= '$nomeCompanhia',`NomeContato`= '$nomeContato',
        `TItuloContato`= '$titulo',`Endereco`= '$endereco',`Cidade`= '$cidade',`Regiao`= '$regiao',`cep`= '$cep',
        `Pais`= '$pais',`Telefone`= '$telefone',`Fax`= '$fax',`Website`= '$website' WHERE IDFornecedor = $id");
    }

    if (isset($_GET['idDelete'])) {
        $idDelete = $_GET['idDelete'];
        $conecta->query("DELETE FROM `fornecedores` WHERE IDFornecedor = $idDelete") or die ('Erro ao deletar');
    }

?>