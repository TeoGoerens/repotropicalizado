<?php

require_once 'DB.php';

class JsonDB extends DB
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function dbConnect()
    {
        $usersArray = [];
        $db = file_get_contents($this->file);
        $arr = explode(PHP_EOL, $db);
        array_pop($arr);

        foreach($arr as $user)
        {
            $usersArray[] = json_decode($user, true);
        }
        return $usersArray;
    }

    public function dbUserSearch($usuario)
    {
        $users = $this->dbConnect();
        foreach($users as $user)
        {
            if($user['usuario'] === $usuario)
            {
                return $user;
            }
        }
        return null;
    }
    
    public function dbEmailSearch($email)
    {
        $users = $this->dbConnect();
        foreach($users as $user)
        {
            if($user['email'] === $email)
            {
                return $user;
            }
        }
        return null;
    }

    public function idGenerate()
    {
        $arr = $this->dbConnect();
        if($arr == [])
        {
            return 1;
        }
        return count($arr) + 1;
    }

    public function createUser(User $user)
    {
        $usuario = [
            'id' => $this->idGenerate(),
            'nombre' => $user->getFullName(),
            'email' => $user->getEmail(),
            'usuario' => $user->getUsername(),
            'contrasenia' => password_hash($user->getPassword(), PASSWORD_DEFAULT)
        ];
        return $usuario;
    }
    
    public function saveUser($userArray)
    {
        $file = $this->file;
        $jsonUser = json_encode($userArray);
        file_put_contents($file, $jsonUser . PHP_EOL, FILE_APPEND);
    }
}

?>