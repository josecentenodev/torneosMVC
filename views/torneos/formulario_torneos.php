<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="torneo[titulo]" placeholder="Titulo Proyecto"
        value="<?php echo s( $torneo->titulo ); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="torneo[precio]" placeholder="$ Precio" value="<?php echo s( $torneo->precio ); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpg, image/png" name="torneo[imagen]">

    <?php if($torneo->imagen): ?>
        <img src="/imagenes/<?php echo $torneo->imagen ?>" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="torneo[descripcion]"><?php echo s( $torneo->descripcion ); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion Torneo</legend>
    <label for="equipos">Equipos:</label>
    <input type="number" id="equipos" name="torneo[equipos]" value="<?php echo s( $torneo->equipos ); ?>"
        placeholder="Cantidad de equipos/participante" min="8" max="16">

    <label for="fecha">Fecha</label>
    <input type="date" id="fecha" name="torneo[fecha]" value="<?php echo s( $torneo->fecha ); ?>" placeholder="fecha">

    <label for="Hora">Hora</label>
    <input type="time" id="hora" name="torneo[hora]" value="<?php echo s( $torneo->hora ); ?>">
</fieldset>

<fieldset>
    <legend>Organizador</legend>
    
    <label for="organizador">Organizador</label>
    <select name="torneo[organizadorId]" id="organizador">
    <option selected value="">-- Seleccione un Organizador --</option>
    <?php foreach($organizadores as $organizador): ?>
        <option 
        <?php echo $torneo->organizadorId === $organizador->id ? 'selected' : ''; ?>
        value="<?php echo s($organizador->id) ?>"><?php echo s($organizador->nombre) . " " . s($organizador->apellido); ?></option>
    <?php endforeach; ?>
    </select>
</fieldset>