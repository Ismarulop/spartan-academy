<?php
require "clases/Comentario.php";
if (isset($_SESSION['login']['datosUsuario'])) {
  if ($_SESSION['login']['datosUsuario']['esProfesor'] == 1) {
    header("location: index.php?p=homeProfesor");
  } else {
    header("location: index.php?p=homeUser");
  }
}


?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagenes/slider/slide1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="imagenes/slider/slide2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="imagenes/slider/slide3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div id="comentariosListados" class="row">
  <div class="container-fluid px-3 px-sm-5 my-5 text-center">
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
          if ($contador == $filas-1) {
            $ultimo = true;
          }
      ?>
          <div class="item <?php if ($primero) {
                              echo "first prev";
                            } elseif ($ultimo) {
                              echo "last";
                            } elseif ($contador == 1||$filas==0) {
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
              ?>" 
              class="img-fluid profile-pic mb-4 mt-3"> </div>
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


<br><br>
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