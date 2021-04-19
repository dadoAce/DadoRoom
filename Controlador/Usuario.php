<?php

class Usuario extends App {

    function __construct() {
        
    }

    public function index() {
        
    }

    public function iniciarSesion() {
        /* Llamar a clases */
        require_once "libs/sesiones.php";
        require_once 'Modelo/UsuarioModel.php';
        /* Instanciar Clases creando objetos */
        $sesion = new sesiones();
        $usuarioModel = new UsuarioModel();
        /* Obtener los datos del formulario de inicio de sesion; Guardarlos en un arreglo */
        $datos["usuario"] = $_POST["usuario"];
        $datos["password"] = $_POST["password"];
        /* Mander el arreglo y buscar en la base de datos */
        $result = $usuarioModel->iniciarSesion($datos);

        if ($result != null) {
            /* Guardar valores en una sesion */
            $sesion->setUsuarioSesion($result);

            if ($result["rol_usuario"]) {
                /* Si es Cliente */
                header("Location: " . $this->base_url("Usuario"));
            } else {/* si es admin */
                header("Location: " . $this->base_url("Admin"));
            }
        } else {
            /* Si no se encontro el usuario  en la base de datos */
            header("Location: " . $this->base_url("Home/calendario"));
        }
    }

    public function cerrarSesion() {
        include_once "libs/sesiones.php";
        $sesion = new sesiones();
        $result = $sesion->cerrarSesion();

        header("Location: " . $this->base_url("Home/inicio"));
    }

    /* procesos para el usuario */

    public function crearUsuario() {
        if (!isset($_POST) || $_POST == null) {
            echo "<h6>Este no es el camino</h6>";
            return;
        }
        $datos["usuario"] = $_POST["usuario"];
        $datos["password"] = $_POST["password"];
        $datos["rol_usuario"] = $_POST["rol_usuario"];
        require_once 'Modelo/UsuarioModel.php';
        require_once 'Modelo/PersonaModel.php';
        $usuarioM = new UsuarioModel();
        $personaM = new PersonaModel();

        $servicioCliente["id_usuario"] = $usuarioM->save($datos);


        require_once 'Modelo/ServiciosModel.php';
        $serviciosM = new ServiciosModel();
        $servicios = $serviciosM->findAll();
        if ($datos["rol_usuario"] == 1) {

            foreach ($servicios as $s) {
                if (isset($_POST["servicio_" . $s["id_servicio"]])) {

                    $servicioCliente["id_servicio"] = $s["id_servicio"];
                    $serviciosM->guardarServicioCliente($servicioCliente);
                }
            }
            $datosPersona["id_usuario"] = $servicioCliente["id_usuario"];
            $personaM->save($datosPersona);
        }
        /*         * datos de servicio* */

        header("Location: " . $this->base_url("Admin/usuarios"));
    }

    public function eliminarUsuario($idUsuario) {
        require_once 'Modelo/UsuarioModel.php';
        $usuarioM = new UsuarioModel();

        $servicioCliente["id_usuario"] = $usuarioM->eliminarUsuario($idUsuario);

        header("Location: " . $this->base_url("Admin/usuarios"));
    }

    public function detallesUsuario($idUsuario) {
        require_once 'Modelo/UsuarioModel.php';

        $usuarioM = new UsuarioModel();

        $usuario = $usuarioM->select($idUsuario); 

        /* Direccion de vista en variable */
        $contenido = "Views/admin/usuario_detalles.php";

        /* Mostrar la plantilla dibde se mostrara la el contenido */
        include_once "Views/Admin/template_Admin.php";
    }

}
