<form action="accion.php" method="post" enctype="multipart/form-data">
    <label>
        Su nombre:<br>
        <input type="text" name="nombre" /></label>

    <p> <b>Sexo: </b><br>
        <input name="genero" type="radio" value="Femenino" />Femenino
        <br />
        <input name="genero" type="radio" value="Masculino" />Masculino
        <br />
    </p>

    <select name="seleccionado"> <!--Supplement an id here instead of using 'name'-->
        <option value="value1">Value 1</option> 
        <option value="value2">Value 2</option>
        <option value="value3">Value 3</option>
    </select><br>
    <input type="checkbox" name="vehicle" value="Bike"> I have a bike<br>
    <input type="checkbox" name="vehicle" value="Car" checked> I have a car<br>
    <H2>Buzón de sugerencias</H2>
    <TEXTAREA rows="5" cols="30" name="txtsugerencias">Sus sugerencias aquí...</TEXTAREA><BR><br>
   <label> Archivo seleccionado:
 <input name="myFile" type="file"><br>
    <input type="submit" value = "enviar"/></label>
</form>

