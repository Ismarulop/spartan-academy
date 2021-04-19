<div class="container">
    
    <?php
    if (isset($_GET["p"])) {

        switch ($_GET["p"]) {
            case 'paginaPrincipal':
                include "paginaPrincipal.php";
                break;
            case 'login':
                include "login.php";
                break;

            case 'register':
                include "register.php";
                break;

            default:
                include "paginaPrincipal.php";
                break;
        }
    }else{
        include "paginaPrincipal.php";
    }
    ?>

</div>