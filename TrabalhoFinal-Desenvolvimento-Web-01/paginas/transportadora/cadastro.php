
<form action="?modulo=transportadora&pagina=cadastro" method="post">
    <fieldset>
        <legend>Cadastro de Transportadora</legend>

        <label for="NomeConpanhia">Nome da Transportadora:</label>
        <input type="text" id="NomeConpanhia" name="NomeConpanhia" required autocomplete="off">
        <label for="Telefone">Telefone:</label>
        <input type="text" id="Telefone" name="Telefone" required autocomplete="off">
        <br>
        <button class="btn btn-primary" type="submit" name="salvar" >Salvar</button>
    </fieldset>
</form>

<?php
    
    if (isset($_POST['salvar'])) {
        $sNome = $_POST['NomeConpanhia'];
        $sTelefone = $_POST['Telefone'];

        $query = $conecta->query("SELECT COUNT('IDTransportadora') AS max FROM regiao");
        $dados = $query->fetch_assoc();
        $id= $dados['max'] + 1;

        $conecta->query("INSERT INTO `transportadoras`(`IDTransportadora`,`NomeConpanhia`, `Telefone`) VALUES ('$id','$sNome', '$sTelefone')");
        header('location:?modulo=transportadora&pagina=listagem');
    }
?>