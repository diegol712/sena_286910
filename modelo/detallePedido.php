<?php

class DetallePedido{
    private $idDetallePedido;
    private $idPedido;
    private $idProducto;
    private $cantidad;
    private $valorUnitario;

    public function __construct(){

    }

    public function setIdDetallePedido($idDetallePedido){
        $this->idDetallePedido = $idDetallePedido;
    }

    public function setIdPedido($idPedido){
        $this->idPedido = $idPedido;
    }

    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function setValorUnitario($valorUnitario){
        $this->valorUnitario = $valorUnitario;
    }

    public function getIdDetallePedido(){
        return $this->idDetallePedido;
    }

    public function getIdPedido(){
        return $this->idPedido;
    }

    public function getIdProducto(){
        return $this->idProducto;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getValorUnitario(){
        return $this->valorUnitario;
    }
}

?>