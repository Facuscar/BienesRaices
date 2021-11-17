<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
        <?php endforeach; ?>

        <form  data-cy="formulario-login" method="POST" action="" class="formulario" action="/login">
        <fieldset>

                <legend>Email y password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu e-mail" id="email" >

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu password" id="password" >

                <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

            </fieldset>
        </form>
    </main>