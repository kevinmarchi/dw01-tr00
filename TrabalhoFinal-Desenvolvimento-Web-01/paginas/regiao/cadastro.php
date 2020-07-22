
<form action="?modulo=regiao&pagina=cadastro" method="post">
    <fieldset>
        <legend>Cadastro de Região</legend>

        <label for="DescricaoRegiao">Descrição Região:</label>
        <input type="text" id="DescricaoRegiao" name="DescricaoRegiao" required autocomplete="off">
        <br>
        <button class="btn btn-primary" type="submit" name="salvar" >Salvar</button>
    </fieldset>
</form>

<?php
    
    if (isset($_POST['salvar'])) {
        $sNome = $_POST['DescricaoRegiao'];

        $query = $conecta->query("SELECT COUNT('IDRegiao') AS max FROM regiao");
        $dados = $query->fetch_assoc();
        $id= $dados['max'] + 1;

        $conecta->query("INSERT INTO `regiao` VALUES ('$id','$sNome')");
        header('location:?modulo=regiao&pagina=listagem');
    }
?>