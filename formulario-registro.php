<!-- Yo me imagino el registro en dos partes, primero la basica de todo registro onda nombre, mail, telefono, nombre de usuario y contraseña-->

<!-- Una vez terminado eso ya te crea la cuenta y te lleva a otro formulario para terminar de tomarte los datos en este caso para darte mayor personalizacion de la aplicacion, donde te pida edad, gustos musicales, si tocas algun instrumento y cual. Si responde que si toca un instrumento que tambien se le pregunta si forma parte de una banda y cosas asi. Todo esto pensado para poder ofrecerle al usuario mejor navegacion en la pagina-->

<form action="" method="POST">

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 align-content-center">    
                <label>Nombre y Apellido:</label>
                <input type="text" name="nombre" required>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 align-content-center">
                <label>Correo Electronico:</label>
                <input type="text" name="mail" placeholder="abcdef@email.com" required>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 align-content-center">
                <label>Telefono:</label>
                <input type="tel" name="nro-tel" placeholder="+54(011)48598992"required>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 align-content-center">
                <label>Nombre de Usuario:</label>
                <input type="text" name="usuario" required>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 align-content-center">
                <label>Contraseña:</label>
                <input type="password" name="contraseña" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 align-content-center">
                <button type="submit">Registrarse</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Aca terminaria el registro obligatorio-->

<!-- En otra ventana se le abre un segundo formulario para agregar info adicional y poder personalizar la app para cada usuario-->

    
