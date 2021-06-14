<?php

class Usuario
{
    private $userName;
    private $nombre;
    private $apellidos;
    private $dni;
    private $edad;
    private $email;
    private $pass;


    function construirUser($userName, $nombre, $apellidos, $dni, $edad, $email, $pass, $userImg)
    {
        $this->userName = $userName;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->edad = $edad;
        $this->email = $email;
        $this->pass = $pass;
        $this->userImg = $userImg;
    }

    function getUserName()
    {
        return $this->userName;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApellidos()
    {
        return $this->apellidos;
    }

    function getDni()
    {
        return $this->dni;
    }

    function getEdad()
    {
        return $this->edad;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPass()
    {
        return $this->pass;
    }

    function getFechaAlta()
    {
        return $this->fecha_alta;
    }


    function InsertarUsuario()
    {
        $conectar = conexion::abrir_conexion();
        $conectar->query("Insert into usuario (userName, nombre, apellidos, dni, edad, email, pass,imagen_perfil) values('$this->userName','$this->nombre','$this->apellidos','$this->dni','$this->edad','$this->email','$this->pass','$this->userImg')");
        // var_dump($conectar->error );
        
        $conectar->close();
    }


    function comprobarSiExiste($email)
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select email from usuario where email='$email'");

        //Contar num filas que devuelve el select
        if ($resultado->num_rows >= 1) {
            $conectar->close();

            return true;
        } else {
            $conectar->close();
            return false;
        }
    }
    function comprobarSiExisteUserName($userName)
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select userName from usuario where userName='$userName'");

        //Contar num filas que devuelve el select
        if ($resultado->num_rows >= 1) {
            $conectar->close();

            return true;
        } else {
            $conectar->close();
            return false;
        }
    }
    function comprobarSiExisteDni($dni)
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select dni from usuario where dni='$dni'");

        //Contar num filas que devuelve el select
        if ($resultado->num_rows >= 1) {
            $conectar->close();

            return true;
        } else {
            $conectar->close();
            return false;
        }
    }

    static function comprobarContraseñaCorreo($email, $pass)
    {

        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select * from usuario where email = '$email'");

        //El resultado se convierte en un array asociativo
        $fila = $resultado->fetch_assoc();
        if ($resultado->num_rows < 1) return false;
        if ($fila['email'] == $email && $fila['pass'] == $pass) {
            $conectar->close();
            return $fila;
        } else {

            $conectar->close();

            return false;
        }
    }
    static function obtenerNombreUsuarioSegunCorreo($email)
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select * from usuarios where email='$email'");
        $fila = $resultado->fetch_assoc();
        $nombre = $fila['nombre'];
        // var_dump($resultado);
        $conectar->close();

        return $nombre;
    }

    // function reservarActividad(){

    // }
}
