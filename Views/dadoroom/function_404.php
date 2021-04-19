<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aqui no hay nada :(</title>
        <?php include_once 'Views/complementos/referencias/referencias.php'; ?>
    </head>
    <body class="bg-l-g-1  d-flex flex-column justify-content-center align-items-center">
        <div class="h-50  d-flex flex-column justify-content-center align-items-center bg-light border pl-5 pr-5 shadow rounded">
            <?php
            if (isset($error)) {

                echo $error;
            }else{
                echo "No se ha registrado algun error, revisar App.php";
            }
            ?>
            <img class="w-50" src="<?= $this->base_url("Assets/imgs/sistema/page_404") ?>">
        </div>
    </body>
</html>
