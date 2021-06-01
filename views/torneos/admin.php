    <main class="contenedor seccion">
        <h1>Administrador de Torneos</h1>
        <?php 
        if($resultado) {
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje){ ?>
            <p class="alerta exito"> <?php echo s($mensaje); ?> </p> 
            <?php }
        }
        ?>
         
        <a href="/torneos/crear" class="boton boton-verde">Nuevo Torneo</a>
        <a href="/organizadores/crear" class="boton boton-tell">Nuevo Organizador</a>

            <h2>Torneos</h2>
        <table class="torneos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--. Mostrar los resultados -->
            <?php foreach( $torneos as $torneo ): ?>
                <tr>
                    <td><?php echo $torneo->id; ?></td>
                    <td><?php echo $torneo->titulo; ?></td>
                    <td> <img src="/imagenes/<?php echo $torneo->imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $torneo->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/torneos/eliminar">
                            <input type="hidden" name="id" value="<?php echo $torneo->id; ?>">
                            <input type="hidden" name="tipo" value="torneo">
                            <input type="submit" class="boton-tell-block" value="Eliminar">
                        </form>
                        <a href="/torneos/actualizar?id=<?php echo $torneo->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Organizadores</h2>
        <table class="torneos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--. Mostrar los resultados -->
            <?php foreach( $organizadores as $organizador ): ?>
                <tr>
                    <td><?php echo $organizador->id; ?></td>
                    <td><?php echo $organizador->nombre . " " . $organizador->apellido; ?></td>
                    <td><?php echo $organizador->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/organizadores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $organizador->id; ?>">
                            <input type="hidden" name="tipo" value="organizador">
                            <input type="submit" class="boton-tell-block" value="Eliminar">
                        </form>
                        <a href="organizadores/actualizar?id=<?php echo $organizador->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>