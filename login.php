<div class="row">
    <div class="col-md-5">
        <h2>Iniciar sesion</h2>
        <form onkeyup="validarFormulario(event)">
            <div class="mb-3">
                <label for="userName" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="userName" id="userName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="passLogin" id="passLogin">
            </div>
           
            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>

        </form>

    </div>
    <div class="col-md-7">

    </div>
</div>

<script src="JS/validacionRegistro.js"></script>