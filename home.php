<?php 

require 'loader.php';

Auth::set();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    
<div class="container-fluid">
        <header>
            <?php
                include("header.php")
            ?>
        </header>
    
        <main class="home-container">         
            <div class="row">
                <div class="col-lg-12 text-center mt-4">
                    <h1>Te has loguedo con exito</h1>
                    <h3>Bienvenido a tu perfil <?php if(isset($_COOKIE['usuario'])) {echo($_COOKIE['usuario']);} else {echo($_SESSION['usuario']);} ?></h3>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-2 modulos">
                    <?php
                        include("modulos.php");
                    ?>
                </div>

                <div class="col-lg-9 offset-lg-1 perfil">
                    <?php
                        include("perfil.php");
                    ?>
                </div>
            </div>
            <?php
                include("footer.php");
            ?>
        </main>
   </div>
  
</body>
</html>