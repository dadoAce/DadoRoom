<?php

/**
 * Description of sesiones
 *
 * @author dado_
 */
class sesiones extends App {
    /* Sesion de usuarios 
     * El filtro se llama desde libs/App.php con el metodo filtroUsuario
     *      */

    public $filtro_usuario = false; /* True: Realizar filtro; false: no realizar el filtro */
    public $inicio_sesion_vista = "Home/inicio";
    public $inicio_sesion = "Home/iniciarSesion";

    /* Carpeta de recursos para no redireccionar */
    public $carpeta_recursos = "Assets";
    /* Nombre de la sesion de usuario */
    public $sesion_usuario = "usuario";

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function cerrarSesion() {
        unset($_SESSION[$this->sesion_usuario]);
    }

    public function setUsuarioSesion($datos) {
        $_SESSION[$this->sesion_usuario] = $datos;
    }

    public function getUsuarioSesion($id = null) {
        if ($id == null) {

            return $_SESSION[$this->sesion_usuario];
        } else {
            return $_SESSION[$this->sesion_usuario][$id];
        }
    }

    /* Si la variable $filtro_usuario es verdadera, se ejecutara;
     * revisar si existe alguna sesion de usuario, si no redericcionar a pagina de iniciar sesion
     */

    public function filtroUsuario() {
        if (!$this->filtro_usuario) {

            return;
        }
        if (!isset($_SESSION[$this->sesion_usuario])) {

            if (isset($_GET['url'])) {
                /** Cuando no se llama a la raiz: sitio.com/controlador * */
                $metodo = $_GET['url'];


                /* Evitar redirecciones de carpeta de archivos */
                if ($this->rutas($metodo)) {
                    return;
                }

                if ($metodo != $this->inicio_sesion_vista) {
                    header("Location: " . $this->base_url($this->inicio_sesion_vista));
                }
            } else {
                echo "igual";

                /** Cuando se llama a la raiz: sitio.com/* */
                header("Location: " . $this->base_url($this->inicio_sesion_vista));
            }
        } else {
            return;
        }
    }

    /* Metodo para ignorar direciones para evitar filtro */

    public function rutas($metodo) {

        $url = rtrim($metodo, '/');
        $url = explode('/', $metodo);
        if ($url[0] == $this->carpeta_recursos) {
            return true;
        }
        if ($metodo == $this->inicio_sesion) {
            return true;
        }
    }

}
