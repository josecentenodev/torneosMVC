<fieldset>
<legend>Informacion General</legend>

<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="organizador[nombre]" placeholder="Nombre Organizador(a)" value="<?php echo s($organizador->nombre); ?>">

<label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="organizador[apellido]" placeholder="Apellido Organizador(a)" value="<?php echo s($organizador->apellido); ?>">

<label for="telefono">Telefono:</label>
<input type="number" id="telefono" name="organizador[telefono]" placeholder="Telefono Organizador(a)" value="<?php echo s($organizador->telefono); ?>">

</fieldset>