<?php

require("Usuario.php");

class Profesor extends Usuario
{
    function construirUser($userName, $nombre, $apellidos, $dni, $edad, $email, $pass)
    {
        $this->userName = $userName;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->edad = $edad;
        $this->email = $email;
        $this->pass = $pass;
    }

    function InsertarProfesor()
    {
        $conectar = conexion::abrir_conexion();
        $conectar->query("Insert into usuario (userName, nombre, apellidos, dni, edad, email, pass, esProfesor) values('$this->userName','$this->nombre','$this->apellidos','$this->dni','$this->edad','$this->email','$this->pass','1')");
        $conectar->query("Insert into profesor (userName, nombre, apellidos, dni, edad, email, pass) values('$this->userName','$this->nombre','$this->apellidos','$this->dni','$this->edad','$this->email','$this->pass')");
        $conectar->close();
    }
//     function comprobarSiExiste($email)
//     {
//         $conectar = conexion::abrir_conexion();
//         $resultado = $conectar->query("Select email from Profesor where email='$email'");
        
//         //Contar num filas que devuelve el select
//         if ($resultado->num_rows >= 1) {
//             $conectar->close();

//             return true;
//         } else {
//             $conectar->close();
//             return false;
//         }
//     }
// function comprobarSiExisteUserName($userName)
//     {
//         $conectar = conexion::abrir_conexion();
//         $resultado = $conectar->query("Select userName from Profesor where userName='$userName'");
        
//         //Contar num filas que devuelve el select
//         if ($resultado->num_rows >= 1) {
//             $conectar->close();

//             return true;
//         } else {
//             $conectar->close();
//             return false;
//         }
//     }
// function comprobarSiExisteDni($dni)
//     {
//         $conectar = conexion::abrir_conexion();
//         $resultado = $conectar->query("Select dni from Profesor where dni='$dni'");
        
//         //Contar num filas que devuelve el select
//         if ($resultado->num_rows >= 1) {
//             $conectar->close();

//             return true;
//         } else {
//             $conectar->close();
//             return false;
//         }
//     }
}
?>