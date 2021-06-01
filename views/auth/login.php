<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form method="POST" class="formulario" action="/login">
        <fieldset>
                <legend>Email y Contraseña</legend>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" id="email" required>

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" id="password" required>

            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>

    </main>