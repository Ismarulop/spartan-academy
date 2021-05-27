<?php


class Horarios
{

    private $codHorario;
    private $nombreActividad;
    private $dia;
    private $horaComienzo;
    private $horaFin;
    // private $posicion;


    function construirHoraActividad($nombreActividad, $dia, $horaComienzo, $horaFin, $plazas)
    {
        $this->codHorario = uniqid();
        $this->nombreActividad = $nombreActividad;
        $this->dia = $dia;
        $this->horaComienzo = $horaComienzo;
        $this->horaFin = $horaFin;
        $this->plazas = $plazas;
    }

    function getCodHorario()
    {
        return $this->codHorario;
    }

    function getNombreActividad()
    {
        return $this->nombreActividad;
    }
    function getDia()
    {
        return $this->dia;
    }
    function getHoraComienzo()
    {
        return $this->horaComienzo;
    }
    function getHoraFin()
    {
        return $this->horaFin;
    }

    function insertarhoraActividad()
    {
        $sql = "Insert into horarios(codHorario,nombreActividad,dia, hora_comienzo, hora_fin,plazas) values('$this->codHorario','$this->nombreActividad','$this->dia','$this->horaComienzo','$this->horaFin','$this->plazas')";
        $conectar = conexion::abrir_conexion();
        // $resultado = $conectar->query("Delete * from horarios where dia ='$this->dia' and hora_comienzo='$this->horaComienzo'");
        // $resultado2 = $conectar->query("Select nombreActividad from horarios where dia ='$this->dia' and hora_comienzo='$this->horaComienzo'");

        if ($conectar->query("Delete from horarios where dia ='$this->dia' and hora_comienzo='$this->horaComienzo'")) {
            echo $conectar->error;
        }
        if (true) {
            // $conectar->query($resultado2);
            if ($conectar->query($sql)) {
                echo "se ha guardado";
            } else {
                echo $conectar->error;
            }
        } else {
            echo "NOOOO";
        }
        $conectar->close();
    }

    static function mostrarHoraActividades()
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select *,(Select count(*) from reserva where codHorario=horarios.codHorario) as plazasReservadas from Horarios");
        // $resultado = $conectar->query("Select horarios.*,count(reserva.codReserva) as plazasReservadas from Horarios inner join reserva on reserva.codHorario=horarios.codHorario");
        echo $conectar->error;
        if ($resultado->num_rows >= 1) {
            // $conectar->close();
            return $resultado;
        } else {
            // $conectar->close();
            return false;
        }
    }
    static function borrarHoraActividades($codHorario)
    {
        $conectar = conexion::abrir_conexion();
        $conectar->query("Delete from Horarios where codHorario='$codHorario'");
        echo $conectar->error;
        $conectar->close();
        // if ($resultado) {
        //     $conectar->close();
        //     return $resultado;
        // } else {
        //     $conectar->close();
        //     return false;
        // }
    }

    static function reservarActividad($userName, $codHorario)
    {
        $conectar = conexion::abrir_conexion();
        if (Horarios::estaReservada($userName, $codHorario)) {
            echo "Ya ha reservado";
            // $conectar->close();
            return false;
        } else {
            $resultado = $conectar->query("Insert into reserva (userName, codHorario) values('$userName','$codHorario')");
            // $conectar->close();
            return $resultado;
        }
    }
    static function cancelarReserva($userName, $codHorario)
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Delete from reserva where userName='$userName' and codHorario='$codHorario'");
        $conectar->close();
        return  $resultado;
    }


    static function estaReservada($userName, $codHorario)
    {
        $conectar = conexion::abrir_conexion();
        $resultado=$conectar->query("Select * from reserva where userName='$userName' and codHorario='$codHorario'");
        // var_dump($resultado);
        // echo $resultado->num_rows;
        if ($resultado->num_rows>0) {
            $conectar->close();

            return true;
        } else {
            $conectar->close();
            return false;
        }
    }

    static function mostrarListadeAlumnosListados($codHorario){
        $conectar = conexion::abrir_conexion();
        $resultado=$conectar->query("Select nombre, apellidos,reserva.fecha from usuario inner join reserva on usuario.userName=reserva.userName where reserva.codHorario='$codHorario'");
        $conectar->close();
        if ($resultado->num_rows>0) {
            return $resultado;
           
        } else {
            return false;
            
        }
    }
}
    // function reemplazarActividad(){
    //     $conectar = conexion::abrir_conexion();
    //     // $resultado = $conectar->query("Update * from Horarios set nombreActividad = '$this->nombreActividad' where )
    //     $conectar->close();
    // }
