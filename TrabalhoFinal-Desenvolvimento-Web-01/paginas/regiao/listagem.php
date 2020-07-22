<br>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Descrição Região</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    <tr>
        <?php
            $query = $conecta->query("SELECT * FROM regiao ORDER BY 1");

            while ($dados = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <td scope="row"><?=$dados['IDRegiao']?></td>
                        <td><?=$dados['DescricaoRegiao']?></td>
                        <td><a href="?modulo=regiao&pagina=listagem&id=<?=$dados['IDRegiao']?>&#desce">Alterar</a></td>
                        <td><a href="?modulo=regiao&pagina=listagem&idDelete=<?=$dados['IDRegiao']?>">Deletar</a></td>
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
        $query = $conecta->query("SELECT * FROM regiao WHERE IDRegiao = $id ");
        $dados = $query->fetch_assoc();
    }
?>

<form action="?modulo=regiao&pagina=listagem" method="POST" id="desce">
    <fieldset>
            <input type="hidden" name="id" value="<?=$id?>">

            <legend>Região</legend>
            <div class="form-group">
                <label for="nome">Descrição Região:</label>
                <input type="text" id="nome" name="nome" required autocomplete="off" value="<?=$dados['DescricaoRegiao']?>">
            </div>         
            <button class="btn btn-primary" type="submit" name="alterar" >Alterar</button>
    </fieldset>
</form>
<?php
    if (isset($_POST['alterar'])) {
        $sNome = $_POST['nome'];
        $id = $_POST['id'];

        $conecta->query("UPDATE `regiao` SET `DescricaoRegiao`= '$sNome' WHERE `IDRegiao`= '$id'");
    }

    if (isset($_GET['idDelete'])) {
        $idDelete = $_GET['idDelete'];
        $conecta->query("DELETE FROM regiao WHERE `IDRegiao` = '$idDelete'") or die ('Erro ao deletar');
    }
?>       

    
    