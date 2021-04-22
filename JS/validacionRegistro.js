const formRegisterUser = document.getElementById("formRegisterUser");

const expresiones = {
    nombre: /^([a-z A-Z]{1}[a-zñáéíóú]+[\s]*)+$/,
    apellidos: /^([a-z A-Z]{1}[a-zñáéíóú]+[\s]*)+$/,
    userName: /^[a-z A-Z0-9\_\-]{4,16}/, // Letras, numeros, guion y guion_bajo
    dni: /^\d{8}[a-zA-Z]$/,
    edad: /^.{1,2}$/,
    pass: /^.{4,12}$/, // 4 a 12 digitos.
    pass2: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-z A-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-z A-Z0-9-.]+$/, //Letras, numeros, guion y guion_bajo. Seguido de @...
}

const validarFormulario = (e) => {
    console.log(e.target.name);
    switch (e.target.name) {
        case "nombre":
            mostrarError(e.target, expresiones.nombre)
            break;
        case "apellidos":
            mostrarError(e.target, expresiones.apellidos)
            break;
        case "userName":
            mostrarError(e.target, expresiones.userName)
            break;
        case "dni":
            mostrarError(e.target, expresiones.dni)
            break;
        case "edad":
            mostrarError(e.target, expresiones.edad)
            break;
            // Validar Contraseña
        case "passLogin":
            mostrarError(e.target, expresiones.pass)
            break;
            //Validar campo correo
        case "pass":
            mostrarError(e.target, expresiones.pass)
            break;
        case "pass2":
            mostrarError(e.target, expresiones.pass)
            break;
            //Validar campo correo
        case "correo":
            mostrarError(e.target, expresiones.correo)
            break;
    }
}

const mostrarError = (input, regExp) => {
    if (input.classList.contains("is-invalid")) {
        input.classList.remove("is-invalid")
    }
    if (input.classList.contains("is-valid")) {
        input.classList.remove("is-valid")
    }
    if (regExp.test(input.value)) {
        input.classList.add("is-valid")

    } else {
        input.classList.add("is-invalid")
    }


    if (input.name == "pass2" || input.name == "pass") {
        if (document.getElementById("pass").classList.contains("is-invalid")) {
            document.getElementById("pass").classList.remove("is-invalid")
        }
        if (document.getElementById("pass").classList.contains("is-valid")) {
            document.getElementById("pass").classList.remove("is-valid")
        }

        if (document.getElementById("pass2").classList.contains("is-valid")) {
            document.getElementById("pass2").classList.remove("is-valid")
        }
        if (document.getElementById("pass2").classList.contains("is-invalid")) {
            document.getElementById("pass2").classList.remove("is-invalid")
        }

        if (document.getElementById("pass").value == document.getElementById("pass2").value) {
            document.getElementById("pass").classList.add("is-valid")
            document.getElementById("pass2").classList.add("is-valid")

        } else {
            document.getElementById("pass").classList.add("is-invalid")
            document.getElementById("pass2").classList.add("is-invalid")
        }
    }

}