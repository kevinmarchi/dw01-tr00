</div>
<ul class="nav">
    <?php
        $query = $conecta->query("SELECT * FROM `menu` ORDER BY `ordem`");

        while ($dados = $query->fetch_assoc()) {
            ?>
            
            <li class="nav-item">
                <a href="<?=$dados['endereco']?>" class="nav-link"><?=$dados['descricao']?></a>
            </li>
            
            <?php
        }
    ?>    
</ul>

<div class="container">