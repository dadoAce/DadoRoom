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
    <?= $this->vista("complementos/referencias/referencias"); ?>
</head>

<body class="bg-l-g-1  d-flex flex-column justify-content-center align-items-center">
    <div class="h-50  d-flex flex-column justify-content-center align-items-center bg-light border pl-5 pr-5 shadow rounded">
        <?php
        echo $error
        ?>
        <img class="w-50" src="<?= $this->base_url("assets/imgs/sistema/page_404") ?>">
    </div>
</body>

</html>