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

    public static function validarContrasenia(JsonDB $db, $usuario, $contrasenia)
    {
        $array = $db->dbConnect();
        $errorLogin=[];
        foreach($array as $user){
            if($user['usuario'] == $usuario){
                if(password_verify($contrasenia, $user['contrasenia']) == true){
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