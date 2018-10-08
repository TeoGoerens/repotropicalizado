<?php

require('functions.php');
require 'loader.php';

if(Auth::guest()){
    setcookie('usuario', null, time()-1);
    redirect('index.php');
} else {
    session_destroy();
    setcookie('usuario', null, time()-1);
    redirect('index.php');
}

?>