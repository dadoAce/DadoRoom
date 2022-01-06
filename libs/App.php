<?php

/* Clase principal */

class App
{
    /* Cambiar los valores de acuerdo a su proyecto */

    /* $_base_url
        METODO PRINCIPAL: base_url()
        Direccion del proyecto: 
            RECOMENDABLE:   DEJAR EN BLANCO PARA USAR NOTACIÓN ../ 
            OPCIONAL:       LLENAR SI QUIERES ESPECIFICAR OTRA DIRECCIÓN
      
      */
    public $_base_url = "";


    //RUTAS DE LAS CARPETAS; NOMBRE DE LOS FOLDERS
    public $locacion_controladores  = "controladores";
    public $locacion_modelos        = "modelos";
    public $locacion_vistas         = "vistas";
    public $locacion_entidad        = "entidades";
    public $locacion_lib            = "libs";

    /* Controlador a cargar pro default */
    public $controlador_default = "Home";

    /* No cambiar los datos de abajo */

    public function __construct()
    {
        /* Filtro para mandar a una pantalla si no se ha iniciado sesion */
        $this->filtroUsuario();

        if (isset($_GET['url'])) {
            /** Cuando no se llama a la raiz: sitio.com/controlador * */
            $metodo = $_GET['url'];
        } else {
            /** Cuando se llama a la raiz: sitio.com/* */
            $archivoControlador = $this->locacion_controladores . "/" . $this->controlador_default . ".php";
            if (file_exists($archivoControlador)) {

                require_once $archivoControlador;
                $controlador = new $this->controlador_default;
                $controlador->index();
            } else {
                $error = "No Existe el Archivo " . $archivoControlador;
                $this->page_404($error);
            }
            return;
        }

        /**SI LA URL TIENE UN METODO */
        $url = rtrim($metodo, '/');

        $url = explode('/', $url);

        if ($metodo == "" || $metodo == "index.php") {
            echo "Vacio o Index";
        } else {
            $archivoControlador = $this->locacion_controladores . '/' . $url[0] . ".php";

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

    private function llamada($url)
    {

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
                $error = "No existe " . $this->locacion_controladores . "/$url[0]/$url[1]";
                $this->page_404($error);
                exit;
            }
            /**/
        } else {
            $controlador->index();
        }
    }

    //METODO IMPORTANTE: 
    public function base_url($url = "")
    {
        if ($this->_base_url == "") {
            return  "../" . $url;
        } else {

            return $this->_base_url . $url;
        }
    }

    public function filtroUsuario()
    {
        require_once 'libs/Sesiones.php';
        $sesion = new sesiones();
        $sesion->filtroUsuario();
    }

    public function page_404($error = null)
    {
        include_once  $this->locacion_vistas . "/dadoroom/function_404.php";
    }

    public function function_404($error = null)
    {
        include_once $this->locacion_vistas . "/dadoroom/function_404.php";
    }

    public function entidad_404($error = "Entidad No Encontrada")
    {
        include_once $this->locacion_vistas . "/dadoroom/function_404.php";
    }

    public function user_404($error = null)
    {
        include_once $this->locacion_vistas . "/dadoroom/user_404.php";
    }

    //LLAMAR A UNA VISTA
    public function vista($vista, $datos = null, $soloRuta = false)
    {
        if ($soloRuta) {
            return $this->locacion_vistas . "/" . $vista . ".php";
        }
        if (file_exists($this->locacion_vistas . "/" . $vista . ".php")) {
            if ($datos != null) {

                extract($datos);
            }
            include_once $this->locacion_vistas . "/" . $vista . ".php";
        } else {
            echo "VISTA NO ENCONTRADA";
            echo "<br>";
            echo $this->locacion_vistas . "/" . $vista . ".php";
        }
    }

    //LLAMAR A UN MODELO
    public function modelo($modelo)
    {
        include $this->locacion_modelos . "/" . $modelo . ".php";
        return new $modelo();
    }
    //LLAMAR A UNA ENTIDAD
    public function entidad($modelo)
    {
        include $this->locacion_entidad . "/" . $modelo . ".php";
    }
    //LLAMAR A UNA libreria
    public function lib($lib)
    {
        include $this->locacion_lib . "/" . $lib . ".php";
        return new $lib();
    }

    public function header($link)
    {

        header("Location: " . $this->base_url($link));
    }
}
