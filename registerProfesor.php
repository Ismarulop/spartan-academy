<?php
require("clases/Profesor.php");


function validarSubidaArchivos()
{

    if (!isset($_FILES["userImg"])) return false;
    $tipo =  explode("/", $_FILES["userImg"]["type"])[0];
    if ($tipo != "image") return false;
    return true;
}



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
    $userImg = null;

    if (validarSubidaArchivos()) {
        $tmp = $_FILES["userImg"]["tmp_name"];
        $userImg = uniqid() . $_FILES["userImg"]["name"];
        $tamaño =  $_FILES["userImg"]["size"];
        move_uploaded_file($_FILES["userImg"]["tmp_name"], "imagenes/subidas/$userImg");
        echo "<div class='alert alert-success'>La imagen se ha subido <b>con exito</b>. Tamaño de archivo <b>$tamaño bytes</b> Nombre imagen <b>$userImg</b></div> <br>";
    } else {
        echo "<div class='row alert alert-danger'>No se ha subido la imagen</div>";
    };


    if (empty($userName) || empty($nombre) || empty($apellidos) || empty($dni) || empty($edad) || empty($email) || empty($pass) || empty($pass2)) {
        array_push($errores, "<div class='row alert alert-danger'></div>*Es obligatorio completar todos los campos</div>");
    } else {
        if ($pass != $pass2) {
            array_push($errores, "<div class='row alert alert-danger'>Las contraseñas no coinciden</div>");
        }
        if ($user->comprobarSiExiste($email)) {
            array_push($errores, "<div class='row alert alert-danger'>Este email ya existe.</div>");
        }
        if ($user->comprobarSiExisteUserName($userName)) {
            array_push($errores, "<div class='row alert alert-danger'>El nombre de usuario ya existe.</div>");
        }
        if ($user->comprobarSiExisteDni($dni)) {
            array_push($errores, "<div class='row alert alert-danger'>El dni introducido ya ha sido utilizado.</div>");
        }
    }
    if (empty($errores)) {
        $user->construirUser($userName, $nombre, $apellidos, $dni, $edad, $email, $pass, $userImg);
        $user->InsertarProfesor();
        echo "<div class='row alert alert-success'>Usuario $email guardado correctamente</div>";
    }
}


if (!empty($errores)) {
    foreach ($errores as $key => $value) {
        echo $value;
    }
}

?>



<div class="card border-danger rounded-0">
    <div class="card-header p-0">
        <div class="bg-dark text-white text-center py-2">
            <h2 style="padding-top: 1em;">Registrarse profesor</h2>
            <br>
        </div>
    </div>
    <div class="card-body p-4">

        <form id="formRegister" onkeyup="validarFormulario(event)" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>?p=registerProfesor" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label>
                    <input value="" name="nombre" type="text" class="form-control" id="nombre">
                </div>
                <br>
                <div class="form-group col-md-6">
                    <label for="Apellidos">Apellidos</label>
                    <input value="" name="apellidos" type="text" id="apellidos" class="form-control">
                </div>
                <br>
                <div class="form-group col-md-4">
                    <label for="userName">Nombre de usuario</label>
                    <input value="" name="userName" type="text" class="form-control" id="userName">
                </div>
                <br>
                <div class="form-group col-md-4">
                    <label for="dni">Dni</label>
                    <input value="" name="dni" type="text" class="form-control" id="dni">
                </div>
                <br>
                <div class="form-group col-md-4">
                    <label for="edad">Edad</label>
                    <input value="" name="edad" type="text" class="form-control" id="dni">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input value="" name="email" type="email" class="form-control" id="email" placeholder="Ej:nombre@gmail.com">
                </div>
                <br>
                <div class="form-group col-md-6">
                    <label for="pass">Password</label>
                    <input value="" name="pass" type="password" class="form-control" id="pass">
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            6 a 16 caracteres, 1 Letra Mayúscula, 1 minuscula,1 caracter especia y no espacios en blanco
                        </span>
                    </div>
                </div>
                <br>
                <div class="form-group col-md-6">
                    <label for="pass2">Repeat Password</label>
                    <input value="" name="pass2" type="password" class="form-control" id="pass2">
                </div>
                <br>
                <div class="form-group col-md-4">
                    <input name="userImg" type="file">
                </div>
            </div>
            <br>

            <button type="submit" class="btn btn-primary" name="registrarProf">Registrarse</button>
    </div>
</div>
</form>

<script src="JS/validacionRegistro.js"></script>