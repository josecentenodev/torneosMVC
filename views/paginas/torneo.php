<main class="contenedor seccion">
        <h1><?php echo $torneo->titulo; ?></h1>
        <a href="/index.php"class="boton boton-tell">Volver</a>
        <div class="torneo">
                    <img loading="lazy" src="/imagenes/<?php echo $torneo->imagen; ?>" alt="torneo">
                <div class="contenido-torneo">
                    <h3><?php echo $torneo->titulo; ?></h3>
                    <p><?php echo $torneo->descripcion; ?></p>
                    <p class="precio"><?php echo $torneo->precio; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img loading="lazy" src="build/img/penguin.png" alt="Cantidad de Equipos">
                            <p>Cupo: <span><?php echo $torneo->equipos; ?></span></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/calendar.png" alt="Cantidad de Equipos">
                            <p>Fecha: <span><?php echo substr($torneo->fecha, 0, 10); ?>...</span></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/time.png" alt="Cantidad de Equipos">
                            <p>Hora: <span><?php echo $torneo->hora; ?></span></p>
                        </li>
                    </ul>
                </div>
                <!--.contenido-torneo-->
            </div>
            <!--.torneo-->
    </main>