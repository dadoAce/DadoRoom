<?php

/**
 * Description of usuarioEntidad
 *
 * @author dado_
 */
class UsuarioEntidad {

    public function __construct() {
        
    }
                    

    function getRol($datos) {
        if ($datos != null) {

            foreach ($datos as $key => $value) {
                switch ($value["rol"]) {
                    case 0:
                        $datos[$key]["rol"] = "Admin";
                        break;
                    case 1:
                        $datos[$key]["rol"] = "Usuario";

                        break;

                    default:
                        break;
                }
            }
        }
        return $datos;
    }

    function getEstatus($datos) {
        if ($datos != null) {

            foreach ($datos as $key => $value) {
                switch ($value["estatus"]) {
                    case 0:
                        $datos[$key]["estatus"] = "Inactivo";
                        break;
                    case 1:
                        $datos[$key]["estatus"] = "Activo";

                        break;

                    default:
                        break;
                }
            }
        }
        return $datos;
    }

}
