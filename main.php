<div class="container">
    
    <?php
    if (isset($_GET["p"])) {

        switch ($_GET["p"]) {
            case 'paginaPrincipal':
                include "paginaPrincipal.php";
                break;
            case 'homeUser':
                include "homeUser.php";
                break;
            case 'homeProfesor':
                include "homeProfesor.php";
                break;
            case 'login':
                include "login.php";
                break;

            case 'register':
                include "register.php";
                break;

            case 'registerUser':
                include "registerUser.php";
                break;
            case 'registerProfesor':
                include "registerProfesor.php";
                break;
            case 'paginaClases':
                include "paginaClases.php";
                break;
            case 'horarios':
                include "horarios.php";
                break;
            case 'cerrarSesion':
                session_destroy();
                header("location: index.php?p=paginaPrincipal");
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