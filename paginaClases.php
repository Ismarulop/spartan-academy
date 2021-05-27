<!-- Modificar y añadir tantas cartas como artes marciales -->
<?php
    require ("Clases/Actividad.php");
    $actvidades=new Actividad();
    $actvidades->mostrarActividades();
    var_dump($actvidades);
?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="imagenes/slider/slider1.jpg" width="200" height="400" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php $actvidades-> getNombre()?></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="imagenes/slider/slider2.jpg" width="200" height="400" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="imagenes/slider/slider3.jpg" width="200" height="400" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="imagenes/slider/slider1.jpg" width="200" height="400" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="imagenes/slider/slider2.jpg" width="200" height="400" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="imagenes/slider/slider3.jpg" width="200" height="400" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
</div>
