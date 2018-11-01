<?php

require_once 'DB.php';

abstract class MysqlDB extends DB
{
    
    public function dbConnect()
    {
        $user = "root";
        $pass = "";
        $conex = "mysql:host=localhost;dbname=soundcloud_db;charset=utf8mb4;port=3306;";
        $conexion = new PDO($conex,$user,$pass);
        return $conexion;
    }

    public function dbUserSearch($user)
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
        foreach ($row as $usuario) {
            if($usuario['user'] = $user){
                return $user;
            }
        }
        return null;
    }

    public function dbEmailSearch($email)
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
        foreach ($row as $usuario) {
            if($usuario['email'] = $email){
                return $usuario;
            }
        }
        return null;
    }

    public function createUser(User $user)
    {
        $usuario = [
            'nombre' => $user->getFullName(),
            'email' => $user->getEmail(),
            'usuario' => $user->getUsername(),
            'contrasenia' => password_hash($user->getPassword(),PASSWORD_DEFAULT)
        ];
        return $usuario;
    }

    public function saveUser($userArray)
    {
        $conexion = MysqlDB::dbConnect();
        $sql = "insert into users (namelastname, email,user,password) values (:namelastname, :email, :user,:password)";
        $preparar = $conexion->prepare($sql);
            $preparar->bindParam(":namelastname",$userArray['nombre']);
            $preparar->bindParam(":email",$userArray['email']);
            $preparar->bindParam(":user",$userArray['usuario']);
            $preparar->bindParam(":password",$userArray['contrasenia']);
        $preparar->execute();
    }
}