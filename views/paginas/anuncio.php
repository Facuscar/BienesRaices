<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo; ?></h1>
       
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad->precio; ?></p>
            <ul class="iconos-casa">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading = "lazy">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading = "lazy">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading = "lazy">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
          
            <p><?php echo $propiedad->descripcion; ?></p>

        </div>
    </main>
