<main class="contenedor">
        
        <h2 data-cy="heading-nosotros">Más sobre nosotros</h2>
        
        <?php include 'iconos.php' ?>
        
    </main>

    <section class="seccion contenedor">
        <h2>Casas en venta</h2>

        <?php 
        $mostrar = 3;
        include '../views/paginas/listado.php'
        ?>
     
        <div class="alinear-derecha"> 
            <a data-cy="ver-todas" class="boton-verde" href="/anuncios">Ver todas</a>
        </div>
        
    </section>

    <section data-cy="imagen-contacto" class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo-inlineblock">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>02/07/2021</span> por: <span>Facundo Scardillo</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>

            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p>Escrito el: <span>02/07/2021</span> por: <span>Facundo Scardillo</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>

            </article>
        </section>
        <section data-cy="testimoniales" class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de manera impecable, con una gran atención y una propiedad que se ajusta a mis necesidades.
                </blockquote>
                <p>- Bill Gates</p>

            </div>
        </section>
    </div>