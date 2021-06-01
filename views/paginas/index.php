<main class="contenedor seccion">
        <h1>Informacion Sobre Torneos</h1>

        <?php include 'iconos.php' ?>
    </main>

    <section class="seccion contenedor">
        <h2>Proximos Torneos</h2>
        <?php 
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="torneos" class="boton-verde">Ver Todos</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Algo llamativo para los chabones</h2>
        <p>Originalmente llena el formulario y nos pondremos en contacto </p>
        <a href="/contacto" class="boton-tell">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blogtell1.webp" type="image/webp">
                        <source srcset="build/img/blogtell1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blogtell1.jpg" alt="Texto Entrada BlogTell">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Titulo de entradablog1</h4>
                        <p>Escrito el <span>26/03/2021</span> por: <span>Admin</span></p>
                        <p>Descripcion de entradablog1</p>
                    </a>
                </div>
            </article>
            <!--.article-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blogtell2.webp" type="image/webp">
                        <source srcset="build/img/blogtell2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blogtell2.jpg" alt="Texto Entrada BlogTell">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Titulo de entradablog2</h4>
                        <p>Escrito el <span>26/03/2021</span> por: <span>Admin</span></p>
                        <p>Descripcion de entradablog2</p>
                    </a>
                </div>
            </article>
            <!--.article-->
        </section>
        <!--.seccion-->

        <section class="testimoniales">
            <h3>testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae consectetur deleniti reiciendis voluptas mollitia molestiae. Alias enim aperiam mollitia itaque ea aliquid, veniam praesentium. Inventore unde recusandae nobis voluptas aliquid.
                </blockquote>
                <p>Dev Cito</p>
            </div>
        </section>
    </div>