<?php
    for ($linha = 1; $linha <= 10; $linha++) {
        for ($coluna = 1; $coluna <= 4; $coluna++){
            $matriz[$linha][$coluna] = (rand(0,100));
            echo $matriz[$linha][$coluna], ' | ';
        }
        echo "<br>";
    }
 ?>