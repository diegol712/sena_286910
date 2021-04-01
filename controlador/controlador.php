<?php
include("conexion.php");
include("../modelo/Producto.php");
include("../modelo/crudProducto.php");
class Controlador{

    public function __construct(){ //Constructor
    }

    public function listarProducto(){ // Método para hacer la petición al modelo productos
        $crudProducto = new CrudProducto(); // Crear un objeto de la clase CrudProducto.
        return $crudProducto->listarProducto(); //Retornando los valores del método listarProdudcto
    }

    public function registrarProducto($nombreProducto,$precioProducto,$estadoProducto){
        $producto = new Producto(); //Crear objeto del tipo producto
        $producto->setNombreProducto($nombreProducto); // Asignar valores a los atributos
        $producto->setPrecioProducto($precioProducto); // Asignar valores a los atributos
        $producto->setEstadoProducto($estadoProducto); // Asignar valores a los atributos
        
        $crudProducto = new CrudProducto();
        $crudProducto->registrarProducto($producto);
        header('Location:../vista/listarProductos.php');
    }

    public function buscarProducto($idProducto){
        $crudProducto = new CrudProducto();
        return $crudProducto->buscarProducto($idProducto);   
    }

    public function actualizarProducto($idProducto,$nombreProducto,$precioProducto,$estadoProducto){
        $producto = new Producto(); //Crear objeto del tipo producto
        $producto->setIdProducto($idProducto); // Asignar valores a los atributos
        $producto->setNombreProducto($nombreProducto); // Asignar valores a los atributos
        $producto->setPrecioProducto($precioProducto); // Asignar valores a los atributos
        $producto->setEstadoProducto($estadoProducto); // Asignar valores a los atributos
        
        $crudProducto = new CrudProducto();
        $crudProducto->actualizarProducto($producto);
        header('Location:../vista/listarProductos.php');
    }

    public function eliminarProducto($idProducto){
        $crudProducto = new CrudProducto();
        return $crudProducto->eliminarProducto($idProducto);   
    }
}

$Controlador = new Controlador();  //Crear un objeto de la clase Producto
//var_dump($Controlador->listarProducto()); //Mostrar información.

if(isset($_GET['registrarProducto'])){
    header('Location:../vista/registroProducto.html');
    //header: Redireccionar
}
if(isset($_POST['registrarProducto'])){
    //LLamado al método de registar el producto del controlador
    $Controlador->registrarProducto($_POST['nombreProducto'],$_POST['precioProducto'],$_POST['estadoProducto']);
}
if(isset($_POST['editarProducto'])){
    header('Location:../vista/editarProducto.php?idProducto='.$_POST['idProducto']);
}
if(isset($_POST['actualizarProducto'])){
    //LLamado al método de modificar el producto del controlador
    $Controlador->actualizarProducto($_POST['idProducto'],$_POST['nombreProducto'],$_POST['precioProducto'],$_POST['estadoProducto']);
}
if(isset($_POST['eliminarProducto'])){
    //echo "Eliminando producto".$_POST['idProducto'];
    echo $Controlador->eliminarProducto($_POST['idProducto']);
}
if(isset($_POST['consultarPrecio'])){
    echo $Controlador->buscarProducto($_POST['idProducto'])['Precio'];
}
?>