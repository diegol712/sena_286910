<?php
include("conexion.php");
include("../modelo/pedido.php");
include("../modelo/detallePedido.php");
include("../modelo/crudPedido.php");

class ControladorPedido{

    public function __construct(){ //Constructor
    }

    public function listarPedido(){ // Método para hacer la petición al modelo productos
        $crudPedido = new CrudPedido(); // Crear un objeto de la clase CrudProducto.
        return $crudPedido->listarPedido(); //Retornando los valores del método listarProdudcto
    }

    public function registrarPedido($cliente){
        $pedido = new Pedido();
        $pedido->setDocumentoCliente($cliente);
        $pedido->setEstado(1);//Estado inicial del pedido
        $pedido->setIdUsuario(1); //Ajustar posteriormente
        $crudPedido = new CrudPedido();
        return $crudPedido->registrarPedido($pedido);
    }

    public function registrarDetallePedido($idPedido,$idProducto,$cantidad,$valorUnitario){
        $detallePedido = new DetallePedido();
        $crudPedido = new CrudPedido();
        $detallePedido->setIdPedido($idPedido);
        $detallePedido->setIdProducto($idProducto);
        $detallePedido->setCantidad($cantidad);
        $detallePedido->setValorUnitario($valorUnitario);
        return $crudPedido->registrarDetallePedido($detallePedido);
    }

    public function listarDetallePedidos($idPedido){ // Método para hacer la petición al modelo pedido
        $crudPedido = new CrudPedido(); // Crear un objeto de la clase CrudPedido.
        return $crudPedido->listarDetallePedidos($idPedido); //Retornando los valores del método listarDetallePedidos
    }

    public function eliminarDetallePedido($idDetallePedido){ // Método para hacer la petición al modelo pedido
        $crudPedido = new CrudPedido(); // Crear un objeto de la clase CrudPedido. 
        return $crudPedido->eliminarDetallePedido($idDetallePedido); //Retornando los valores del método listarDetallePedidos
    }

    public function actualizarDetallePedido($idDetallePedido, $cantidad){
        $crudPedido = new CrudPedido(); // Crear un objeto de la clase CrudPedido. 
        return $crudPedido->actualizarDetallePedido($idDetallePedido, $cantidad); //Retornando los valores del método listarDetallePedidos    
    }
}

$ControladorPedido = new ControladorPedido();

if(isset($_GET['registrarPedido'])){
    header('Location:../vista/registroPedido.php');
    //header: Redireccionar
}
else if(isset($_POST['registrarPedido'])){
    $idPedido = $_POST['pedido'];
    if($idPedido == ""){
        //Insertar Pedido
        $idPedido=$ControladorPedido->registrarPedido($_POST['cliente']);
    }
    
    //Insertar DetallePedido
    $ControladorPedido->registrarDetallePedido($idPedido,$_POST['producto'],$_POST['cantidad'],$_POST['precio']);

    echo $idPedido;
}
else if(isset($_POST['listarDetallePedido'])){
    $idPedido = $_POST['pedido'];
    require_once('../vista/listarDetallePedido.php');
}
else if(isset($_POST['eliminarDetallePedido'])){
    echo $ControladorPedido->eliminarDetallePedido($_POST['idDetallePedido']);
}
else if(isset($_POST['actualizarDetallePedido'])){
    echo $ControladorPedido->actualizarDetallePedido($_POST['idDetallePedido'], $_POST['cantidad']);
}



?>