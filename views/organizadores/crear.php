<main class="contenedor seccion">
    <h1>Registrar Organizador(a)</h1>

    <a href="/admin" class="boton boton-tell">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" action="/organizadores/crear">
        <?php include __DIR__ . '/formulario_organizadores.php'; ?>
        <input type="submit" value="Registrar Organizador(a)" class="boton boton-verde">
    </form>
</main>