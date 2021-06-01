<?php 

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELL</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <!-- <img src="build/img/logo.svg" alt="Logotipo de Mi Proyecto"> -->TELL
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" class="dark-mode-btn">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/torneos">Torneos</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php else: ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <!-- Cierre de la Barra -->

        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor--footer">
            <nav class="icons">
                <a href="#"><img src="../build/img/twitter.png" alt="logo de twitter"></a>
                <a href="#"><img src="../build/img/youtube.png" alt="logo de youtube"></a>
                <a href="#"><img src="../build/img/instagram.png" alt="logo de instagram"></a>
                <a href="#"><img src="../build/img/facebook.png" alt="logo de facebook"></a>
                <a href="#"><img src="../build/img/twitch.png" alt="logo de twitch"></a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>