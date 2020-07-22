<table border='1'>
    <tr>
        <th>IDOrdem</th>
        <th>IDProduto</th>
        <th>Preço Unitário</th>
        <th>Quantidade</th>
        <th>Desconto</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </tr>
    <tr>
        <?php
            $query = $conecta->query("SELECT * FROM ordens_detalhes ORDER BY 1 LIMIT 50");
            while ($dados = $query->fetch_assoc()) {
        ?>    
            <tr>
                <td><?=$dados['IDOrdem']?></td>
                <td><?=$dados['IDProduto']?></td>
                <td><?=$dados['PrecoUnitario']?></td>
                <td><?=$dados['Quantidade']?></td>
                <td><?=$dados['Desconto']?></td>
                <td><a href="?modulo=ordensDetalhes&pagina=listagem&id=<?=$dados['IDOrdem']?>&id2=<?=$dados['IDProduto']?>#desce">Alterar</a></td>
                <td><a href="?modulo=ordensDetalhes&pagina=listagem&idDelete=<?=$dados['IDOrdem']?>&idDelete2=<?=$dados['IDProduto']?>">Deletar</a></td>
            </tr>
        <?php
            }
        ?>
    </tr>
</table>

<?php
    if (isset($_GET['id']) && isset($_GET['id2'])) {
        $id = $_GET['id'];
        $idP = $_GET['id2'];
        $query = $conecta->query("SELECT * FROM ordens_detalhes WHERE IDOrdem = $id AND IDProduto = $idP");
        $dados = $query->fetch_assoc();
    }
?>
<form action="?modulo=ordensDetalhes&pagina=listagem" method="post" id="desce">
    <fieldset>
        <legend>Alteração Ordem Detalhes</legend>
        <label for="id">IDOrdem</label>
        <input type="text" readonly value="<?=$dados['IDOrdem']?>" id="id" name="id">
        <br><br>
        <label for="idP">IDProduto</label>
        <input type="text" readonly value ="<?=$dados['IDProduto']?>" id="idP" name="idP">
        <br><br>
        <label for="preco">Preço Unitário:</label>
        <input type="number" step="any" id="preco" name="preco" value="<?=$dados['PrecoUnitario']?>" required>
        <br><br>
        <label for="quantidade">Quantidade</label>
        <input type="number" id="quantidade" name="quantidade" value="<?=$dados['Quantidade']?>" required>
        <br><br>
        <label for="desconto">Desconto:</label>
        <input type="number" step="any" id="desconto" name="desconto" value="<?=$dados['Desconto']?>" required>
        <br><br>
        <input type="submit" value="Alterar" name="alterar">
    </fieldset>
</form>
<?php
    if (isset($_POST['preco'])) {
        $id = $_POST['id'];
        $idP = $_POST['idP'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $desconto = $_POST['desconto'];

        if (isset($_POST['alterar'])) {
            $conecta->query("UPDATE `ordens_detalhes` SET `IDOrdem`=$id,`IDProduto`=$idP,`PrecoUnitario`=$preco,
            `Quantidade`=$quantidade,`Desconto`=$desconto WHERE IDOrdem = $id AND IDproduto = $idP");
        }
    }

    if (isset($_GET['idDelete']) && isset($_GET['idDelete2'])) {
        $idOrdem = $_GET['idDelete'];
        $idProduto = $_GET['idDelete2'];
        $conecta->query("DELETE FROM `ordens_detalhes` WHERE IDOrdem = $idOrdem AND IDProduto = $idProduto");
    }
?>