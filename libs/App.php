<?php

/* Clase principal */

class App { 
    /* Cambiar los valores de acuerdo a su proyecto */

    /* Direccion del proyecto:
      para local usar : */

    public $base_url = "http://localhost/DadoRoom/";

    /* Para servidor en linea usar la direccion del sitio */
//    public $base_url = "http://dadoroom.com/"; 

    /* Controlador a cargar pro default */
    public $controlador_default = "Home";

    /*     * **************** */
    /*     * **************** */
    /*     * **************** */
    /*     * **************** */
    /* No cambiar los datos de abajo */

    public function __construct() {

        /* Filtro para mandar a una pantalla si no se ha iniciado sesion */
        $this->filtroUsuario();

        if (isset($_GET['url'])) {
            /** Cuando no se llama a la raiz: sitio.com/controlador * */
            $metodo = $_GET['url'];
        } else {
            /** Cuando se llama a la raiz: sitio.com/* */
            $archivoControlador = "Controlador/" . $this->controlador_default . ".php";
            if (file_exists($archivoControlador)) {

                require_once $archivoControlador;
                $controlador = new $this->controlador_default;
                $controlador->index();
            } else {
                $error = "NO Existe el Archivo " . $archivoControlador;
                $this->page_404($error);
                return;
            }
            return;
        }


        $url = rtrim($metodo, '/');
        
        $url = explode('/', $url);

        if ($metodo == "" || $metodo == "index.php") {
            echo "Vacio o Index";
        } else {
            $archivoControlador = 'Controlador/' . $url[0] . ".php";

            if (file_exists($archivoControlador)) {
                require_once $archivoControlador;
                $this->llamada($url);
            } else {

                $error = "No existe  Controlador $archivoControlador";
                $this->page_404($error);
                exit;
            }
        }
    }

    private function llamada($url) {

        $controlador = new $url[0];
        if (isset($url[1])) {
            /**/

            if (method_exists($url[0], $url[1])) {
                if (count($url) > 2) {

                    /* Si la direccion contiene mas de una seccion ejemplo: misitio.com/controlador/seccion2 */

                    $controlador->{$url[1]}($url[2]);
                } else {

                    /* Si la direccion contiene solo el controlador ejemplo: misitio.com/controlador */
                    $controlador->{$url[1]}();
                }
            } else {
                $error = "No existe  Controlador/$url[0]/$url[1]";
                $this->page_404($error);
                exit;
            }
            /**/
        } else {
            $controlador->index();
        }
    }

    public function base_url($url = "") {

        return $this->base_url . $url;
    }

    public function filtroUsuario() {
        require_once 'libs/sesiones.php';
        $sesion = new sesiones();
        $sesion->filtroUsuario();
    }

    public function page_404($error = null) {
        include_once "Views/dadoroom/function_404.php";
    }

    public function function_404($error = null) {
        include_once "Views/dadoroom/function_404.php";
    }

    public function entidad_404($error = "Entidad No Encontrada") {
        include_once "Views/dadoroom/function_404.php";
    }

    public function user_404($error = null) {
        include_once "Views/dadoroom/user_404.php";
    }

}
