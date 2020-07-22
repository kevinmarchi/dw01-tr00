
<form action="?modulo=produtos&pagina=cadastro" method="POST">
    <fieldset>
        <legend>Cadastro de Produtos</legend>
        <label for="nome">Nome do produto:</label>
        <input type="text" id="nome" name="nome" required autocomplete="off">
        <br>
        <br>
        <label for="fornecedor">Fornecedor:</label>
        <select name="fornecedor" id="fornecedor">
            <option value=" ">Selecione...</option>
            <?php
                $query = $conecta->query("SELECT IDFornecedor, NomeCompanhia FROM fornecedores ORDER BY 1");
                while ($dados = $query->fetch_assoc()) {
                    ?>
                    <option value="<?=$dados['IDFornecedor']?>"><?=$dados['IDFornecedor']?> - <?=$dados['NomeCompanhia']?></option>
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
                while ($dados = $query->fetch_assoc()) {
                    ?>
                    <option value="<?=$dados['IDCategoria']?>"><?=$dados['IDCategoria']?> - <?=$dados['NomeCategoria']?></option>
                    <?php
                }
            ?>
        </select>
        <br>
        <br>
        <label for="quantidadePUnidade">Quantidade por Unidade:</label>
        <input type="text" name="quantidadePUnidade" id="quantidadePUnidade" required>
        <br>
        <br>
        <label for="preco">Preço Unitário:</label>
        <input type="number" id="preco" name="preco" required>
        <br>
        <br>
        <label for="unidadesEstoque">Unidades em Estoque:</label>
        <input type="number" name="unidadesEstoque" id="unidadesEstoque" required>
        <br>
        <br>
        <label for="unidadesOrdem">Unidades em Ordem:</label>
        <input type="number" name="unidadesOrdem" id="unidadesOrdem" required>
        <br>
        <br>
        <label for="nivelReposicao">Nível de Reposição:</label>
        <input type="number" name="nivelReposicao" id="nivelReposicao" required>
        <br>
        <br>
        <label for="descontinuado">Descontinuado:</label>
        <br>
        <input type="radio" id="F" name="descontinuado" value="F" checked>
        <label for="F">Não</label>
        <input type="radio" id="T" name="descontinuado" value="T">
        <label for="T">Sim</label>
        <br>
        <br>
        <input type="submit" name="salvar" value="Salvar">
    </fieldset>
</form>

<?php
    if (isset($_POST['nome'])) {
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

    $query = $conecta->query("SELECT IDProduto FROM `produtos` ORDER BY 1 DESC LIMIT 1");
    $numero = $query->fetch_assoc();
    $numero = $numero['IDProduto'] + 1;

    if (isset($_POST['salvar'])) {
        $conecta->query("INSERT INTO `produtos` VALUES ($numero,'$nome','$fornecedor','$categoria','$quantidadePUnidade','$preco','$unidadesEstoque','$unidadesOrdem','$nivelReposicao','$descontinuado')");
    }
?>