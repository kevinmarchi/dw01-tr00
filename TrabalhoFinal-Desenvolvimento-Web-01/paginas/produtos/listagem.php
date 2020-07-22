<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome do Produto</th>
        <th>ID Fornecedor</th>
        <th>ID Categoria</th>
        <th>Quantidade por unidade</th>
        <th>Preço Unitário</th>
        <th>Unidades em estoque</th>
        <th>Unidades em ordem</th>
        <th>Nível de Reposição</th>
        <th>Descontinuado</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </tr>
    <tr>
        <?php
            $query = $conecta->query("SELECT * FROM PRODUTOS ORDER BY 1");

            while ($dados = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?=$dados['IDProduto']?></td>
                        <td><?=$dados['NomeProduto']?></td>
                        <td><?=$dados['IDFornecedor']?></td>
                        <td><?=$dados['IDCategoria']?></td>
                        <td><?=$dados['QuantidadePorUnidade']?></td>
                        <td><?=$dados['PrecoUnitario']?></td>
                        <td><?=$dados['UnidadesEmEstoque']?></td>
                        <td><?=$dados['UnidadesEmOrdem']?></td>
                        <td><?=$dados['NivelDeReposicao']?></td>
                        <td><?=$dados['Descontinuado']?></td>
                        <td><a href="?modulo=produtos&pagina=listagem&id=<?=$dados['IDProduto']?>&#desce">Alterar</a></td>
                        <td><a href="?modulo=produtos&pagina=listagem&idDelete=<?=$dados['IDProduto']?>">Deletar</a></td>
                    </tr>
                <?php
            }
        ?>
    </tr>
</table>
<br>
<br>
<br>
<form action="?modulo=produtos&pagina=listagem" method="POST" id="desce">
    <fieldset>
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = $conecta->query("SELECT * FROM `produtos` WHERE IDProduto = '$id'");
                $dados = $query->fetch_assoc();
            }
            ?>
            <input type="hidden" name="id" value="<?=$id?>">
            <legend>Cadastro de Produtos</legend>
            <label for="nome">Nome do produto:</label>
            <input type="text" id="nome" name="nome" autocomplete="off" value="<?=$dados['NomeProduto']?>">
            <br>
            <br>
            <label for="fornecedor">Fornecedor:</label>
            <select name="fornecedor" id="fornecedor">
                <option value=" ">Selecione...</option>
            <?php
                $query = $conecta->query("SELECT IDFornecedor, NomeCompanhia FROM fornecedores ORDER BY 1");
                while ($dados2 = $query->fetch_assoc()) {
                    ?>
                    <option <?=($dados2['IDFornecedor'] == $dados['IDFornecedor'])?'selected':' ' ?> value="<?=$dados2['IDFornecedor']?>"><?=$dados2['IDFornecedor']?> - <?=$dados2['NomeCompanhia']?></option>
                    <?php
                }
            ?>
            </select>
            <br>
            <br>
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">
                <option value=" ">Selecione...</option>
            <?php
                $query = $conecta->query("SELECT IDCategoria, NomeCategoria FROM categorias ORDER BY 1");
                while ($dados3 = $query->fetch_assoc()) {
                    ?>
                    <option <?=($dados3['IDCategoria'] == $dados['IDCategoria'])?'selected':' ' ?> value="<?=$dados3['IDCategoria']?>"><?=$dados3['IDCategoria']?> - <?=$dados3['NomeCategoria']?></option>
                    <?php
                }
            ?>
            </select>
            <br>
            <br>
            <label for="quantidadePUnidade">Quantidade por Unidade:</label>
            <input type="text" name="quantidadePUnidade" id="quantidadePUnidade" value="<?=$dados['QuantidadePorUnidade']?>">
            <br>
            <br>
            <label for="preco">Preço Unitário:</label>
            <input type="number" step="any" id="preco" name="preco" value="<?=$dados['PrecoUnitario']?>">
            <br>
            <br>
            <label for="unidadesEstoque">Unidades em Estoque:</label>
            <input type="number" step="any" name="unidadesEstoque" id="unidadesEstoque" value="<?=$dados['UnidadesEmEstoque']?>">
            <br>
            <br>
            <label for="unidadesOrdem">Unidades em Ordem:</label>
            <input type="number" step="any" name="unidadesOrdem" id="unidadesOrdem" value="<?=$dados['UnidadesEmOrdem']?>">
            <br>
            <br>
            <label for="nivelReposicao">Nível de Reposição:</label>
            <input type="number" step="any" name="nivelReposicao" id="nivelReposicao" value="<?=$dados['NivelDeReposicao']?>">
            <br>
            <br>
            <label for="descontinuado">Descontinuado:</label>
            <br>
            <input type="radio" id="F" name="descontinuado" value="F" <?=$dados['Descontinuado'] == 'F' ? 'checked' : ' '?>>
            <label for="F">Não</label>
            <input type="radio" id="T" name="descontinuado" value="T" <?=$dados['Descontinuado'] == 'T' ? 'checked' : ' '?>>
            <label for="T">Sim</label>
            <br>
            <br>
            <input type="submit" name="alterar" value="Alterar">
            <?php
            if (isset($_POST['nome'])) {
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $fornecedor = $_POST['fornecedor'];
                $categoria = $_POST['categoria'];
                $quantidadePUnidade = $_POST['quantidadePUnidade'];
                $preco = $_POST['preco'];
                $unidadesEstoque = $_POST['unidadesEstoque'];
                $unidadesOrdem = $_POST['unidadesOrdem'];
                $nivelReposicao = $_POST['nivelReposicao'];
                $descontinuado = $_POST['descontinuado'];
            }
        ?>
    </fieldset>
</form>
<?php
    if (isset($_POST['alterar'])) {
        $conecta->query("UPDATE `produtos` SET `NomeProduto`='$nome',`IDFornecedor`=$fornecedor,`IDCategoria`=$categoria,
        `QuantidadePorUnidade`=$quantidadePUnidade,`PrecoUnitario`=$preco,`UnidadesEmEstoque`=$unidadesEstoque,
        `UnidadesEmOrdem`=$unidadesOrdem,`NivelDeReposicao`=$nivelReposicao,`Descontinuado`='$descontinuado' WHERE `IDProduto` = $id");
    }

    if (isset($_GET['idDelete'])) {
         $idDelete = $_GET['idDelete'];
        $conecta->query("DELETE FROM produtos WHERE IDProduto = $idDelete") or die ('Erro ao deletar');
    }
?>       

    
    