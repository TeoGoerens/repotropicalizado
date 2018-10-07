<?php

class Validate
{
    public static function registerValidate(JsonDB $db, User $user)
    {
    $nombre = $user->getFullName();
    $email = $user->getEmail();
    $usuario = $user->getUsername();
    $password = $user->getPassword();
    $errors = [];

    $nombre = trim($nombre);
    if($nombre == '')
    {
        $errors['nombre']= "El campo nombre no puede estar vacio";
    }

    $email = trim($email);
    if($email == '')
    {
        $errors['email']= "El campo email no puede estar vacio";
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
        $errors['email']= "Debe ingresar un email valido";
    }

    $usuario = trim($usuario);
    if (strlen($usuario) < 8) 
    {
        $errors['usuario']= "El nombre de usuario debe tener 8 caracteres como minimo";
    }

    $password = trim($password);
    if(strlen($password) < 8) 
    {
        $errors['contrasenia']= "La contraseña debe tener 8 caracteres como minimo";
    }

    if($db->dbUserSearch($usuario))
    {
        $errors['usuario'] = "El usuario ingresado ya existe";
    }
    
    if($db->dbEmailSearch($email))
    {
        $errors['email'] = "El email ingresado ya existe";
    }

    return $errors;
    }
}

?>