<?php

class Usuario extends App
{

    function __construct()
    {
    }

    public function index()
    {
    }

    public function iniciarSesion()
    {
        /* Llamar a clases */
        $this->lib("Sesiones");


        /* Instanciar Clases creando objetos */
        $sesion = new sesiones();
        $usuarioModel = $this->modelo("UsuarioModel");

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
                $this->header("Home/Usuario");
            } else {/* si es admin */
                $this->header("Home/Admin");
            }
        } else {
            /* Si no se encontro el usuario  en la base de datos */
            $this->header("Home/calendario");
        }
    }

    public function cerrarSesion()
    {
        $this->lib("Sesiones");
        $sesion = new sesiones();
        $result = $sesion->cerrarSesion();

        $this->header("Home/inicio");
    }

    /* procesos para el usuario */

    public function crearUsuario()
    {
        if (!isset($_POST) || $_POST == null) {
            echo "<h6>Este no es el camino</h6>";
            return;
        }
        $datos["usuario"] = $_POST["usuario"];
        $datos["password"] = $_POST["password"];
        $datos["rol"] = $_POST["rol"];

        $this->modelo("UsuarioModel");
        $usuarioM = new UsuarioModel();

        $result = $usuarioM->save($datos);
        $this->header("Admin");
    }

    public function eliminarUsuario($idUsuario)
    {
        $this->modelo("UsuarioModel");
        $usuarioM = new UsuarioModel();

        $servicioCliente["id_usuario"] = $usuarioM->delete($idUsuario);

        $this->header("Admin");
    }
    public function eliminarLogica($idUsuario)
    {
        $this->modelo("UsuarioModel");
        $usuarioM = new UsuarioModel();

        $datos["idUsuario"] = $idUsuario;
        $datos["fecha_eliminacion"] = date("Y-m-d H:i:s");
        $datos["estatus"] = 0;
        $usuarioM->update($datos);

        $this->header("Admin");
    }

    public function detallesUsuario($idUsuario)
    {
        $this->modelo("UsuarioModel");

        $usuarioM = new UsuarioModel();

        $usuario = $usuarioM->select($idUsuario);

        /* Direccion de vista en variable */
        $contenido = $this->vista("admin/usuario_detalles", null, true);


        /* Mostrar la plantilla dibde se mostrara la el contenido */
        $this->vista("Admin/template_Admin", $contenido);
    }

    public function modificar()
    {
        $this->modelo("UsuarioModel");
        $usuarioM = new UsuarioModel();

        date_default_timezone_set("America/Mexico_City");

        $datos["idUsuario"] = $_POST["idUsuario"];
        $datos["usuario"] = $_POST["usuario"];
        $datos["password"] = $_POST["password"];
        $datos["rol"] = $_POST["rol"];
        $datos["estatus"] = $_POST["estatus"];

        $hoy = date("Y-m-d H:i:s");
        $datos["fecha_modificacion"] = $hoy;
        if ($_POST["estatus"] == 0) {
            echo "eliminar";
            $datos["fecha_eliminacion"] = $hoy;
        }

        $usuarioM->update($datos);
        $this->header("Usuario/detallesUsuario/" . $datos["idUsuario"]);
    }
}
