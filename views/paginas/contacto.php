<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php 
        if($mensaje){ ?>
            <p class='alerta exito'><?php echo $mensaje; ?></p>
       <?php }
    ?>

    <picture>
        <source srcset="/build/img/contactame.webp" type="image/webp">
        <source srcset="/build/img/contactame.jpg" type="image/jpeg">
        <img loading="lazy" src="/build/img/contactame.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form action="/contacto" class="formulario" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
           
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]"></textarea>

            <legend>Prueba de MostrarMetodos</legend>
            <div class="forma-contacto">
            <label for="contactar-telefono">Teléfono</label>
            <input type="radio" value="telefono"
            id="contactar-telefono"
            name="contacto[contacto]">

            <label for="contactar-email">Email</label>
            <input type="radio" value="email"
            id="contactar-email"
            name="contacto[contacto]">
            </div>
            
            <div id="contacto"></div>
        </fieldset>

        <fieldset>
            <legend>Informacion de Invocador</legend>
            <label for="nombre">Nombre de Invocador</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[invocador]" required>
        </fieldset>

        <fieldset>
            <legend>Informacion de Torneo</legend>
            <select id="opciones" name="contacto[torneo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <?php foreach ($torneos as $torneo) : ?>
                    <option value="<?php echo s($torneo->titulo) ?>"><?php echo s($torneo->titulo); ?></option>
                <?php endforeach; ?>
            </select>
        </fieldset>
        <input type="submit" value="Enviar" class="boton-tell">
    </form>
</main>