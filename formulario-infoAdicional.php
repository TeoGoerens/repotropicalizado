<?php
    include('functions.php');
    if($_POST){
        $errors = validateFormularioAdicional($_POST);
        if(empty($errors)){
            guardarRegistro(crearInformacion($_POST),'info-usuarios.json');
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
    <title>SoundClub</title>
</head>
<body>
    <div class="container-fluid contenedor-formulario-adicional">
        
        <div>
            <?php
                include("header.php");
            ?>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-6 offset-3 text-center">
                <h1>Bienvenido!!</h1>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-8 offset-2 text-center mb-5">
                <h5>Completa la siguiente información adicional para poder disfrutar al maximo. Nos permitira personalizar tu experiencia para que lo vivas como mas te gusta.</h5>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-lg-6 offset-3 mb-5">
                <form action="" method="POST">
                    <div class="form-row mb-5">
                            <div class="col">
                                <input type="tel" name="nro-tel" placeholder="Telefono" class="form-control">
                            </div>
                    
                            <div class="col">
                                <input type="number" name="edad" class="form-control" placeholder="Edad">
                            </div>
                    
                            <div class="col">
                                <select name="genero" class="form-control">
                                    <option value="">Genero</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                    </div>

                    <div class="form-row mb-5">
                        <div class="col">
                            <select name="pais" class="form-control">
                                <option value="">Pais</option>
                                <?php if(file_exists('paises.json')) :?>
                                <?php
                                $i=0;
                                $recurso = fopen('paises.json' , 'r');
                                while ( ($linea = fgets($recurso)) != false) :?>
                                    <option value="<?= $i;?>"><?= json_decode($linea,true)['nombre'];?></option>
                                <?php endwhile;?> 
                                <?php
                                    $i++;
                                ?>
                            <?php endif;?>
                            </select>
                        </div>

                        <div class="col">
                            <select name="ciudad" class="form-control">
                                <option value="">Ciudad</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row mb-5">
                        <div class="col">
                            <select name="gustos-musicales" class="form-control">
                                <option value="">Elige tus gustos musicales</option>
                                <?php if(file_exists('gustos-musicales.json')) :?>
                                <?php
                                $i=0;
                                $recurso = fopen('gustos-musicales.json' , 'r');
                                while ( ($linea = fgets($recurso)) != false) :?>
                                    <option value="<?= $i;?>"><?= json_decode($linea,true)['nombre'];?></option>
                                <?php endwhile;?> 
                                <?php
                                    $i++;
                                ?>
                            <?php endif;?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-5">
                        <div class="col">
                            <select name="algun-instrumento" class="form-control">
                                <option value="">¿Tocas algun Instrumento?</option>
                                <option value="1">SI</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="instrumento" class="form-control">
                                <option value="">Cual</option>
                                <?php if(file_exists('instrumentos.json')) :?>
                                <?php
                                $i=0;
                                $recurso = fopen('instrumentos.json' , 'r');
                                while ( ($linea = fgets($recurso)) != false) :?>
                                    <option value="<?= $i;?>"><?= json_decode($linea,true)['nombre'];?></option>
                                <?php endwhile;?> 
                                <?php
                                    $i++;
                                ?>
                            <?php endif;?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-5">
                        <div class="col">
                            <select name="banda" class="form-control">
                                <option value="">¿Formas parte de una Banda?</option>
                                <option value="1">SI</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" name="nombre-banda" class="form-control" placeholder="Nombre de la Banda">
                        </div>
                    </div>

                    <button type="submit" class="boton-registro">Guardar información</button>
                </form>
            </div>
        </div>
    </div>

    <div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>