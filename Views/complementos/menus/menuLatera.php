
<div class="text-white text-center h-100 float-left" style="  width: 15%; background: #191919; ">
    <div id="menu_lateral" class="h-100 text-white d-flex flex-column justify-content-star align-items-center pt-5"> 

        <?php if ($_SESSION["usuario"]["rol_usuario"] == 0) {/* si es admin */ ?>
 
            <h4><i class="bi bi-person" style="color: #f53c56;"></i><a href="<?php echo $this->base_url("Admin/usuarios") ?>">Usuarios</a></h4>
            <h4><i class="bi bi-arrow-bar-left" style="color: #6a59c7;"></i><a href="<?php echo $this->base_url("Home/cerrarSesion") ?>">CerrarSesion</a></h4>

        <?php } else {/* si es cliente */
            ?> 
 
            <h4><a href="<?php echo $this->base_url("Home/cerrarSesion") ?>">CerrarSesion</a></h4>

        <?php } ?>
    </div>    
</div>