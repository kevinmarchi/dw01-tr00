
<form action="?modulo=categoria&pagina=cadastro" method="post">
    <fieldset>
        <legend>Cadastro de Categoria</legend>

        <label for="NomeCategoria">Nome da Categoria:</label>
        <input type="text" id="NomeCategoria" name="NomeCategoria" required autocomplete="off">

        <label for="Descricao">Descricao:</label>
        <input type="text" id="Descricao" name="Descricao" required autocomplete="off">

        <br>
        <button class="btn btn-primary" type="submit" name="salvar" >Salvar</button>
    </fieldset>
</form>

<?php
    
    if (isset($_POST['salvar'])) {
        $sNome = $_POST['NomeCategoria'];
        $sDescricao = $_POST['Descricao'];

        
        $query = $conecta->query("SELECT COUNT('IDCategoria') AS max FROM categorias");
        $dados = $query->fetch_assoc();
        $id= $dados['max'] + 1;

        $conecta->query("INSERT INTO `categorias`(`IdCategoria`, `NomeCategoria`, `Descricao`) VALUES ('$id', '$sNome', '$sDescricao')");
        header('location:?modulo=categoria&pagina=listagem');
    }
?>