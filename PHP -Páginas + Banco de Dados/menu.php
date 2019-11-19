<nav>
    <?php
        include 'conexao.php';

        $query = $conecta->query("SELECT * FROM menu ORDER BY ordem");

         while ($dados = $query->fetch_assoc()) {
            echo '<a href="'.$dados['endereco'].'" class="'.$dados['classe'].'">'.$dados['descricao'].'</a>';
         }    
    ?>
</nav>