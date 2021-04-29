<?php
require "clases/Conexion.php";


class Actividad
{
    private $codClase;
    private $nombre;
    private $descripcion;
    private    $id_profesor;
    // private	$sala;
    private    $plazas;
    // private	$hora_comienzo;
    // private	$hora_fin;

    function construirActividad($codClase,$nombre, $descripcion, $plazas,$id_profesor)
    {
        $this->codClase=$codClase;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->plazas = $plazas;
        $this->id_profesor = $id_profesor;
    }

    function getNombre()
    {
        return $this->nombre;
    }
    function getDescripcion()
    {
        return $this->descripcion;
    }
    function getPlazas()
    {
        return $this->plazas;
    }

    function insertarActividad()
    {
        $conectar = conexion::abrir_conexion();
        $conectar->query("Insert into Actividad (codClase,nombre,descripcion,plazas,id_profesor) values('$this->codClase','$this->nombre','$this->descripcion','$this->plazas','$this->id_profesor')");
        $conectar->close();
    }

    function existeActividad($nombre)
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select nombre from Actividad where nombre='$nombre'");
        
        //Contar num filas que devuelve el select
        if ($resultado->num_rows >= 1) {
            $conectar->close();

            return true;
        } else {
            $conectar->close();
            return false;
        }
    }

    static function mostrarActividades(){
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select nombre from Actividad");

        if ($resultado->num_rows >= 1) {
            $conectar->close();
            return $resultado;
        } else {
            $conectar->close();
            return false;
        }
        
    }
}
