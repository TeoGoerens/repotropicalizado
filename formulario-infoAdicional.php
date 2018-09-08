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
                <h1>Bienvenido a SoundClub</h1>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-8 offset-2 text-center">
                <h5>Completa la siguiente información adicional para poder disfrutar al maximo. Nos permitira personalizar tu experiencia para que lo vivas como mas te gusta.</h5>
            </div>
        </div>
        
        <div class="row registro-adicional">
            <div class="col-lg-12 offset-1 mt-5">
                <form action="" method="POST">
                    <ul>
                    <div class="row">
                            <div class="col-lg-12">
                                <li><label class="label-formulario-adicional" for="nro-tel">Telefono</label>
                                <input type="tel" name="nro-tel" placeholder="+54(011)48598992" class="contenedor-input-adicional" required></li>
                            </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-lg-12">
                                <li><label class="label-formulario-adicional" for="edad">Edad</label>
                                <input type="number" name="edad" class="contenedor-input-adicional" required></li>
                            </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-lg-12">
                                <li><label class="label-formulario-adicional" for="genero">Genero</label>
                                <select name="genero" class="contenedor-input-adicional">
                                    <option value="">Seleccione el Genero</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="otro">Otro</option>
                                </select></li>
                            </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <li><label class="label-formulario-adicional" for="gustos-musicales">Gustos Musicales</label>
                            <select name="gustos-musicales" class="contenedor-input-adicional" multiple>
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
                            </li>
                        </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-lg-12">
                                <li><label class="label-formulario-adicional">Tocas algun instrumento</label>
                                <input type="radio" name="instrumento" value="1">SI
                                <input type="radio" name="instrumento" value="0">NO
                                </li>
                            </div>
                    </div>

                        <!--En caso de que conteste si se le pregunta cual instrumento y tambien /si forma parte de una banda 
                        <label>Cual:</label>
                        <select name="instrumentos">
                            <option value="1">Acordeón</option>
                            <option value="1">Armónica</option>
                            <option value="1">Bajo</option>
                            <option value="1">Batería</option>
                            <option value="1">Bongos</option>
                            <option value="1">Contrabajo</option>
                            <option value="1">Flauta</option>
                            <option value="1">Guitarra</option>
                            <option value="1">Órgano</option>
                            <option value="1">Piano</option>
                            <option value="1">Saxofón</option>
                            <option value="1">Sintetizador</option>
                            <option value="1">Trompeta</option>
                            <option value="1">Ukelele</option>
                            <option value="1">Violín</option>
                        </select>

                        <label>Formas parte de una banda:</label>
                            <input type="radio" name="banda-si" value="1">
                            <label>Si</label>
                            <input type="radio" name="banda-no" value="2">
                            <label>No</label>

                        Si forma parte de una banda
                        <label>Nombre de la banda:</label>
                        <input type="text" name="nombre-banda" value="nombre-banda">
                        !-->
                    </ul>
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