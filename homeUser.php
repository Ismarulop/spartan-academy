<?php
require "clases/Comentario.php";

$publicado = false;
if (isset($_POST['enviarComentario'])) {
  // var_dump($_POST);
  $codComentario = uniqid();
  $comentario = $_POST['textoComentario'];
  $userName = $_SESSION['login']['datosUsuario']['userName'];
  $ratio = $_POST['rating'];

  $newComentario = new Comentario;
  $newComentario->construirComentario($codComentario, $comentario, $userName, $ratio);

  $newComentario->insertarComentario();
  $publicado = true;
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
<br><br>

<?php

$u = $_SESSION['login']['datosUsuario']
?>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>?p=homeUser">
  <div class="card">
    <div class="row">
      <div class="col-2"> <img src="
      <?php
      if ($u['imagen_perfil'] == null) {
        echo "imagenes/noImage.png";
      } else {
        echo "imagenes/subidas/" . $u['imagen_perfil'];
      }
      ?>
      ?>
      " width="70" class="rounded-circle mt-2"> </div>
      <div class="col-10">
        <div class="comment-box ml-2">
          <h4>Añade un comentario <?php echo "<span style='color:#c20a32; font-size: 2rem; font-weight:bolder;'>".$u['userName']."</span>"?> </h4>
          <div class="rating"> <input checked type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
          <div class="comment-area">
            <textarea class="form-control" name="textoComentario" placeholder="what is your view?" rows="4"></textarea>
          </div>
          <div class="comment-btns mt-2">
            <div class="row">
              <div class="col-5">
              </div>
              <div class="col-6 p-3">
                <div class="pull-right">
                  <button type="submit" name="enviarComentario" class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>


<div id="alertaPublicado" class="row alert alert-success">
  <?php
  if ($publicado == true) {
    echo "Su comentario se ha publicado con Éxito";
  }
  ?>
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