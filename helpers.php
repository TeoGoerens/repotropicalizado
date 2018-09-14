<?php
// Debug
function dd(...$param)
{
    echo "<pre>";
    die(var_dump($param));
}

// Errores en if ternario
function old($field)
{
    if(isset($_POST[$field])){
        return $_POST[$field];
    }
}

// Redireccionar
function redirect($url){
    header('Location: ' . $url);
    exit;
}

//Check
function check(){
    return isset($_SESSION['username']);
}

//Guest
function guest(){
    return !check();
}

