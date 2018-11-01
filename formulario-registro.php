<!-- Yo me imagino el registro en dos partes, primero la basica de todo registro onda nombre, mail, telefono, nombre de usuario y contraseña-->

<!-- Una vez terminado eso ya te crea la cuenta y te lleva a otro formulario para terminar de tomarte los datos en este caso para darte mayor personalizacion de la aplicacion, donde te pida edad, gustos musicales, si tocas algun instrumento y cual. Si responde que si toca un instrumento que tambien se le pregunta si forma parte de una banda y cosas asi. Todo esto pensado para poder ofrecerle al usuario mejor navegacion en la pagina-->

<?php
    include 'helpers.php';
    include 'loader.php';

    if($_POST){
        $usuario = new User($_POST['nombre'], $_POST['email'], $_POST['usuario'], $_POST['contrasenia']);
        $errors = Validate::registerValidate($usuario);
        if(empty($errors)){
            $usuarioArray = MysqlDB::createUser($usuario);
            MysqlDB::saveUser($usuarioArray);
            redirect('login.php');
        }
    }

?>

<form action="" method="POST">

<div class="row">
    <div class="col-lg-12 contenedor-formulario">
        <div class="row">
            <div class="col-lg-12 align-content-center">
                <?php if(isset($errors['nombre'])) : ?>
                    <p class="alert-warning alertas"><?= $errors['nombre'];?></p>
                <?php endif; ?>  
                <label for="nombre" class="label-formulario">Nombre y Apellido</label>
                <div>
                    <input type="text" name="nombre" placeholder="p.e. Juan Perez" class="contenedor-input" value="<?= (isset($_POST['nombre'])) ? $_POST['nombre'] : ""?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 align-content-center">
                <?php if(isset($errors['email'])) : ?>
                    <p class="alert-warning alertas"><?= $errors['email'];?></p>
                <?php endif; ?>
                <label for="mail" class="label-formulario">Correo Electronico</label>
                <div>
                    <input type="text" name="email" placeholder="p.e. juanperez@mail.com" class="contenedor-input" value="<?= isset($errors['email']) || $_POST == false ? "" : $_POST['email']?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 align-content-center">
                <?php if(isset($errors['usuario'])) : ?>
                    <p class="alert-warning alertas"><?= $errors['usuario'];?></p>
                <?php endif; ?>
                <label for="usuario" class="label-formulario">Nombre de Usuario</label>
                <div>
                <input type="text" name="usuario" placeholder="p.e. Juan_Perez" class="contenedor-input" value="<?= isset($errors['usuario']) || $_POST == false ? "" : $_POST['usuario']?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 align-content-center">
                <?php if(isset($errors['contrasenia'])) : ?>
                    <p class="alert-warning alertas"><?= $errors['contrasenia'];?></p>
                <?php endif; ?>
                <label for="contrasenia" class="label-formulario">Contraseña</label>
                <div>
                <input type="password" name="contrasenia" class="contenedor-input">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 align-content-center">
                <button type="submit" class="boton-registro">Registrarse</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Aca terminaria el registro obligatorio-->

<!-- En otra ventana se le abre un segundo formulario para agregar info adicional y poder personalizar la app para cada usuario-->

    
