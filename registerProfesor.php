<?php
require("clases/Profesor.php");

if (isset($_POST['registrarProf'])) {
    $errores = [];
    $user = new Profesor();

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $userName = $_POST['userName'];
    $dni = $_POST['dni'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    // $imagenPerfil = $_POST['imagenPerfil'];

    if (empty($userName) || empty($nombre) || empty($apellidos) || empty($dni) || empty($edad) || empty($email) || empty($pass) || empty($pass2)) {
        array_push($errores, "*Es obligatorio completar todos los campos");
    } else {
        if ($pass != $pass2) {
            array_push($errores, "Las contraseñas no coinciden");
        }
        if ($user->comprobarSiExiste($email)) {
            array_push($errores, "Este email ya existe.");
        }
        if($user->comprobarSiExisteUserName($userName)){
            array_push($errores, "El nombre de usuario ya existe.");
        }
        if($user->comprobarSiExisteDni($dni)){
            array_push($errores, "El dni introducido ya ha sido utilizado.");
        }
    }
    if (empty($errores)) {
        $user->construirUser($userName, $nombre, $apellidos, $dni, $edad, $email, $pass);
        $user->InsertarProfesor();
        echo "Usuario $email guardado correctamente";
    }
}
?>



<h2>Registrarse profesor</h2>

<form id="formRegister" onkeyup="validarFormulario(event)" method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>?p=registerProfesor" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input value="Luis" name="nombre" type="text" class="form-control" id="nombre">
        </div>
        <div class="form-group col-md-6">
            <label for="Apellidos">Apellidos</label>
            <input value="Rubio" name="apellidos" type="text" id="apellidos" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="userName">Nombre de usuario</label>
            <input value="Luis1" name="userName" type="text" class="form-control" id="userName">
        </div>
        <div class="form-group col-md-4">
            <label for="dni">Dni</label>
            <input value="12345678A"name="dni" type="text" class="form-control" id="dni">
        </div>
        <div class="form-group col-md-4">
            <label for="edad">Edad</label>
            <input value="22" name="edad" type="text" class="form-control" id="dni">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input value="a@gmail.com" name="email" type="email" class="form-control" id="email" placeholder="Ej:nombre@gmail.com">
        </div>
        <div class="form-group col-md-6">
            <label for="pass">Password</label>
            <input value="1234" name="pass" type="password" class="form-control" id="pass">
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                6 a 16 caracteres, 1 Letra Mayúscula, 1 minuscula,1 caracter especia y no espacios en blanco
                </span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="pass2">Repeat Password</label>
            <input value="1234" name="pass2" type="password" class="form-control" id="pass2">
        </div>
    </div>

    <!-- <div class="form-group">
        <label for="imagenPerfil">Imagen de Perfil</label>
        <input name="imagenPerfil" type="file" class="form-control" id="imagenPerfil">
    </div> -->

    <button type="submit" class="btn btn-primary" name="registrarProf">Registrarse</button>
</form>

<?php

if (!empty($errores)) {
    foreach ($errores as $key => $value) {
        echo $value . '<br>';
    }
}
?>
</div>


<script src="JS/validacionRegistro.js"></script>