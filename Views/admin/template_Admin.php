<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include_once 'Views/complementos/referencias/referencias.php'; ?>
    </head>
    <body class="bg-l-g-1"> 
        <?php
        if (isset($contenido)) {
            include_once $contenido;
        }
        ?>
    </body>
</html>

<?php include_once 'Views/complementos/referencias/referencias_footer.php'; ?> 