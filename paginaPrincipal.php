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
      <img src="imagenes/slider/slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="imagenes/slider/slider2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="imagenes/slider/slider3.jpg" class="d-block w-100" alt="...">
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

<div id="comentariosListados" class="row" style="height: 400px;">
  <div class="container-fluid px-3 px-sm-5 my-5 text-center">
    <h4 class="mb-5 font-weight-bold">What Our Client Say</h4>
    <div class="owl-carousel owl-theme">
      <?php
      $comentarios = Comentario::mostrarComentario();
      var_dump($comentarios->num_rows);
      $contador=0;
      $filas=$comentarios->num_rows;
      while ($u = $comentarios->fetch_assoc()) {
        $primero=false;
        $ultimo=false;
        if ($contador==0) {
          $primero=true;
        }
        if ($contador==$filas-1) {
          $ultimo=true;
        }
      ?>
        <div class="item <?php if ($primero) {
          echo "first prev";
        }elseif($ultimo){
        echo "last";
        }elseif ($contador==1) {
          echo "show";
        }else{
          echo "next";
        }
          ?> ">
          <div class="card border-0 py-3 px-4">
            <div class="row justify-content-center"> <img src="https://i.imgur.com/gazoShk.jpg" class="img-fluid profile-pic mb-4 mt-3"> </div>
            <h6 class="mb-3 mt-2"><?php echo $u['userName'] ?></h6>
            <p class="content mb-5 mx-2"><?php echo $u['contenido'] ?></p>
            <h3><?php for ($i=0; $i < $u['ratio']; $i++) { 
              echo "⭐";
            } ?></h3>
          </div>
        </div>
      <?php
      $contador++;
      }
      ?>
      <!-- <div class="item show">
            <div class="card border-0 py-3 px-4">
                <div class="row justify-content-center"> <img src="https://i.imgur.com/oW8Wpwi.jpg" class="img-fluid profile-pic mb-4 mt-3"> </div>
                <h6 class="mb-3 mt-2">Ximena Vegara</h6>
                <p class="content mb-5 mx-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim.</p>
            </div>
        </div>
        <div class="item next">
            <div class="card border-0 py-3 px-4">
                <div class="row justify-content-center"> <img src="https://i.imgur.com/ndQx2Rg.jpg" class="img-fluid profile-pic mb-4 mt-3"> </div>
                <h6 class="mb-3 mt-2">John Paul</h6>
                <p class="content mb-5 mx-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim.</p>
            </div>
        </div>
        <div class="item last">
            <div class="card border-0 py-3 px-4">
                <div class="row justify-content-center"> <img src="https://i.imgur.com/T5aOhwh.jpg" class="img-fluid profile-pic mb-4 mt-3"> </div>
                <h6 class="mb-3 mt-2">William Doe</h6>
                <p class="content mb-5 mx-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim.</p>
            </div>
        </div> -->
    </div>
  </div>
</div>

<div class="row" id="sobreNosotros">
  <div class="jumbotron">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
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