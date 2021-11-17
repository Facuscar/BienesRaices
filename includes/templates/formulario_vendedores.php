<fieldset>
         <legend>Informacion General</legend>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" placeholder="Ej: Carlos" name="vendedor[nombre]" value="<?php echo s($vendedor->nombre); ?>">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" placeholder="Ej: Fernandez" name="vendedor[apellido]" value="<?php echo s($vendedor->apellido); ?>">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" placeholder="Teléfono" name="vendedor[telefono]" value="<?php echo s($vendedor->telefono); ?>">


</fieldset>
