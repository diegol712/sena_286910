<?php
include("../modelo/crudCliente.php");
class ControladorCliente{

    public function __construct(){ //Constructor
    }

    public function listarCliente(){ // Método para hacer la petición al modelo clientes
        $crudCliente = new CrudCliente(); // Crear un objeto de la clase CrudCliente.
        return $crudCliente->listarCliente(); //Retornando los valores del método listarCliente
    }
}


$ControladorCliente = new ControladorCliente();  //Crear un objeto de la clase Producto

?>