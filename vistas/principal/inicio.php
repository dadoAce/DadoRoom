<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DadoRoom</title>
    <?= $this->vista("_complementos/referencias/referencias"); ?>
</head>

<body class="bg-g-1">
    <main class="main-principal h-100">

        <!--MENU LATERAL-->
        <?php $this->vista("_complementos/menus/menuPrincipal"); ?>
        <!--CONTENIDO-->
        <section id="contenido" class=" h-100 d-flex justify-content-center ">
            <?php $this->vista("principal/secciones/inicioSesion"); ?>
        </section>
    </main>
</body>

</html>
<?= $this->vista("_complementos/referencias/referencias_footer"); ?>