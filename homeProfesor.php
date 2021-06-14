<?php
require("clases/Actividad.php");
require("clases/Comentario.php");

function validarSubidaArchivos()
{
  if (!isset($_FILES["imgActividad"])) return false;
  $tipo =  explode("/", $_FILES["imgActividad"]["type"])[0];
  if ($tipo != "image") return false;
  return true;
}

if (isset($_POST['crear'])) {
  $errores = [];
  $nombre = $_POST['nombreClase'];
  $descripcion = $_POST['descripcion'];
  $imgActividad = null;
  $id_profesor = $_SESSION['login']['datosUsuario']['userName'];
  $codClase = $nombre;

  if (empty($_FILES['imgActividad'])) {
    if (validarSubidaArchivos()) {
      $tmp = $_FILES["imgActividad"]["tmp_name"];
      $imgActividad = uniqid() . $_FILES["imgActividad"]["name"];
      $tamaño =  $_FILES["imgActividad"]["size"];
      move_uploaded_file($_FILES["imgActividad"]["tmp_name"], "imagenes/subidas/$imgActividad");
      echo "<div class='alert alert-success'>La imagen se ha subido <b>con exito</b>. Tamaño de archivo <b>$tamaño bytes</b> Nombre imagen <b>$imgActividad</b></div> <br>";
    } else {
      array_push($errores, "<div class='aler alert-danger'>No se ha podido subir la imagen</div>");
    };
  }


  $actividad = new Actividad();
  $actividad->construirActividad($codClase, $nombre, $descripcion, $id_profesor, $imgActividad);

  if (empty($nombre) || empty($descripcion)) {
    array_push($errores, "<div class='aler alert-danger'>*Es obligatorio completar todos los campos</div>");
  } else {
    if ($actividad->existeActividad($nombre)) {
      array_push($errores, "<div class='aler alert-danger'>ya existe esta actividad</div>");
    }
  }
  if (empty($errores)) {
    echo "<div class='aler alert-success'>Se ha creado con éxito la actividad de " . $nombre . '</div>';
    $actividad->insertarActividad();
  } else {
    echo "<div class='aler alert-danger'>Error al crear la actividad</div>";
  }
}
var_dump($errores);
?>



<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Crear actividad
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
<div id="comentariosListados" class="row mb-5">
  <div class="container-fluid px-3 px-sm-5 my-5 text-center ">
    <h4 class="mb-5 font-weight-bold text-white">Reseñas de nuestros alumnos</h4>
    <div class="owl-carousel owl-theme">
      <?php
      $comentarios = Comentario::mostrarComentario();
      if (!$comentarios) {
        echo "no hay reseñas por el momento";
      } else {
        $contador = 0;
        $filas = $comentarios->num_rows;
        while ($u = $comentarios->fetch_assoc()) {
          $primero = false;
          $ultimo = false;
          if ($contador == 0) {
            $primero = true;
          }
          if ($contador == $filas - 1) {
            $ultimo = true;
          }
      ?>
          <div class="item <?php if ($primero) {
                              echo "first prev";
                            } elseif ($ultimo) {
                              echo "last";
                            } elseif ($contador == 1) {
                              echo "show";
                            } else {
                              echo "next";
                            }
                            ?> ">
            <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center"> <img src="
              <?php
              if ($u['imagen_perfil'] == null) {
                echo "imagenes/noImage.png";
              } else {
                echo "imagenes/subidas/" . $u['imagen_perfil'];
              }
              ?>
              " class="img-fluid profile-pic mb-4 mt-3"> </div>
              <h6 class="mb-3 mt-2"><?php echo $u['userName'] ?></h6>
              <p class="content mb-5 mx-2"><?php echo $u['contenido'] ?></p>
              <h3><?php for ($i = 0; $i < $u['rating']; $i++) {
                    echo "⭐";
                  } ?></h3>
            </div>
          </div>
      <?php
          $contador++;
        }
      }
      ?>
    </div>
  </div>
</div>
<div class="row mb-4" id="contacto">
  <form action="mailto:spartan.academy12@gmail.com" method="post">
    <div class="card border-danger rounded-0">
      <div class="card-header p-0">
        <div class="bg-dark text-white text-center py-2">
          <h3><i class="fa fa-envelope text-danger"></i> Contactanos</h3>
          <p class="m-0">Con gusto te ayudaremos</p>
        </div>
      </div>
      <div class="card-body p-3">

        <!--Body-->
        <div class="form-group">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-user text-danger"></i></div>
            </div>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-envelope text-danger"></i></div>
            </div>
            <input type="email" class="form-control" id="nombre" name="email" placeholder="ejemplo@gmail.com" required>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-comment text-danger"></i></div>
            </div>
            <textarea class="form-control" placeholder="Envianos tu Mensaje" required></textarea>
          </div>
        </div>

        <div class="text-center">
          <input type="submit" value="Enviar" class="btn btn-danger btn-block rounded-0 py-2">
        </div>
      </div>

    </div>
  </form>
</div>

<div class="row" id="sobreNosotros">
  <div class="jumbotron">
    <h1 class="display-4">Sobre Spartan Academy</h1>
    <p class="lead">Somos un centro deportivo dedicado a las artes marciales. En nuestro centro podras practicar diferentes disciplinas de los mejores profesores.</p>
    <hr class="my-4">
    <p>Vente a conocernos de primera mano y disfruta !</p>
  </div>
</div>
<br><br>

<script src="JS/crearActividad.js"></script>