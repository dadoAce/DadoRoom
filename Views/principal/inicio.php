<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DadoRoom</title>
    <?php include_once 'Views/complementos/referencias/referencias.php'; ?>
</head>

<body class="bg-g-1">
    <main class="main-principal h-100" >

        <!--MENU LATERAL-->
        <section id="menu-lateral" class="h-100">
            <?php $this->vista("complementos/menus/menuPrincipal"); ?>

        </section>

        <!--CONTENIDO-->
        <section id="contenido" class=" h-100 d-flex justify-content-center ">

            <?php $this->vista("principal/secciones/inicioSesion"); ?>
        </section>


    </main>

</body>

</html>
  
<?php include_once 'Views/complementos/referencias/referencias_footer.php'; ?>