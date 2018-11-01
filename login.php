<?php

require 'loader.php';
require 'helpers.php';

    if(Auth::check())
    {
        redirect('home.php');
    }
    
    Auth::set();

    if(isset($_COOKIE['usuario'])){
        redirect('home.php');
    } else {
        if($_POST){
            $output = Auth::validarContrasenia($_POST['usuario'], $_POST['contrasenia']);
            if($output == 0){
                $_SESSION['usuario'] = $_POST['usuario'];
                if(isset($_POST['remember'])){
                    setcookie('usuario',$_POST['usuario'],time()+3600*24*365);
                }
                redirect("home.php");
            } elseif ($output == 1) {
                $errorLogin['contrasenia'] = "La contraseña es incorrecta";
            } elseif ($output == 2) {
                $errorLogin['usuario'] = "El usuario no existe";
            }
        }
        
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <div class="row w-100 ml-0 mr-0">
            <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 login-container mb-5">
                <a href="index.php"><div class="row mt-3">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <img class= "logo mr-0" src="images/logo.jpg" alt="logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="titulo-login">SoundClub</h1>
                    </div>
                </div></a>
                <form action="" method="POST">
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <div>
                                <?php if(isset($errorLogin['usuario'])){?>
                                <p class="alert-warning alertas"><?= $errorLogin['usuario'];?></p>
                                <?php }?>
                                <label for="user" class="label-formulario">Nombre de Usuario</label>
                                <div>
                                    <input type="text" name="usuario" class="contenedor-input" value="<?php if(isset($errorLogin['usuario']) || $_POST == false){echo "";} else {echo $_POST['usuario'];}?>">
                                </div>
                                <?php if(isset($errorLogin['contrasenia'])){?>
                                <p class="alert-warning alertas"><?= $errorLogin['contrasenia'];?></p>
                                <?php }?>
                                <label for="contrasenia" class="label-formulario">Contraseña</label>
                                <div>
                                    <input type="password" name="contrasenia" class="contenedor-input contenedor-contraseña-login">
                                </div>
                                <a href="passwordrecover.php"><p>¿Olvido su contraseña?</p></a> 

                                <input type="checkbox" class="label-formulario" name="remember" value="">
                                <label for="recordarme" >Recordarme</label>
                                

                                <button type="submit" class="boton-registro mb-0">Iniciar Sesion</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <?php
                include("footer.php");
            ?>
    </div>    
</body>
</html>


