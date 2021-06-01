<main class="contenedor seccion">
    <h1>Actualizar Organizador(a)</h1>

    <a href="/admin" class="boton boton-tell">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST">
        <?php include 'formulario_organizadores.php'; ?>
        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>
</main>