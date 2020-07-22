<?php 
    include 'header.php';

    if (!isset($_SESSION['login']) && !isset($_SESSION['senha'])) {
        $achou = false;
        if (isset($_GET['modulo']) && isset($_GET['pagina'])) {
            $modulo = $_GET['modulo'];
            $pagina = $_GET['pagina'];
            
            if ($modulo == 'login' && $pagina == 'cadastro') {
                include 'paginas/login/cadastro.php';
                $achou = true;
            }
        }
        if ($achou == false) {
            include 'paginas/login/login.php';
        }
    }
    else if (isset($_GET['modulo']) && isset($_GET['pagina'])) {
        include 'layouts/menu.php';
        include 'paginas/'.$_GET['modulo'].'/'.$_GET['pagina'].'.php';
    }
    else {
        include 'layouts/menu.php';
        include 'paginas/home.php';
    }

    include 'footer.php';
?>