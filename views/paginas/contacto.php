<main class="contenedor seccion">
        <h1 data-cy="heading-contacto">Contacto</h1>

        <?php if ($mensaje){ ?>
            <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo $mensaje; ?></p>
        <?php } ?>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" loading="lazy" alt="Imagen contacto">
        </picture>

        <h2 data-cy="heading-formulario">Llene el formulario de contacto</h2>
        <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información personal</legend>
                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje</label>
                <textarea data-cy="input-mensaje" name="contacto[mensaje]" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la propiedad</legend>
                <label for="opciones">Venta o Compra</label>
                <select data-cy="input-opciones" name="contacto[tipo]" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>
                <label for="presupuesto">Precio o presupuesto</label>
                <input data-cy="input-precio" type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required> 

            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">

                <label for="contactar-telefono">Télefono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required></input>

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>