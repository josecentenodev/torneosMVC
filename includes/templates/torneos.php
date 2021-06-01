<?php 
// require __DIR__ . '/../config/database.php'; // La ruta es relativa al index.php desde donde se manda a llamar este archivo
// require 'includes/config/database.php';
// Importar la conexion
// $db = conectarDB();

// Consultar
// $query = "SELECT * FROM torneos LIMIT ${limite}";

// Obtener resultado
// $resultado = mysqli_query($db, $query);


// Consulta para depurar fecha de torneo

// $consultaFechaTorneo = "SELECT left(fecha,10) FROM torneos";
// $resultadoFechaTorneo = mysqli_query($db, $consultaFechaTorneo);
// $fechaTorneo = mysqli_fetch_assoc($resultadoFechaTorneo);


use Model\Torneo;

if($_SERVER['SCRIPT_NAME'] === '/torneos.php') {
    $torneos = Torneo::all();
} else {
    $torneos = Torneo::get(3);
}

?>


<div class="contenedor-torneos">
    <?php foreach($torneos as $torneo): ?>
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

                    <a href="torneo.php?id=<?php echo $torneo->id; ?>" class="boton-tell-block">
                        Ver Torneo
                    </a>
                </div>
                <!--.contenido-torneo-->
            </div>
            <!--.torneo-->
            <?php endforeach; ?>
        </div>
        <!--.contenedor-torneos-->


        