<div class="  h-50 ">  
    <div class="h-100 d-flex flex-column justify-content-center align-items-center">

        <form class=" bg-light row border rounded-pill p-1 w-50"  action="<?= $this->base_url("Admin/crearUsuario"); ?>" method="post">
            <div class="text-center w-100">
                <h5>Crear Nuevo Usuario</h5>
            </div>
            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center   pl-5 pr-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-plus-fill"></i></span>
                </div>
                <input type="text" id="usuario" name="usuario" maxlength="100" required="" class="form-control">
            </div>  
            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  pl-5 pr-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                </div>
                <input type="text" id="password" name="password" maxlength="100" required="" class="form-control">
            </div> 
            <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  pl-5 pr-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-app"></i></span>
                </div>
                <select id="rol_usuario" name="rol_usuario" class="form-control">
                    <option value="1">Usuario</option>
                    <option value="0">Admin</option>

                </select>
            </div>  
            <div class=" col-12 pt-2 text-center">
                <input type="submit" class="btn bg-2 text-white" value="Crear Usuario">
            </div>
        </form> 
    </div>
</div>
<section class="h-25 d-flex flex-column justify-content-center align-items-center w-100 p-1 text-white">



    <h5>Usuarios</h5>
    <table class="table table-dark w-50">
        <thead>
        <th>Usuarios</th>
        <th>Rol</th>
        <th>Estatus</th>
        <th> </th> 
        </thead>
        <tbody>
            <?php if ($usuarios != null) { 
                ?>
                <?php foreach ($usuarios as $value) { ?>
                    <tr>
                        <td><a href="<?php echo $this->base_url("Usuario/detallesUsuario/" . $value["idUsuario"]) ?>"class="text-white"> <?php echo $value["usuario"] ?></a></td> 
                        <td><?php echo $value["rol"] ?></td> 
                        <td><?php echo $value["estatus"] ?></td>  
                        <td><a href="<?php echo $this->base_url("Admin/eliminarUsuario/" . $value["idUsuario"]) ?>"class="btn btn-danger">Eliminar</a>
                            <a href="<?php echo $this->base_url("Usuario/detallesUsuario/" . $value["idUsuario"]) ?>"class="btn btn-primary"> Detalles</a></td>
                    </tr>
                <?php }
                ?> 
            <?php } else {
                ?> 


            <?php } ?>
        </tbody>
    </table>

</section> 