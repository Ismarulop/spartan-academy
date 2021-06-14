<?php


class Actividad
{
    private $codClase;
    private $nombre;
    private $descripcion;
    private $id_profesor;
    

    function construirActividad($codClase, $nombre, $descripcion, $id_profesor,$imgActividad)
    {
        $this->codClase = $codClase;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;      
        $this->id_profesor = $id_profesor;
        $this->imgActividad = $imgActividad;
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
        $conectar->query("Insert into Actividad (codClase,nombre,descripcion,id_profesor,img) values('$this->codClase','$this->nombre','$this->descripcion','$this->id_profesor','$this->imgActividad')");
        // var_dump($conectar->error);

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

    static function mostrarActividades()
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select * from Actividad");
        if ($resultado->num_rows >= 1) {
            $conectar->close();
            return $resultado;
        } else {
            $conectar->close();
            return false;
        }
    }

    
}
