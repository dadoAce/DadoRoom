<?php

/* Clase de ejemplo para modelo

 * Esta clase hereda los metodos de la Clase MODELO
 * Favor de checar los metodos basicos
 * 
 *  */

class UsuarioModel extends Modelo {

    public $tabla = "usuarios";
    public $pk = "idUsuario";
    /* Opcion de usar un archivo entidad para filtrar algunas devoluciones; Se incluye una entidad de ejemplo: */
    public $entidad = true;
    public $entidad_nombre = "UsuarioEntidad";
    public $columnas = array("usuario", "password", "rol", "estatus", "fecha_creacion", "fecha_modificacion", "fecha_eliminacion");

    public function __construct() {
        
    }

    public function usuariosActivos($estatus) {
        $query = "select * from usuarios where estatus=$estatus";

        /* Usar getROW para traer 1 registro; 
         * getQuery para ejecutar y traer varios registros en un Arrary; 
         * query para solo ejecutar sin esperar retorno;  */
        $result = $this->getQuery($query);

        return $result;
    }

    /*     * Ejemplo de crear QUERY directa */

    public function iniciarSesion($datos) {
        $query = "select * from usuarios where usuario = '" . $datos["usuario"] . "' and password = '" . $datos["password"] . "'";

        /* Usar getROW para traer 1 registro; 
         * getQuery para ejecutar y traer varios registros en un Arrary; 
         * query para solo ejecutar sin esperar retorno;  */
        $result = $this->getRow($query);

        return $result;
    }

}
