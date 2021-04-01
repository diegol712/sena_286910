<?php
require_once("conexion.php");
require_once("../modelo/Acceso.php");
require_once("../modelo/crudAcceso.php");
class ControladorAcceso{

    public function __construct(){ //Constructor
    }

    public function validarAcceso($nombreUsuario, $password){
        $acceso = new Acceso();
        $acceso->setNombre($nombreUsuario);
        $acceso->setPassword($password);
        $crudAcceso = new crudAcceso();
        return $crudAcceso->validarAcceso($acceso);
    }
}

$controladorAcceso = new ControladorAcceso();

if(isset($_POST['validarAcceso'])){
   
    $usuario=($controladorAcceso->validarAcceso($_POST['nombreUsuario'],$_POST['password']));
    if($usuario->getExiste() == 1){
        //echo "Existe".$usuario->getRol();
        session_start(); //Inicializando variable de Session
        $_SESSION['nombreUsuario'] = $usuario->getNombre();
        $_SESSION['Rol'] = $usuario->getRol();
        header('Location:../vista/menu.php');
    }
    else{
        header('Location:../index.html');
    }
}
else if(isset($_GET['cerrarSesion'])){ //Destruir la variable de Sesión
    session_start(); //Inicializando variable de Session
    session_destroy();
    header('Location:../index.html');
}

?>