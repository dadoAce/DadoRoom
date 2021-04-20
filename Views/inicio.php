<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>DadoRoom</title>
        <?php include_once 'Views/complementos/referencias/referencias.php'; ?>
    </head>
    <body class="bg-l-g-1">
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
            <div class="h-25  d-flex flex-column justify-content-center align-items-center bg-light border pl-5 pr-5 shadow rounded"   >
                <img width="100" src="<?php echo $this->base_url("/Assets/imgs/sistema/LogoDado200p.png") ?>">
                <h1>DADOROOM v.1</h1>

            </div>
            <div class="bg-white pt-3 p-2">
                <h1>Bienvenido a DADOROOM</h1>
                <p>Para empezar a desarrollar tu proyecto, favor de cambiar las variables principales en los siguientes archivos</p>
                <ul type="disc">
                    <li>"libs/App.php"-> $base_url</li>
                    <li>"libs/BD.php"-> datos de la BD</li> 
                </ul>   
                <p>Cambiar variable "$base_url" a direccion de tu proyeto</p>
            </div>
            <form class="text-center    d-flex flex-column justify-content-center align-items-center bg-white border pl-5 pr-5 pb-3 shadow rounded" action="<?= $this->base_url("Usuario/iniciarSesion"); ?>" method="post">
                <div>
                    <label>Usar el Script de ejemplo 'BD_DadoRoom.sql' para poder ejecutar los procesos pre establecidos en los siguientes archivos</label>
                    <ul type="none">
                        <li>'Modelo/usuarioModel'</li>
                        <li>'Controlador/usuario'</li> 
                    </ul>   
                    <label>En caso de tener experiencia puedes borrarlos</label>
                </div> 

                <h3>Inicia Sesion</h3>  
                <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person  "></i></span>
                    </div>
                    <input type="text" class="form-control text-center shadow" name="usuario" id="usuario" placeholder="Usuario" value="Admin">
                </div>
                <div class="input-group mb-3 text-center d-flex flex-row justify-content-center  ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                    </div>
                    <input type="password" class="form-control text-center shadow" name="password" id="password"  placeholder="password" value="Admin">
                </div> 
                <br>

                <input type="submit" class="btn bg-2 text-white" value="Iniciar Sesion">

            </form>
        </div>
    </body>
</html>

<?php include_once 'Views/complementos/referencias/referencias_footer.php'; ?> 