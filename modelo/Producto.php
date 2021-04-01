<?php
class Producto{
    private $id;
    private $nombre;
    private $precio;
    private $estado;

    public function __construct(){

    }

    public function setIdProducto($id){
        $this->idProducto = $id;
    }

    public function setNombreProducto($nombre){
        $this->nombreProducto = $nombre;
    }

    public function setPrecioProducto($precio){
        $this->precioProducto = $precio;
    }

    public function setEstadoProducto($estado){
        $this->estadoProducto = $estado;
    }

    public function getIdProducto(){
        return $this->idProducto;
    }

    public function getNombreProducto(){
        return $this->nombreProducto;
    }

    public function getPrecioProducto(){
        return $this->precioProducto;
    }

    public function getEstadoProducto(){
        return $this->estadoProducto;
    }
}

?>