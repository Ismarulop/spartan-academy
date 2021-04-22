<!-- Falta modificar entero -->
<h2>Registrarse usuario</h2>
<form id="formRegister" onkeyup="validarFormulario(event)"  method="post" action="<?php echo $_SERVER["PHP_SELF"]  ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nombre">
        </div>
        <div class="form-group col-md-6">
            <label for="apellidos">Apellidos</label>
            <input  name="apellidos" type="text" id="apellidos" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="userName">Nombre de usuario</label>
            <input  name="userName" type="text" class="form-control" id="userName">
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="dni">dni</label>
        <input  name="dni" type="text" class="form-control" id="dni">
    </div>
    <div class="form-group col-md-4">
        <label for="edad">edad</label>
        <input name="edad" type="text" class="form-control" id="edad">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input  name="inputEmail4" type="email" class="form-control" id="inputEmail4" placeholder="Ej:nombre@gmail.com">
        </div>
        <div class="form-group col-md-6">
            <label for="pass">Password</label>
            <input  name="pass" type="password" class="form-control" id="pass">
        </div>
        <div class="form-group col-md-6">
            <label for="pass2">Repeat Password</label>
            <input  name="pass2" type="password" class="form-control" id="pass2">
        </div>
    </div>
    <div class="form-group">
        <label for="imagenPerfil">Imagen de Perfil</label>
        <input  name="imagenPerfil" type="file" class="form-control" id="imagenPerfil">
    </div>
    <button type="submit" class="btn btn-primary">Registrarse</button>
</form>

<script src="JS/validacionRegistro.js"></script>