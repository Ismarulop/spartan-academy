<?php
require("clases/Actividad.php");

function validarSubidaArchivos(){
    if(!isset($_FILES["imgActividad"])) return false;
    $tipo =  explode("/",$_FILES["imgActividad"]["type"])[0];
    if($tipo != "image") return false;
    return true;
}

if (isset($_POST['crear'])) {
    $errores = [];
    $nombre = $_POST['nombreClase'];
    $descripcion = $_POST['descripcion'];
    $imgActividad=null;
    $id_profesor = $_SESSION['login']['datosUsuario']['userName'];    
    $codClase = $nombre;

    if(validarSubidaArchivos()){
        $tmp = $_FILES["imgActividad"]["tmp_name"];
        $imgActividad =  $_FILES["imgActividad"]["name"];
        $tamaño =  $_FILES["imgActividad"]["size"];
        move_uploaded_file($_FILES["imgActividad"]["tmp_name"],"imagenes/subidas/$imgActividad");
        echo "La imagen se ha subido <b>con exito</b>. Tamaño de archivo <b>$tamaño bytes</b> Nombre imagen <b>$imgActividad</b> <br>";
    }else{
       array_push($errores, "No se ha podido subir la imagen");
    };


    $actividad = new Actividad();
    $actividad->construirActividad($codClase, $nombre, $descripcion, $id_profesor,$imgActividad);

    if (empty($nombre) || empty($descripcion)) {
        array_push($errores, "*Es obligatorio completar todos los campos");
    } else {
        if ($actividad->existeActividad($nombre)) {
            array_push($errores, "ya existe esta actividad");
        }
    }
    if (empty($errores)) {
        echo "Se ha creado con éxito la actividad de " . $nombre;
        $actividad->insertarActividad();
    } else {        
        echo "Error al crear la actividad";
    }
}
?>

<h1>PAGINA DE PROFESOR</h1>

<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Crear clase
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form id="formCrearClase" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>?p=homeProfesor" enctype="multipart/form-data">
            <label for="nombreClase">Nombre Clase</label>
            <input name="nombreClase" type="text" class="form-control"><br>
            <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion actividad"></textarea><br>
            <input name="imgActividad" type="file"><br><br>

            <input type="submit" value="Crear" class="btn btn-info btn-block rounded-0 py-2" name="crear">

        </form>
    </div>
</div>





<br><br><br><br>
<div class="row" id="sobreNosotros">
    <div class="jumbotron">
        <h1 class="display-4">Sobre Spartan Academy</h1>
        <p class="lead">Somos un centro deportivo dedicado a las artes marciales. En nuestro centro podras practicar diferentes disciplinas de los mejores profesores.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
    </div>
</div>
<div class="row" id="contacto">
    <form action="mailto:spartan.academy12@gmail.com" method="post">
        <div class="card border-primary rounded-0">
            <div class="card-header p-0">
                <div class="bg-info text-white text-center py-2">
                    <h3><i class="fa fa-envelope"></i> Contactanos</h3>
                    <p class="m-0">Con gusto te ayudaremos</p>
                </div>
            </div>
            <div class="card-body p-3">

                <!--Body-->
<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
        </div>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" required>
    </div>
</div>
<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
        </div>
        <input type="email" class="form-control" id="nombre" name="email" placeholder="ejemplo@gmail.com" required>
    </div>
</div>

<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
        </div>
        <textarea class="form-control" placeholder="Envianos tu Mensaje" required></textarea>
    </div>
</div>

<div class="text-center">
    <input type="submit" value="Enviar" class="btn btn-info btn-block rounded-0 py-2">
</div>
</div>

</div>
</form>
</div>

<script src="JS/crearActividad.js"></script>