<?php
class CrudPedido
{
    public function __construct(){}

    public function listarPedido(){
        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->query('SELECT * FROM pedidos 
            ORDER BY Fecha DESC'); //Definición del sql
        $sql->execute(); //ejecutar consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //Retornar todo el listado de la consulta
    }

    public function registrarPedido($pedido){
        $mensaje = "";
        $Db = Db::Conectar();//Cadena de conexión
        $idPedido = -1;
        $sql = $Db->prepare('INSERT INTO
        pedidos(DocumentoCliente,Fecha,IdEstado,IdUsuario) VALUES
        (:documentoCliente,NOW(),:idEstado,:idUsuario)');
        $sql->bindValue('documentoCliente',$pedido->getDocumentoCliente());
        $sql->bindValue('idEstado',$pedido->getEstado());
        $sql->bindValue('idUsuario',$pedido->getIdUsuario());
        try{
            $sql->execute();
            $idPedido = $Db->lastInsertId();//Capturar el último Id Insertado en Pedido
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $idPedido;
    }


    public function registrarDetallePedido($detallePedido){
        $Db = Db::Conectar();//Cadena de conexión
        $idDetallePedido = -1;
        $sql = $Db->prepare('INSERT INTO
        detalle_pedidos(IdPedido,IdProducto,Cantidad, ValorUnitario) VALUES
        (:idPedido,:idProducto, :cantidad, :valorUnitario)');
        $sql->bindValue('idPedido',$detallePedido->getIdPedido());
        $sql->bindValue('idProducto',$detallePedido->getIdProducto());
        $sql->bindValue('cantidad',$detallePedido->getCantidad());
        $sql->bindValue('valorUnitario',$detallePedido->getValorUnitario());
        try{
            $sql->execute();
            $idDetallePedido = $Db->lastInsertId();//Capturar el último Id Insertado en DetallePedido
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $idDetallePedido;
    }

    public function listarDetallePedidos($idPedido){
        $Db = Db::Conectar();//Cadena de cone67nxión
        $sql = $Db->query("SELECT detalle_pedidos.*, 
                            UPPER(productos.Nombre) AS NombreProducto 
                            FROM detalle_pedidos
                            INNER JOIN productos ON detalle_pedidos.IdProducto=productos.IdProducto
                            WHERE IdPedido = $idPedido 
                            ORDER BY IdDetallePedido DESC"); //Definición del sql
        $sql->execute(); //ejecutar consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //Retornar todo el listado de la consulta
    }

    public function eliminarDetallePedido($idDetallePedido){
        $mensaje = "";
        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->prepare('DELETE FROM  detalle_pedidos
        WHERE IdDetallePedido=:idDetallePedido');
        $sql->bindValue('idDetallePedido',$idDetallePedido);
        try{
            $sql->execute();
            $mensaje = "Eliminación Exitosa";
         }
        catch(Exception $e){
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function actualizarDetallePedido($idDetallePedido, $cantidad){
        $mensaje = "";
        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->prepare('UPDATE detalle_pedidos
        SET Cantidad=:cantidad
        WHERE IdDetallePedido=:idDetallePedido');
        $sql->bindValue('cantidad',$cantidad);
        $sql->bindValue('idDetallePedido',$idDetallePedido);
        try{
            $sql->execute();
            $mensaje = "Actualización Exitosa";
         }
        catch(Exception $e){
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje; 
    }
}

?>