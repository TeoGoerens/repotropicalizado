<?php

function validate($data){
    $nombre = $data['nombre'];
    $email = $data['email'];
    $usuario = $data['usuario'];
    $password = $data['contrasenia'];
    $errors = [];

    $nombre = trim($nombre);
    if($nombre == ''){
        $errors['nombre']= "El campo nombre no puede estar vacio";
    }

    $email = trim($email);
    if($email == ''){
        $errors['email']= "El campo email no puede estar vacio";
    }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors['email']= "Debe ingresar un email valido";
    }

    $usuario = trim($usuario);
    if (strlen($usuario) < 8) {
        $errors['usuario']= "El nombre de usuario debe tener 8 caracteres como minimo";
    }

    $password = trim($password);
    if(strlen($password) < 8) {
        $errors['contrasenia']= "La contraseña debe tener 8 caracteres como minimo";
    }

    if(file_exists('usuarios.json')){
        $recurso = fopen('usuarios.json' , 'r');
        $i = 0;
        while ( ($linea = fgets($recurso)) != false){
            $arrayAsociativo[$i] = json_decode($linea,true);
            if($arrayAsociativo[$i]['email'] == $email){
                $errors['email'] = "El email ingresado ya se encuentra registrado";
            }
            if($arrayAsociativo[$i]['usuario'] == $usuario){
                $errors['usuario'] = "El usuario ingresado ya se encuentra en uso";
            }
            $i++;
        }
    }
    
    return $errors;
}

function crearUsuario($data){
    $usuario['nombre'] = $data['nombre'];
    $usuario['email'] = $data['email'];
    $usuario['usuario'] = $data['usuario'];
    $usuario['contrasenia'] = password_hash($data['contrasenia'],PASSWORD_DEFAULT);
    return $usuario;
}

function guardarUsuario($usuario){
    $json = json_encode($usuario);
    file_put_contents("usuarios.json", $json. PHP_EOL,FILE_APPEND|LOCK_EX);
}

?>