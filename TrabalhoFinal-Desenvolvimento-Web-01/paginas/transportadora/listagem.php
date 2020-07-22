<br>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome da Transportadora</th>
        <th scope="col">Telefone</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    <tr>
        <?php
            $query = $conecta->query("SELECT * FROM transportadoras ORDER BY 1");

            while ($dados = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <td scope="row"><?=$dados['IDTransportadora']?></td>
                        <td><?=$dados['NomeConpanhia']?></td>
                        <td><?=$dados['Telefone']?></td>
                        <td><a href="?modulo=transportadora&pagina=listagem&id=<?=$dados['IDTransportadora']?>&#desce">Alterar</a></td>
                        <td><a href="?modulo=transportadora&pagina=listagem&idDelete=<?=$dados['IDTransportadora']?>">Deletar</a></td>
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
        $query = $conecta->query("SELECT * FROM transportadoras WHERE IDTransportadora = $id ");
        $dados = $query->fetch_assoc();
    }
?>

<form action="?modulo=transportadora&pagina=listagem" method="POST" id="desce">
    <fieldset>
            <input type="hidden" name="id" value="<?=$id?>">

            <legend>Cadastro de Transportadora</legend>
            <div class="form-group">
                <label for="nome">Nome da Transportadora:</label>
                <input type="text" id="nome" name="nome" required autocomplete="off" value="<?=$dados['NomeConpanhia']?>">
            </div>    

            <div class="form-group">

                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required autocomplete="off" value="<?=$dados['Telefone']?>">
            </div>          
            <button class="btn btn-primary" type="submit" name="alterar" >Alterar</button>
    </fieldset>
</form>
<?php
    if (isset($_POST['alterar'])) {
        $sNome = $_POST['nome'];
        $sTelefone = $_POST['telefone'];
        $id = $_POST['id'];

        $conecta->query("UPDATE `transportadoras` SET `NomeConpanhia`= '$sNome',`Telefone`= '$sTelefone' WHERE `IDTransportadora`= '$id'");
    }

    if (isset($_GET['idDelete'])) {
        $idDelete = $_GET['idDelete'];
        $conecta->query("DELETE FROM transportadoras WHERE `IDTransportadora` = '$idDelete'") or die ('Erro ao deletar');
    }
?>       

    
    