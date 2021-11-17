<?php 

if(!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? null;

if (!isset($inicio)){
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo  $inicio ? 'inicio': '';?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="enlace">
                <img src="/build/img/logo.svg" alt="Logotipo de bienes raices">
            </a>

            <div class="mobile-menu">
                <img src="/build/img/barras.svg" alt="icono menu responsive">
            </div>
            <div class="derecha">
            <img src="/build/img/dark-mode.svg" alt="" class="dark-mode-boton">
            <nav class="navegacion" data-cy="navegacion-header">
            <a href="/nosotros">Nosotros</a>
            <a href="/anuncios">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
            <?php
            if ($auth==true){
                ?> 
                <a href="/logout">Cerrar Sesión</a>
            <?php } ?>
            
        </nav>
        </div>

     
            </div>
            <?php
            if($inicio){
                echo "<h1 data-cy='heading-sitio'>Venta de casas y departamentos exclusivos </h1>";
            }        
            ?>

        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion" data-cy="navegacion-footer">
                <a href="/nosotros">Nosotros</a>
            <a href="/anuncios">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
        </nav>
        </div>


        <p data-cy="copyright" class="copyright">Todos los derechos reservados <?php echo date('Y');?>.®</p>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>