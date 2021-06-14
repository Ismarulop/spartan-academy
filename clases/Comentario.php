<?php


class Comentario{
    private $codComentario;
    private $texto;
    private $userName;
    private $rating;
    

    function construirComentario($codComentario, $texto, $userName,$rating)
    {
        $this->codComentario = $codComentario;
        $this->texto = $texto;
        $this->userName = $userName;
        $this->rating = $rating;
    }

    function insertarComentario()
    {
        $conectar = conexion::abrir_conexion();
        $conectar->query("Insert into Comentario (id,contenido, userName,rating) values('$this->codComentario','$this->texto','$this->userName','$this->rating')");
        // var_dump($conectar->error);
        // if ($conectar->error) {
        // }

        $conectar->close();


    }


    static function mostrarComentario()
    {
        $conectar = conexion::abrir_conexion();
        $resultado = $conectar->query("Select *,(Select imagen_perfil from usuario where comentario.userName=usuario.userName) as imagen_perfil from Comentario");

        if ($resultado->num_rows >= 1) {
            $conectar->close();
            return $resultado;
        } else {
            $conectar->close();
            return false;
        }
    }

    
}
