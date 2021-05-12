<?php

require("clases/Usuario.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['passLogin'];

    
    if ($datosUsuario=Usuario::comprobarContraseñaCorreo($email, $pass)) {
        
        var_dump($datosUsuario);
        $user=new Usuario();
        var_dump($user);
        $_SESSION['login']['datosUsuario'] = $datosUsuario;
        if($datosUsuario['esProfesor']==0){
            header("location: index.php?p=homeUser");
        }else{
            header("location: index.php?p=homeProfesor");
        }

    } else {
        echo "Combinación usuario y contraseña incorrectos";
    }
} ?>

<div class="row">
    <div class="col-md-5">
        <h2>Iniciar sesion</h2>
        <form id="loginForm" onkeyup="validarFormulario(event)" action="<?php echo $_SERVER['PHP_SELF']?>?p=login" method="POST">
            <div class="mb-3">
            <label for="email">Email</label>
            <input value="a@gmail.com" name="email" type="email" class="form-control" id="email" placeholder="Ej:nombre@gmail.com">
            </div>
            <div class="mb-3">
                <label for="passLogin" class="form-label">Contraseña</label><br>
                <input type="password"  name="passLogin" id="passLogin">
            </div>

            <button type="submit" name="login" class="btn btn-primary">Iniciar Sesion</button>

        </form>

    </div>
    <div class="col-md-7">

    </div>
</div>

<script src="JS/validacionRegistro.js"></script>