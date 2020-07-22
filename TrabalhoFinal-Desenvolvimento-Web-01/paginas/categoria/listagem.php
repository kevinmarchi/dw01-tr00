<br>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome da Categoria</th>
        <th scope="col">Descricao</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    <tr>
        <?php
            $query = $conecta->query("SELECT * FROM categorias ORDER BY 1");

            while ($dados = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <td scope="row"><?=$dados['IDCategoria']?></td>
                        <td><?=$dados['NomeCategoria']?></td>
                        <td><?=$dados['Descricao']?></td>
                        <td><a href="?modulo=categoria&pagina=listagem&id=<?=$dados['IDCategoria']?>&#desce">Alterar</a></td>
                        <td><a href="?modulo=categoria&pagina=listagem&idDelete=<?=$dados['IDCategoria']?>">Deletar</a></td>
                    </tr>
                <?php
            }
        ?>
    </tr>
</table>
<br>

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $conecta->query("SELECT * FROM categorias WHERE IDCategoria = $id ");
        $dados = $query->fetch_assoc();
    }
?>

<form action="?modulo=categoria&pagina=listagem" method="POST" id="desce">
    <fieldset>
            <input type="hidden" name="id" value="<?=$id?>">

            <legend>Categoria</legend>
            <div class="form-group">
                <label for="NomeCategoria">Nome da Categoria:</label>
                <input type="text" id="NomeCategoria" name="NomeCategoria" required autocomplete="off" value="<?=$dados['NomeCategoria']?>"> 
            </div>    
      
            <div class="form-group">
                <label for="Descricao">Descricao:</label>
                <input type="text" id="Descricao" name="Descricao" required autocomplete="off" value="<?=$dados['Descricao']?>">     
            </div>          

            <button class="btn btn-primary" type="submit" name="alterar" >Alterar</button>
    </fieldset>
</form>
<?php
    if (isset($_POST['alterar'])) {
        $sNome = $_POST['NomeCategoria'];
        $sDescricao = $_POST['Descricao'];
        $id = $_POST['id'];

        $conecta->query("UPDATE `categorias` SET `NomeCategoria`= '$sNome',`Descricao`= '$sDescricao' WHERE `IDCategoria`= '$id'");
    }

    if (isset($_GET['idDelete'])) {
        $idDelete = $_GET['idDelete'];
        $conecta->query("DELETE FROM categorias WHERE `IDCategoria` = '$idDelete'") or die ('Erro ao deletar');
    }
?>       

    
    