<?php
class Acceso{
    private $nombre;
    private $password;
    private $existe;
    private $rol;

    public function __construct(){

    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setExiste($existe){
        $this->existe = $existe;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getExiste(){
        return $this->existe;
    }

    public function getRol(){
        return $this->rol;
    }
}

/*
$usuario = new Acceso();
$usuario->setUsuario('admin');
$usuario->setPassword('1234');
$usuario->setExiste(1);
$usuario->setRol(1);

var_dump($usuario);
*/
?>