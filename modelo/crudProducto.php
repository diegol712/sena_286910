<?php
class CrudProducto
{
    public function __construct(){}

    public function listarProducto(){
        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->query('SELECT * FROM productos 
            ORDER BY Nombre ASC'); //Definición del sql
        $sql->execute(); //ejecutar consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //Retornar todo el listado de la consulta
    }

    public function registrarProducto($producto){
        $mensaje = "";
        $Db = Db::Conectar(); //Conexión a bd
        //Definir la sentencia sql
        $sql =  $Db->prepare('INSERT INTO 
        productos(Nombre,Precio, Estado) VALUES
        (:nombreProducto,:precioProducto,:estadoProducto)');
        $sql->bindvalue('nombreProducto',$producto->getNombreProducto());
        $sql->bindvalue('precioProducto',$producto->getPrecioProducto());
        $sql->bindvalue('estadoProducto',$producto->getEstadoProducto());

        try{
            $sql->execute(); //Ejecutar el sql
            $mensaje= "Registro Exitoso"; //Mostrar mensaje de registro exitoso
        }
        catch(Exception $e)
        {
            $mensaje= $e->getMessage(); //Obtener mensaje de error.
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function buscarProducto($idProducto){
        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->query("SELECT * FROM productos 
            WHERE IdProducto = $idProducto"); //Definición del sql
        $sql->execute(); //ejecutar consulta
        Db::CerrarConexion($Db);
        return $sql->fetch(); //Retornar un registro
    }

    public function actualizarProducto($producto){
        $mensaje = "";
        $Db = Db::Conectar(); //Conexión a bd
        //Definir la sentencia sql
        $sql =  $Db->prepare('UPDATE
        productos  SET 
        Nombre=:nombreProducto,
        Precio=:precioProducto, 
        Estado=:estadoProducto
        WHERE IdProducto=:idProducto
        ');
        $sql->bindvalue('nombreProducto',$producto->getNombreProducto());
        $sql->bindvalue('precioProducto',$producto->getPrecioProducto());
        $sql->bindvalue('estadoProducto',$producto->getEstadoProducto());
        $sql->bindvalue('idProducto',$producto->getIdProducto());

        try{
            $sql->execute(); //Ejecutar el sql
            $mensaje= "Modificación Exitoso"; //Mostrar mensaje de registro exitoso
        }
        catch(Exception $e)
        {
            $mensaje= $e->getMessage(); //Obtener mensaje de error.
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function eliminarProducto($idProducto){
        $mensaje = "";
        $Db = Db::Conectar(); //Conexión a bd
        //Definir la sentencia sql
        $sql =  $Db->prepare('DELETE FROM
        productos WHERE IdProducto=:idProducto
        ');
        $sql->bindvalue('idProducto',$idProducto);

        try{
            $sql->execute(); //Ejecutar el sql
            $mensaje= "1"; //Mostrar mensaje de registro exitoso
        }
        catch(Exception $e)
        {
            $mensaje= $e->getMessage(); //Obtener mensaje de error.
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

}
?>