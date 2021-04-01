<?php
//Tipos de conexiones a bases de datos:
//mysql: Conexión a mysql no orientada a objetos.
//mysqli: Conexión a mysql orientada a objetos.
//PDO: Conexión a Bases de Datos orientados a objetos.
class  Db{
    private static $conexion=NULL;
    private function __construct (){}

    public static function Conectar(){
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        self::$conexion= new PDO('mysql:host=localhost;dbname=crud_910','root','',$pdo_options);
        return self::$conexion;
    }	
    
    static function CerrarConexion(&$conn) {
        $conn=null;
    }
    
}

$Db=Db::Conectar(); 
	
?>
