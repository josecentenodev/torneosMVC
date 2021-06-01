<?php

$auth = $_SESSION['login'] ?? false;

?>

<main class="contenedor seccion">
    <h1>Torneos</h1>
    <a href="/index.php" class="boton boton-tell">Volver</a>
    <?php
    include 'listado.php';
    ?>
    <?php if ($auth) : ?>
        <a href="/torneos/admin" class="boton boton-tell">Crea Torneo</a>
    <?php endif; ?>

</main>