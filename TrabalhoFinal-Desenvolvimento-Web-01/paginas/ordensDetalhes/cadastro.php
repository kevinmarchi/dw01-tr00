<form action="?modulo=ordensDetalhes&pagina=cadastro" method="post">
    <fieldset>
        <legend>Cadastro de ordensDetalhes</legend>
        <label for="id">IDOrdem:</label>
        <select name="id" id="id">
            <?php
                $query = $conecta->query("SELECT IDOrdem, IDCliente FROM ordens ORDER BY 1");

                while ($dados = $query->fetch_assoc()){
            ?>
                <option value="<?=$dados['IDOrdem']?>"><?=$dados['IDOrdem']?> - <?=$dados['IDCliente']?></option>
            <?php
                }
            ?>
        </select>
        <br><br>
        <label for="idP">IDProduto:</label>
        <select name="idP" id="idP">
            <?php
                $query = $conecta->query("SELECT IDProduto, NomeProduto FROM produtos ORDER BY 1");

                while ($dados = $query->fetch_assoc()) {
            ?>
                <option value="<?=$dados['IDProduto']?>"><?=$dados['IDProduto']?> - <?=$dados['NomeProduto']?></option>
            <?php
                }
            ?>   
        </select>
        <br><br>
        <label for="preco">Preço Unitário</label>
        <input type="number" step="any" name="preco" id="preco" required autocomplete="off">
        <br><br>
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" id="quantidade" required autocomplete="off">
        <br><br>
        <label for="desconto">Desconto:</label>
        <input type="number" step="any" name="desconto" id="desconto" required autocomplete="off">
        <br><br>
        <input type="submit" value="Salvar" name="salvar">
    </fieldset>
</form>

<?php

    if (isset($_POST['preco'])) {
        $id = $_POST['id'];
        $idP = $_POST['idP'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $desconto = $_POST['desconto'];

        if (isset($_POST['salvar'])) {
            $conecta->query("INSERT INTO `ordens_detalhes` VALUES ($id,$idP,$preco,$quantidade,$desconto)");
        }
    }
?>