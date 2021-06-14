<?php

require("clases/Usuario.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['passLogin'];


    if ($datosUsuario = Usuario::comprobarContraseñaCorreo($email, $pass)) {
        $_SESSION['login']['datosUsuario'] = $datosUsuario;
        if ($datosUsuario['esProfesor'] == 0) {
            header("location: index.php?p=homeUser");
        } else {
            header("location: index.php?p=homeProfesor");
        }
    } else {
        echo "<div class='row alert alert-danger'>Combinación usuario y contraseña incorrectos</div>";
    }
} ?>

<div id="loginForm" class="row">
    <div class="col-md-3">
        <div class="card border-danger rounded-0">
            <div class="card-header p-0">
                <div class="bg-dark text-white text-center py-2">
                    <h2>INICIAR SESION</h2>
                </div>
            </div>
            <form id="loginForm" onkeyup="validarFormulario(event)" action="<?php echo $_SERVER['PHP_SELF'] ?>?p=login" method="POST">
                <div class="col-md-7 mb-3 p-2">
                    <label for="email">Email</label>
                    <input value="" name="email" type="email" class="form-control" id="email" placeholder="Ej:nombre@gmail.com">
                </div>
                <div class="mb-3 p-2">
                    <label for="passLogin" class="form-label">Contraseña</label><br>
                    <input type="password" name="passLogin" id="passLogin">
                </div>

                <button type="submit" name="login" class="btn btn-primary">Iniciar Sesion</button>
        </div>
        </form>

    </div>
    <!-- <div class="col-md-7">

    </div> -->
</div>

<script src="JS/validacionRegistro.js"></script>