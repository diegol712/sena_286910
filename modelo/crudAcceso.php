<?php
class crudAcceso{

    public function __construct(){

    }

    public function validarAcceso($usuario){
        //ALTER TABLE usuarios ADD FOREIGN KEY(IdRol) REFERENCES roles(IdRol)
        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->prepare("SELECT * FROM usuarios 
            WHERE Nombre =:nombre AND Password=:password
            AND estado=1"); //Definición del sql
        $sql->bindValue('nombre',$usuario->getNombre());
        $sql->bindValue('password',$usuario->getPassword());
        $sql->execute(); //ejecutar consulta
        try{
            $sql->execute(); //Ejecutar el sql
            $usuario->setExiste(0);//Asigno a Existe el valor de 0
           if($sql->rowCount() > 0){//Determinar el número de registros arrojados por la consulta
                $datosUsuario = $sql->fetch();//Asignar a una variable los datos de la consulta
                $usuario->setPassword('');
                $usuario->setExiste(1);
                $usuario->setRol($datosUsuario['IdRol']);//Asignando al atributo Rol el IdRol del Usuario
           }
        }
        catch(Exception $e)
        {
          echo $e->getMessage(); //Obtener mensaje de error.
        }
        Db::CerrarConexion($Db);
        return $usuario;
    }
}

?>