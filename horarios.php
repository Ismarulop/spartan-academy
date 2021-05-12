<!-- <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FMadrid&amp;src=N2d1bXRxNmxma3J1NWVzcDAwaTJpdW9ya2dAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%237CB342&amp;showTitle=1&amp;showCalendars=1" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>    <title>Spartan Academy</title> -->
<?php

require "clases/Actividad.php";





?>


<script src="JS/horarios.js"></script>
<br />

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
            <li class="events-group">
                <div class="top-info">
                    <span>Lunes</span>
                </div>
                <ul>
                    <li class="single-event" data-start="09:00" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
                        <!-- <a href="#0"> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <input type="hidden" name="dia" value="Monday">
                            <input type="hidden" name="horaComienzo" value="09:00">
                            <input type="hidden" name="horaFin" value="10:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();
                                if (isset($_POST['guardar1'])) {
                                }
                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar1">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>
                    <li class="single-event" data-start="10:30" data-end="12:00" data-content="event-abs-circuit" data-event="event-2">
                        <!-- <a href="#0"> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <input type="hidden" name="dia" value="Monday">
                            <input type="hidden" name="horaComienzo" value="10:30">
                            <input type="hidden" name="horaFin" value="12:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar2">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>

                    <li class="single-event" data-start="12:00" data-end="13:30" data-content="event-rowing-workout" data-event="event-3">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Monday">
                            <input type="hidden" name="horaComienzo" value="12:00">
                            <input type="hidden" name="horaFin" value="13:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar3">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>

                    </li>

                    <li class="single-event" data-start="17:00" data-end="18:30" data-content="event-yoga-1" data-event="event-4">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Monday">
                            <input type="hidden" name="horaComienzo" value="17:00">
                            <input type="hidden" name="horaFin" value="18:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar4">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                    <li class="single-event" data-start="18:30" data-end="20:00" data-content="event-yoga-1" data-event="event-1">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Monday">
                            <input type="hidden" name="horaComienzo" value="18:30">
                            <input type="hidden" name="horaFin" value="20:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar5">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                </ul>
            </li>


            <!-- MARTES -->
            <li class="events-group">

                <div class="top-info"><span>Martes</span></div>

                <ul>
                    <li class="single-event" data-start="09:00" data-end="10:30" data-content="event-abs-circuit" data-event="event-3">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Tuesday">
                            <input type="hidden" name="horaComienzo" value="09:00">
                            <input type="hidden" name="horaFin" value="10:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar6">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>
                    <li class="single-event" data-start="10:30" data-end="12:00" data-content="event-abs-circuit" data-event="event-2">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Tuesday">
                            <input type="hidden" name="horaComienzo" value="10:30">
                            <input type="hidden" name="horaFin" value="12:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar7">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>

                    <li class="single-event" data-start="12:00" data-end="13:30" data-content="event-rowing-workout" data-event="event-1">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Tuesday">
                            <input type="hidden" name="horaComienzo" value="12:00">
                            <input type="hidden" name="horaFin" value="13:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar8">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>

                    </li>

                    <li class="single-event" data-start="17:00" data-end="18:30" data-content="event-yoga-1" data-event="event-3">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Tuesday">
                            <input type="hidden" name="horaComienzo" value="17:00">
                            <input type="hidden" name="horaFin" value="18:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar9">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                    <li class="single-event" data-start="18:30" data-end="20:00" data-content="event-yoga-1" data-event="event-2">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Tuesday">
                            <input type="hidden" name="horaComienzo" value="18:30">
                            <input type="hidden" name="horaFin" value="20:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar10">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                </ul>
            </li>


            <!-- MIERCOLES -->
            <li class="events-group">
                <div class="top-info"><span>Miércoles</span></div>

                <ul>
                    <li class="single-event" data-start="09:00" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Miercoles">
                            <input type="hidden" name="horaComienzo" value="09:00">
                            <input type="hidden" name="horaFin" value="10:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar11">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>
                    <li class="single-event" data-start="10:30" data-end="12:00" data-content="event-abs-circuit" data-event="event-2">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Miercoles">
                            <input type="hidden" name="horaComienzo" value="10:30">
                            <input type="hidden" name="horaFin" value="12:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar12">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>

                    <li class="single-event" data-start="12:00" data-end="13:30" data-content="event-rowing-workout" data-event="event-3">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Miercoles">
                            <input type="hidden" name="horaComienzo" value="12:00">
                            <input type="hidden" name="horaFin" value="13:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar13">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>

                    </li>

                    <li class="single-event" data-start="17:00" data-end="18:30" data-content="event-yoga-1" data-event="event-2">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Miercoles">
                            <input type="hidden" name="horaComienzo" value="17:00">
                            <input type="hidden" name="horaFin" value="18:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar14">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                    <li class="single-event" data-start="18:30" data-end="20:00" data-content="event-yoga-1" data-event="event-1">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Miercoles">
                            <input type="hidden" name="horaComienzo" value="18:30">
                            <input type="hidden" name="horaFin" value="20:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar15">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                </ul>
            </li>

            <!-- JUEVES -->
            <li class="events-group">
                <div class="top-info"><span>Jueves</span></div>

                <ul>
                    <li class="single-event" data-start="09:00" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Jueves">
                            <input type="hidden" name="horaComienzo" value="09:00">
                            <input type="hidden" name="horaFin" value="10:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar16">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>
                    <li class="single-event" data-start="10:30" data-end="12:00" data-content="event-abs-circuit" data-event="event-2">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Jueves">
                            <input type="hidden" name="horaComienzo" value="10:30">
                            <input type="hidden" name="horaFin" value="12:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar17">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>

                    <li class="single-event" data-start="12:00" data-end="13:30" data-content="event-rowing-workout" data-event="event-3">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Jueves">
                            <input type="hidden" name="horaComienzo" value="12:00">
                            <input type="hidden" name="horaFin" value="13:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar18">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                    <li class="single-event" data-start="17:00" data-end="18:30" data-content="event-rowing-workout" data-event="event-1">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Jueves">
                            <input type="hidden" name="horaComienzo" value="17:00">
                            <input type="hidden" name="horaFin" value="18:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar19">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>

                    </li>
                    <li class="single-event" data-start="17:00" data-end="18:30" data-content="event-rowing-workout" data-event="event-2">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Jueves">
                            <input type="hidden" name="horaComienzo" value="17:00">
                            <input type="hidden" name="horaFin" value="18:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar20">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>

                    </li>
                    <li class="single-event" data-start="18:30" data-end="20:00" data-content="event-rowing-workout" data-event="event-3">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Jueves">
                            <input type="hidden" name="horaComienzo" value="18:30">
                            <input type="hidden" name="horaFin" value="20:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar21">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>

                    </li>
                </ul>

                <!-- VIERNES -->
            <li class="events-group">
                <div class="top-info"><span>Viernes</span></div>

                <ul>
                    <li class="single-event" data-start="09:00" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Viernes">
                            <input type="hidden" name="horaComienzo" value="09:00">
                            <input type="hidden" name="horaFin" value="10:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar22">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>
                    <li class="single-event" data-start="10:30" data-end="12:00" data-content="event-abs-circuit" data-event="event-2">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Viernes">
                            <input type="hidden" name="horaComienzo" value="10:30">
                            <input type="hidden" name="horaFin" value="12:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar23">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                        <!-- <em style="color:black" class="event-name">Abs Circuit</em> -->
                        <!-- </a> -->
                    </li>

                    <li class="single-event" data-start="12:00" data-end="13:30" data-content="event-rowing-workout" data-event="event-3">
                        <!-- <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Viernes">
                            <input type="hidden" name="horaComienzo" value="12:00">
                            <input type="hidden" name="horaFin" value="13:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar24">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>

                    </li>

                    <li class="single-event" data-start="17:00" data-end="18:30" data-content="event-yoga-1" data-event="event-2">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Viernes">
                            <input type="hidden" name="horaComienzo" value="17:00">
                            <input type="hidden" name="horaFin" value="18:30">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar25">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                    <li class="single-event" data-start="18:30" data-end="20:00" data-content="event-yoga-1" data-event="event-1">
                        <!-- <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a> -->
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=horarios" method="POST">
                            <!-- <a href="#0"> -->
                            <input type="hidden" name="dia" value="Viernes">
                            <input type="hidden" name="horaComienzo" value="18:30">
                            <input type="hidden" name="horaFin" value="20:00">

                            <select name="actividades" id="actividades">
                                <option value="ninguno">Ninguno</option>
                                <?php
                                $actividades = Actividad::mostrarActividades();

                                while ($a = $actividades->fetch_assoc()) {
                                    echo "<option id='' value='" . $a['nombre'] . "'>" . $a['nombre'] . "</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="guardar26">
                            <button type="submit" name="guardar">Guardar</button>
                        </form>
                    </li>
                </ul>
            </li>




            <!--        -->
            <li class="events-group">
                <div class="top-info"><span>Sábado</span></div>
                <ul>
                    <!-- <li class="single-event" data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
                            <a href="#0">
                                <em class="event-name">Abs Circuit</em>
                            </a>
                        </li>

                        <li class="single-event" data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2">
                            <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a>
                        </li>

                        <li class="single-event" data-start="14:00" data-end="15:15" data-content="event-yoga-1" data-event="event-3">
                            <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a>
                        </li> -->
                </ul>
            </li>
            <!--        -->

            <!--        -->
            <li class="events-group">
                <div class="top-info"><span>Domingo</span></div>
                <ul>
                    <!-- <li class="single-event" data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
                            <a href="#0">
                                <em class="event-name">Abs Circuit</em>
                            </a>
                        </li>

                        <li class="single-event" data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2">
                            <a href="#0">
                                <em class="event-name">Rowing Workout</em>
                            </a>
                        </li>

                        <li class="single-event" data-start="14:00" data-end="15:15" data-content="event-yoga-1" data-event="event-3">
                            <a href="#0">
                                <em class="event-name">Yoga Level 1</em>
                            </a>
                        </li> -->
                </ul>
            </li>
        </ul>
    </div>

    <div class="event-modal">
        <header class="header">
            <div class="content">
                <span class="event-date"></span>
                <h3 class="event-name"></h3>
            </div>

            <div class="header-bg"></div>
        </header>

        <div class="body">
            <div class="event-info"></div>
            <div class="body-bg"></div>
        </div>

        <a href="#0" class="close">Close</a>
    </div>

    <div class="cover-layer"></div>
</div> <!-- .cd-schedule -->

<br><br><br>
<br><br><br>
<br><br><br>

<?php
if (isset($_POST['guardar'])) {
    $actividades = $_POST['actividades'];
    $actividad = $_POST['actividades']['nombre'];
    var_dump($_POST);

    // $actividad=new Actividad();
    // $codClase=obtenerCodClase($nombre);
    // $actividad->construirActividad($codClase,$nombre, $descripcion, $plazas,$id_profesor,	$hora_comienzo,$hora_fin)

    $dia = $_POST['dia'];
    $horaComienzo = $_POST['horaComienzo'];
    $horaFin = $_POST['horaFin'];
}
?>