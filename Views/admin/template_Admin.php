<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include_once 'Views/complementos/referencias/referencias.php'; ?>
    </head>
    <body> 
        <main  class="bg-l-g-1">
            
        <?php
        if (isset($contenido)) {
            include_once $contenido;
        }
        ?>
        </main>
    </body>
</html>

<?php include_once 'Views/complementos/referencias/referencias_footer.php'; ?> 