<?php

class Admin extends App {

    function __construct() {
        
    }

    public function index() {
        $this->inicio();
    }
 
    /* Vista */

    public function inicio() {
        /* Llamar al Modelo Usuarios */
        require_once 'Modelo/UsuarioModel.php';
        /* Crear Objeto */
        $usuarioM = new UsuarioModel();

        /* Crear variables */
        $usuarios = $usuarioM->usuariosActivos(1);
        $usuariosInactivos = $usuarioM->usuariosActivos(0);

        /* Direccion de vista en variable */
        $contenido = "Views/Admin/usuarios_admin.php";
        /* Mostrar la plantilla dibde se mostrara la el contenido */
        include_once "Views/Admin/template_Admin.php";
    }

}
