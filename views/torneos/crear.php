<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin"class="boton boton-tell">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario_torneos.php'; ?>

        <input type="submit" value="Crear Torneo" class="boton boton-verde">
    </form>

</main>