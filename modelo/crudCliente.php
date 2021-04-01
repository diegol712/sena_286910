<?php
class CrudCliente
{
    public function __construct(){}

    public function listarCliente(){
        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->query('SELECT * FROM clientes 
            ORDER BY Nombre ASC'); //Definición del sql
        $sql->execute(); //ejecutar consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //Retornar todo el listado de la consulta
    }
}

?>