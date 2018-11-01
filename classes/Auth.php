<?php

class Auth
{
    public static function set()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public static function check()
    {
        return isset($_SESSION['usuario']);
    }

    public static function guest()
    {
        return !self::check();
    }

    public static function validarContrasenia($usuario, $contrasenia)
    {
        $row = [];
        $conexion = MysqlDB::dbConnect();
        $sql = "select * from users";
        $preparar= $conexion->prepare($sql);
        $preparar->execute();
        while ($resultado = $preparar->fetch())
        {
            $row[]= $resultado;
        }
        foreach($row as $user){
            if($user['user'] == $usuario){
                if(password_verify($contrasenia, $user['password']) == true){
                    return 0;
                } else {
                    return 1;
                }
            }
        }
        return 2;
    }
}

?>