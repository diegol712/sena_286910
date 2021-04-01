<?php
class Pedido{
    private $id;
    private $documentoCliente;
    private $fecha;
    private $idEstado;
    private $idUsuario;

    public function __construct(){}

    //Métodos SET
    public function setIdPedido($id){
        $this->id = $id;
    }

    public function setDocumentoCliente($documentoCliente){
        $this->documentoCliente = $documentoCliente;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    //Métodos GET
    public function getIdPedido(){
        return $this->id;
    }

    public function getDocumentoCliente(){
        return $this->documentoCliente;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

}

?>