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
    <div class="row login">
        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 login-container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <img class= "logo" src="images/logo.jpg" alt="logo">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="titulo-login">SoundClub</h1>
                </div>
            </div>
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <label for="user" class="label-formulario">Nombre de Usuario o Email</label>
                            <div>
                                <input type="text" name="usuario" class="contenedor-input" required>
                            </div>

                            <label for="contraseña" class="label-formulario">Contraseña</label>
                            <div>
                                <input type="password" name="contraseña" class="contenedor-input contenedor-contraseña-login" required>
                            </div>
                            <a href="#"><p>¿Olvido su contraseña?</p></a> 

                            <input type="checkbox" class="label-formulario" value="1">
                            <label for="recordarme" >Recordarme</label>
                            

                            <button type="submit" class="boton-registro">Iniciar Sesion</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <?php
            include("footer.php");
        ?>
    </div>    
</body>
</html>


