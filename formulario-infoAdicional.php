<form action="" method="GET">

    <label>Edad:</label>
        <input type="number" name="edad" value="edad" required>

        <label>Genero:</label>
            <input type="radio" name="genero" value="masculino">
            <label>Masculino</label>
            <input type="radio" name="genero" value="femenino">
            <label> Femenino</label>
            <input type="radio" name="genero" value="otro">
            <label>Otro</label>

        <label>Gustos Musicales:</label>
        <select name="gustos-musicales">
            <option value="1">Rock</option>
            <option value="2">Rock and Roll</option>
            <option value="3">Rock alternativo</option>
            <option value="4">Rock psicodelico</option>
            <option value="5">Punk Rock</option>
            <option value="6">Indie Rock</option>
            <option value="7">Funk</option>
            <option value="8">Country</option>
            <option value="9">Metal</option>
            <option value="10">Jazz</option>
            <option value="11">Blues</option>
            <option value="12">Musica Clasica</option>
            <option value="13">Pop</option>
            <option value="14">Rap</option>
            <option value="15">Hip-Hop</option>
            <option value="16">Reggae</option>
            <option value="17">Disco</option>
            <option value="18">House</option>
            <option value="19">Techno</option>
            <option value="20">Trance</option>
        </select>

        <label>Tocas algun instrumento:</label>
            <input type="radio" name="instrumento-si" value="1">
            <label>Si</label>
            <input type="radio" name="instrumento-no" value="2">
            <label>No</label>

        En caso de que conteste si se le pregunta cual instrumento y tambien si forma parte de una banda
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
</form>