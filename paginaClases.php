<!-- Modificar y añadir tantas cartas como artes marciales -->
<?php
require("Clases/Actividad.php");

$actvidades = Actividad::mostrarActividades();
?>
<div class="row">

    <?php
    if (!$actvidades) {
        echo "<div class='col-md-5 alert alert-info' style='text-align:center;'>No hay clases por el momento</div>";
    } else {
        while ($a = $actvidades->fetch_assoc()) {

    ?>
            <div class="col-md-4">
                <div class="card mt-5">
                    <img class="card-img-top" style="border-bottom:#EAEAEA 1px solid" src="imagenes/subidas/<?php
                                                                                                            if (empty($a['img'])) {
                                                                                                                echo 'logo.png';
                                                                                                            } else {
                                                                                                                echo $a['img'];
                                                                                                            }
                                                                                                            ?>
            " width="200" height="400" alt="Card image cap">
                    <div class="card-body">

                        <h5 class="card-title" style="font-weight: bolder;"><strong><?php echo $a['nombre'] ?></strong></h5>
                        <p class="card-text text-muted" style="height: 6em; overflow-y:scroll;"><?php echo $a['descripcion'] ?> </p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?p=horarios" class="btn btn-outline-primary btn-lg btn-block">RESERVAR</a>
                    </div>
                </div>
            </div>

    <?php
        }
    }

    ?>


</div>