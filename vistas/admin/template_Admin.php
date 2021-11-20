<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <?= $this->vista("complementos/referencias/referencias"); ?>
</head>

<body>
    <main class="bg-l-g-1">

        <?php
        if (isset($contenido)) {
            include_once $contenido;
        }
        ?>
    </main>
</body>

</html>

<?= $this->vista("complementos/referencias/referencias_footer"); ?>