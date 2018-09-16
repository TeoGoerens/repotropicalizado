<?php
    include('functions.php');
    if($_POST){
        dd($_POST);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
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
                                <?php
                                    $array = dbConnect('paises.json');
                                    foreach ($array as $key) :?>
                                        <option value="<?=$key['id']?>"><?= $key['nombre'];?></option>
                                    <?php endforeach;?>                                
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
                            <select name="gustos-musicales" class="form-control selectpicker" multiple data-live-search="true">
                                <?php
                                    $array = dbConnect('gustos-musicales.json');
                                    foreach ($array as $key) :?>
                                        <option value="<?=$key['id']?>"><?= $key['nombre'];?></option>
                                    <?php endforeach;?>
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
                                <?php
                                    $array = dbConnect('instrumentos.json');
                                    foreach ($array as $key) :?>
                                        <option value="<?=$key['id']?>"><?= $key['nombre'];?></option>
                                    <?php endforeach;?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>
</html>