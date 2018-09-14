<?php

require('functions.php');

if(guest()){
    setcookie('usuario', null, time()-1);
    redirect('index.php');
} else {
    session_destroy();
    setcookie('usuario', null, time()-1);
    redirect('index.php');
}

?>