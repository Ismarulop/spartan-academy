<?php
ob_start();
?>
<?php include "header.php" ?>

<?php include "main.php" ?>

<div class="alertTiempo">
    <button id="cerrarAlert" class="btn btn-success">❌</button>
    <div id="alertToggle" class="alert alert-success" role="alert">
        <i class="fa-regular fa-cloud-bolt-sun"></i>
        <h4 id="alertHora" class="alert-heading"></h4>
        <p id="alertTemperatura"></p>
        <hr>
        <p class="mb-0">Comprueba el tiempo para realizar ejercicio antes de salir de casa</p>
    </div>
    <div id="bottonIconoTiempo"><i class="cloud-bolt-sun"></i></div>
</div>

<?php include "footer.php" ?>
<?php
ob_end_flush();
?>