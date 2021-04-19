 
<!--no borrar el siguiene input, pasa la url a archivos js-->
<input type="hidden" id="baseUrl" value="<?= $this->base_url() ?>">
<div class=" h-100 container d-flex flex-column justify-content-center align-items-center">

    <div class="bg-light  row rounded border p-2 pb-3 w-100">
        <div class=" col-12 ">
            <h4>Datos de usuario</h4>
            <hr>
        </div>  
        <div class=" col-12 col-sm-6">

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person  "></i></span>
                </div>
                <input type="text" value="<?= $usuario["usuario"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill "></i></span>
                </div>
                <input type="text" value="<?= $usuario["password"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-app "></i></span>
                </div>
                <input type="text" value="<?= $usuario["rol"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-arrow-bar-left "></i></span>
                </div>
                <input type="text" value="<?= $usuario["estatus"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar "></i></span>
                </div>
                <input type="text" value="<?= $usuario["fecha_creacion"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3 "></i></span>
                </div>
                <input type="text" value="<?= $usuario["fecha_modificacion"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2  "></i></span>
                </div>
                <input type="text" value="<?= $usuario["fecha_eliminacion"] ?>" class="form-control" disabled>
            </div>
        </div> 
    </div> 
</div>
