<?php
include('helpers.php');
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

    if(buscarEmail($data['email'])){
        $errors['email'] = "El email ingresado ya existe";
    }

    if(buscarUsuario($data['usuario'])){
        $errors['usuario'] = "El usuario ingresado ya existe";
    }

    return $errors;
}

function buscarEmail($email){
    $array = dbConnect('usuarios.json');
    foreach($array as $user){
        if($user['email'] == $email){
            return true;
        }
    }
    return false;
}

function buscarUsuario($usuario){
    $array = dbConnect('usuarios.json');
    foreach($array as $user){
        if($user['usuario'] == $usuario){
            return true;
        }
    }
    return false;
}

function validarContrasenia($usuario, $contrasenia){
    $array = dbConnect('usuarios.json');
    foreach($array as $user){
        if($user['usuario'] == $usuario){
            if(password_verify($contrasenia, $user['contrsenia'])==true){
                return true;
            }
        }
    }
    return false;
}

function crearUsuario($data){
    
    $usuario = [
        'id' => idGenerator('usuarios.json'),
        'nombre' => $data['nombre'],
        'email' => $data['email'],
        'usuario' => $data['usuario'],
        'contrasenia' => password_hash($data['contrasenia'],PASSWORD_DEFAULT)
    ];
    
    return $usuario;
}

function idGenerator($archivo){
    $file = file_get_contents('json/' . $archivo);

    if($file == ""){
        return 1;
    }

    $array = explode(PHP_EOL,$file);
    array_pop($array);

    $lastUser = $array[count($array) - 1];
    $lastUser = json_decode($lastUser, true);

    return $lastUser['id'] + 1;
    
}

function guardarRegistro($data , $archivo){
    $json = json_encode($data);
    file_put_contents('json/' . $archivo , $json. PHP_EOL, FILE_APPEND|LOCK_EX);
}

function validateFormularioAdicional($data){
    $errors = [];
    if($data['nro-tel'] != ""){
        if(!tel_argentino_valido($data['nro-tel'])){
            $errors['nro-tel'] = "El telefono ingresado no es valido";
        }
    }

    if($data['edad'] != ""){
        if(($data['edad'] < 0) || ($data['edad'] >120)){
            $errors['edad'] = "Ingrese una edad valida";
        }
    }
    return $errors;
}

function tel_argentino_valido ( $tel ) {
    //eliminamos todo lo que no es dígito
    $num = preg_replace( '/\D+/', '', $tel);
    //devolver si coincidió con el regex
    return preg_match(
        '/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D',
        $num
    );
}

function crearInformacion($data){

    $infoUsuario = [
        'id' => $_SESSION['id'],
        'usuario' => $_SESSION['usuario'],
        'nro-tel' => $data['nro-tel'],
        'edad' => $data['edad'],
        'genero' => $data['genero'],
        'pais' => $data['pais'],
        'ciudad' => $data['ciudad'],
        'gustos-musicales' => $data['gustos-musicales'],
        'algun-instrumento' => $data['algun-instrumento'],
        'instrumento' => $data['instrumento'],
        'banda' => $data['banda'],
        'nombre' => $data['nombre-banda']
    ];

    return $infoUsuario;
}

function dbConnect($archivo){
    $file = file_get_contents('json/' . $archivo);
    $array = explode(PHP_EOL,$file);
    array_pop($array);
    $arrayResultado = [];
    foreach ($array as $key) {
        $json = json_decode($key , true);
        $arrayResultado[] = $json;
    }

    return $arrayResultado;
}

?>