<!-- <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FMadrid&amp;src=N2d1bXRxNmxma3J1NWVzcDAwaTJpdW9ya2dAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%237CB342&amp;showTitle=1&amp;showCalendars=1" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>    <title>Spartan Academy</title> -->

<?php
require("clases/Actividad.php");
require("clases/Horarios.php");



$horario = [];
$diasSemana = [
    "Lunes" => array(), "Martes" => array(), "Miercoles" => array(), "Jueves" => array(), "Viernes" => array(),
    "Sabado" => array(), "Domingo" => array(),
];

if (isset($_POST['reservar'])) {
    $codHorario = $_POST['codHorario'];
    $userName = $_SESSION['login']['datosUsuario']['userName'];

    Horarios::reservarActividad($userName, $codHorario);
}

if (isset($_POST['cancelarReserva'])) {
    $codHorario = $_POST['codHorario'];
    $userName = $_SESSION['login']['datosUsuario']['userName'];

    Horarios::cancelarReserva($userName, $codHorario);
}

if (isset($_POST['insertar'])) {
    // var_dump($_POST);
    $errores = [];
    $nombre = $_POST['nombreActividad'];
    $diaSemana = $_POST['diaDeLaSemana'];
    $horaComienzo = $_POST['horaComienzo'];
    $horaFin = $_POST['horaFin'];
    $plazas = $_POST['plazas'];

    $horaRellenada = new Horarios();
    $horaRellenada->construirHoraActividad($nombre, $diaSemana, $horaComienzo, $horaFin, $plazas);

    if (empty($nombre) || empty($diaSemana) || empty($horaComienzo) || empty($horaFin) || empty($plazas)) {
        array_push($errores, "*Es obligatorio completar todos los campos");
    }

    if (empty($errores)) {
        echo "<div class='row alert alert-success'>Se ha insertado con éxito la actividad </div>";
        $horaRellenada->insertarhoraActividad();
        // header("location:" . $_SERVER["PHP_SELF"] . "?p=horarios");
    } else {
        echo "<div class='row alert alert-danger'>Error al insertar la actividad en el horario </div>";
    }
}

if (isset($_POST['borrar'])) {
    Horarios::borrarHoraActividades($_POST['codHorario']);
}

$horarios = Horarios::mostrarHoraActividades();

if ($horarios != false) {
    while ($h = $horarios->fetch_assoc()) {
        $dia = $h["dia"];
        array_push($diasSemana[$dia], $h);
    }
}


if (isset($_SESSION['login']) && isset($_SESSION['login']['datosUsuario']) && $_SESSION['login']['datosUsuario']['esProfesor'] == true) {

?>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Crear clase
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form id="formInsertarEnHorario" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>?p=horarios">
                <?php
                $actividades = Actividad::mostrarActividades();
                if ($actividades == false || empty($actividades)) {
                    echo "No hay actividades creadas";
                } else {
                ?>
                    <select name="nombreActividad" id="nombreActividad">
                        <option value="ninguno">Seleccione una actividad</option>
                        <?php

                        while ($a = $actividades->fetch_assoc()) {
                            echo "<option id='' value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                        }
                        ?>

                    </select><br><br>

                    <label for="plazas">Plazas</label>
                    <div class="form-group col-md-1">
                        <input name="plazas" id="plazas" type="number" class="form-control">
                    </div><br>

                    <select name="diaDeLaSemana" id="diaDeLaSemana">
                        <?php
                        foreach ($diasSemana as $key => $value) {
                            echo "<option value='" . $key . "'>" . $key . "</option>";
                        }

                        ?>
                    </select>
                    <input name="horaComienzo" id="horaComienzo" type="time">
                    <input name="horaFin" id="horaFin" type="time">

                    <input type="submit" value="insertar" class="btn btn-info btn-block rounded-0 py-2" name="insertar">
                <?php
                }

                ?>
            </form>
        </div>
    </div>
<?php
}
?>


<script defer src="JS/horarios.js"></script>
<br />
<div class="row">
    <div class="col-md-9">

        <div class="cd-schedule loading">
            <div class="timeline">
                <ul>
                    <li><span>09:00</span></li>
                    <li><span>09:30</span></li>
                    <li><span>10:00</span></li>
                    <li><span>10:30</span></li>
                    <li><span>11:00</span></li>
                    <li><span>11:30</span></li>
                    <li><span>12:00</span></li>
                    <li><span>12:30</span></li>
                    <li><span>13:00</span></li>
                    <li><span>13:30</span></li>
                    <li><span>14:00</span></li>
                    <li><span>14:30</span></li>
                    <li><span>15:00</span></li>
                    <li><span>15:30</span></li>
                    <li><span>16:00</span></li>
                    <li><span>16:30</span></li>
                    <li><span>17:00</span></li>
                    <li><span>17:30</span></li>
                    <li><span>18:00</span></li>
                    <li><span>18:30</span></li>
                    <li><span>19:00</span></li>
                    <li><span>19:30</span></li>
                    <li><span>20:00</span></li>
                </ul>
            </div> <!-- .timeline -->

            <div class="events">
                <ul class="wrap">

                    <!-- LUNES -->

                    <?php foreach ($diasSemana as $dia => $arrayDia) {     ?>

                        <li class="events-group">
                            <div class="top-info">
                                <span><?php echo $dia ?></span>
                            </div>
                            <ul>

                                <?php
                                foreach ($arrayDia as $h) {
                                    $retVal="";
                                    if (isset($_GET['codHorario'])) {
                                        $retVal = ($_GET['codHorario']== $h['codHorario']) ? 'border' : '' ;
                                    }
                                        echo '<li onClick="mostrarLista(\'' . $h['codHorario'] . '\')" class="single-event horaHorario '.$retVal.' " data-start="' . $h['hora_comienzo'] . '" data-end="' . $h['hora_fin'] . '" data-content="event-abs-circuit" data-event="event-'.rand ( 1 , 4 ).'">';
                                        echo "<div>".$h['nombreActividad'] . " </div><div>" . $h['plazasReservadas'] . "/" . $h['plazas']."</div>";
                                        if (isset($_SESSION['login']) && isset($_SESSION['login']['datosUsuario']) && $_SESSION['login']['datosUsuario']['esProfesor'] == true) {                                ?>
                                        <form id="formBorrarClase" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>?p=horarios">
                                            <input type="hidden" name="codHorario" value="<?php echo $h['codHorario'] ?>">
                                            <input type="submit" value="borrar" class="btn btn-danger btn-block py-2" name="borrar">
                                        </form>

                                        <?php
                                    }
                                    if (isset($_SESSION['login']) && isset($_SESSION['login']['datosUsuario']) && $_SESSION['login']['datosUsuario']['esProfesor'] == false) {                                        if (Horarios::estaReservada($_SESSION['login']['datosUsuario']['userName'], $h['codHorario'])) {
                                        ?>
                                            <form id="cancelarReserva" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>?p=horarios">
                                                <input type="hidden" name="codHorario" value="<?php echo $h['codHorario'] ?>">
                                                <input type="submit" value="cancelarReserva" class="btn btn-danger btn-block rounded-0 py-2" name="cancelarReserva">
                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <form id="reservarClase" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>?p=horarios">
                                                <input type="hidden" name="codHorario" value="<?php echo $h['codHorario'] ?>">
                                                <input type="submit" value="Reservar" class="btn btn-info btn-block rounded-0 py-2" name="reservar">
                                            </form>
                                <?php
                                        }
                                    }
                                }
                                ?>
                        </li>
                </ul>
                </li>
            <?php  } ?>

            <ul class="events-group nover">
                <div class="top-info">Hello</div>
                <ul>
                </ul>
            </ul>
            <ul class="events-group nover">
                <div class="top-info">Hello</div>
                <ul>
                </ul>
            </ul>




            </ul>
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <?php
if (isset($_SESSION['login']) && isset($_SESSION['login']['datosUsuario']) && $_SESSION['login']['datosUsuario']['esProfesor'] == true) {            if (isset($_GET['codHorario'])) {
                
                                  

                // var_dump($_GET['codHorario']);
                $lista = Horarios::mostrarListadeAlumnosListados($_GET['codHorario']);
                if (!$lista) {
                    echo '<div class="alert alert-info" role="alert">';
                    echo 'No hay alumnos apuntados';
                    echo ' </div>';
                } else {
                    echo '<ul class="list-group list-group-flush">';
                    echo '<li class="alert alert-primary"> <b>Listado de alumnos</b></li>';
                    while ($a = $lista->fetch_assoc()) {

                        echo  '<li class="list-group-item alumnoLista"><span class="nombreLista">' . $a['nombre'] . " " . $a['apellidos'] . '</span><small class="text-muted small">' . $a['fecha'] . ' </small><span>❌</span></li>';
                    }

        ?>
                    
                       <a href="CrearPdfProf.php?codHorario=<?php echo $_GET['codHorario'] ?>"  class="btn btn-outline-danger"> Descargar <i class="fas fa-file-pdf"></i></a> 
                  

                    <?php
                    echo '</ul>';
                    ?>
        <?php
                }
            }
        }

        ?>

    </div>
</div>

<br><br><br>
<br><br><br>
<br><br><br>

<script>
    function mostrarLista(codHorario) {
        location.href = "?p=horarios&codHorario=" + codHorario;

    }
</script>