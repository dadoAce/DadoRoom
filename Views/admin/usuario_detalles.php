 
<!--no borrar el siguiene input, pasa la url a archivos js-->
<input type="hidden" id="baseUrl" value="<?= $this->base_url() ?>">
<form class=" h-100 container d-flex flex-column justify-content-center align-items-center" method="post" action="<?= $this->base_url("Usuario/modificar"); ?>">
    <!--ID del usuario-->
    <input type="hidden" value="<?= $usuario["idUsuario"] ?>"   id="idUsuario" name="idUsuario"> 
    <!-- -->
    <div class="text-left w-100 pb-2">
        <a href="<?= $this->base_url("Admin"); ?>" class="btn  bg-white float-left"><- Todos los usuarios</a>
        <input type="button" class="btn  bg-8 text-white float-right" value="Editar" id="btn-editar">

    </div>
    <div class="bg-light  row rounded border p-2 pb-3 w-100">
        <div class=" col-12 ">
            <h4>Datos de usuario</h4>
            <hr>
        </div>  
        <div class=" col-12 col-sm-6">
            <label>Usuario</label>

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person  "></i></span>
                </div>
                <input type="text" value="<?= $usuario["usuario"] ?>" class="form-control  edicion" disabled id="usuario" name="usuario">
            </div>
        </div>
        <div class=" col-12 col-sm-6">
            <label>Password</label>

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill "></i></span>
                </div>
                <input type="text" value="<?= $usuario["password"] ?>" class="form-control  edicion" disabled   id="password" name="password">
            </div>
        </div>
        <div class=" col-12 col-sm-6">
            <label>Rol</label>

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-app "></i></span>
                </div> 

                <select class="form-control  edicion"  disabled id="rol" name="rol">
                    <?php if ($usuario["rol"] == "Admin") { ?>
                        <option value="0" selected>Admin</option>
                        <option value="1">Usuario</option> 
                    <?php } else {
                        ?>  
                        <option value="0" >Admin</option>
                        <option value="1" selected>Usuario</option>

                    <?php } ?>
                </select>
            </div>
        </div>
        <div class=" col-12 col-sm-6">
            <label>Estatus</label>

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-arrow-bar-left "></i></span>
                </div> 
                <select class="form-control  edicion"  disabled id="estatus" name="estatus">
                    <?php if ($usuario["estatus"] == "Activo") { ?>
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option> 
                    <?php } else {
                        ?>  
                        <option value="1" >Activo</option>
                        <option value="0" selected>Inactivo</option>

                    <?php } ?>
                </select>
            </div>
        </div>
        <div class=" col-12 col-sm-6">
            <label>Fecha Creacion</label>
            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar "></i></span>
                </div>
                <input type="text" value="<?= $usuario["fecha_creacion"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">
            <label>Fecha Modificacion</label>

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3 "></i></span>
                </div>
                <input type="text" value="<?= $usuario["fecha_modificacion"] ?>" class="form-control" disabled>
            </div>
        </div>
        <div class=" col-12 col-sm-6">
            <label>Fecha Eliminacion</label>

            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2  "></i></span>
                </div>
                <input type="text" value="<?= $usuario["fecha_eliminacion"] ?>" class="form-control" disabled>
            </div>
        </div> 


        <div class=" col-12 text-right">
            <input type="submit" class="btn btn-dark edicion" value="Guardar Cambios" style="display: none;">
        </div>
    </div> 
</form>
