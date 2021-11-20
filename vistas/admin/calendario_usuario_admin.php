<!DOCTYPE html>

<html>

<head>
    <?= $this->vista("complementos/referencias/referencias"); ?>

</head>

<body>
    <!--no borrar el siguiene input, pasa la url a archivos js-->
    <input type="hidden" id="baseUrl" value="<?= $this->base_url() ?>">
    <?php
    include "Views/menu_lateral.php";
    ?>

    <div class="container ">

        <section class="d-flex flex-row justify-content-start align-items-center text-white pt-5 pb-5">
            <h3> <i class="red bi bi-calendar4 pr-2"></i></h3>
            <h1 style="font-family: system-ui;"> Shedule</h1>
        </section>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="  col-12 col-sm-6 offset-sm-1   bg-light rounded w-75">


                <div class="row">
                    <div class=" col-12 d-flex flex-row justify-content-between align-items-center  ">
                        <label>Content Calendar</label>
                        <button class="btn " data-target="#modal-add-evento-usuario" data-toggle="modal">
                            <h3><i class="bi bi-upload "></i></h3>
                        </button>
                    </div>
                    <div class=" col-12 ">

                        <div id='calendar' data-url="eventosUsuarioJSON/<?= $usuario["id_usuario"] ?>"></div>
                    </div>

                </div>
            </div>
            <div class=" col-12 col-sm-4 ">
                <div class=" w-75   bg-light  " style="height: 630px;border-radius:  20px;border: solid black;">
                    <div class="bg-light   border-bottom " style="border-radius: 20px;">
                        <div class="container-fluid">

                            <div class="row ">
                                <div class=" col-12 d-flex flex-row justify-content-center">
                                    <div style="height: 13px;background: black;width: 200px;border-radius: 0px 0px 20px 20px;">

                                    </div>
                                </div>


                                <!--cabecera-->
                                <div class=" col-12 border-bottom">
                                    <div class="row">
                                        <div class=" col-2 ">

                                            <i class="bi bi-person-plus-fill"></i>
                                        </div>
                                        <div class=" col-8 text-center">
                                            <b>onesweat</b>
                                        </div>
                                        <div class=" col-2 ">

                                            <i class="bi bi-app"></i>
                                        </div>

                                    </div>
                                </div>
                                <!--seguidores-->
                                <div class=" col-12 ">
                                    <div class="container-fluid">

                                        <div class="row">
                                            <div class=" col-4 p-1">
                                                <div style="border: solid;height: 70px;width: 70px;border-radius: 50px; background: #191919;border: #f53c56 solid"></div>
                                            </div>
                                            <div class=" col-8 ">
                                                <div class="row">
                                                    <div class=" col-12 ">
                                                        <div class="row pt-1" style="font-size: 60%;">

                                                            <div class=" col-3 ">
                                                                <b>960</b>
                                                                <label>Post</label>
                                                            </div>
                                                            <div class=" col-3 ">
                                                                <b>100</b>
                                                                <label>followers</label>

                                                            </div>
                                                            <div class=" col-3 ">
                                                                <b>111</b>
                                                                <label>following</label>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class=" col-9 text-right   ">
                                                        <button class="btn btn-info " style="padding: 0px;width: 90%;">Follow</button>
                                                    </div>
                                                    <div class=" col-2  ">
                                                        <button class="btn btn-info " style="padding-top: 0px;   padding-bottom: 0px;">v</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--informacion-->
                                <div class=" col-12 ">
                                    <b>Sweat</b>
                                    <label>qweqw asdpoqjw qwdicasoicda knasdansdono asdo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3 d-block" id="celular-muestra">

                        <?php
                        if ($imagenes_muestra != null) {
                            foreach ($imagenes_muestra as $img) {
                        ?>
                                <img style="" id="img_<?php echo $img["id_evento"] ?>" data-id="<?php echo $img["id_evento"] ?>" data-start="<?php echo $img["start"] ?>" class="img-cell" src="<?php echo $this->base_url() . $img["imagen"] ?>">

                            <?php }
                            ?>
                        <?php } else {
                        ?>


                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "Views/complementos/modals.php"; ?>


</body>

</html>

<?= $this->vista("complementos/referencias/referencias_footer"); ?>
<?= $this->vista("complementos/referencias/referencias_footer_callendar"); ?>