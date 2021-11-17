<fieldset>
            <legend>Informacion General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Ej: Hotel Sheraton" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo); ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="propiedad[precio]" id="precio" placeholder="Ej: 45000" value="<?php echo s($propiedad->precio); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
            <?php if($propiedad->imagen): ?>
                <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
            <?php endif;?>
            <label for="descripcion">Descripción</label>
            <textarea  id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
        </fieldset>

        <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitaciones">Habitaciones</label>
        <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="8" value="<?php echo s($propiedad->habitaciones); ?>">

        <label for="wc">Baños</label>
        <input type="number" name="propiedad[wc]" id="wc" placeholder="Ej: 2" min="1" max="6" value="<?php echo s($propiedad->wc); ?>">

        <label for="estacionamiento">Garages</label>
        <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 1" min="0" max="4" value="<?php echo s($propiedad->estacionamiento); ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <label for="vendedor">Vendedor</label>
                <select name="propiedad[vendedorId]" id="vendedor">
                    <option selected value="">---SELECCIONE---</option>
                    <?php foreach($vendedores as $vendedor) { ?>
                        <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id) ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
                        <?php } ?>
                </select>
        </fieldset>