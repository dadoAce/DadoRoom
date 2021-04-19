<?php

class BD {
   
    public $mysqli = null;

    function __construct() {
        
    }

    public function connection($query, $last_id = false) {
        
        //--------------------------------Datos de la base de datos(datos de ejemplo)
        $db_host = "localhost";
        $db_username = "root";
        $db_pass = "";
        $db_name = "dadoroom";
        //--------------------------------Datos de la base de datos local 

        //--------------------------------Ingresar para la conexion
        $mysqli = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("No se puede Conectar a la Base de Datos");
        $mysqli->set_charset("utf8");

        //--------------------------------Comprobar la conexion
        if ($mysqli->connect_error) {
            die("Conexion Fallida: " . $mysqli->connect_error);
        }

        //--------------------------------Realizar la peticion
        $resulta = $mysqli->query($query);


        if ($last_id) {

            $result = mysqli_insert_id($mysqli);
            $this->cerrar($mysqli);
            return $result;
        }
        if ($resulta) {
            $this->cerrar($mysqli);
            return $resulta;
        }
    }

    public function cerrar($mysqli) {
        mysqli_close($mysqli);
    }

    function getMysqli() {
        return $this->mysqli;
    }

    function setMysqli($mysqli) {
        $this->mysqli = $mysqli;
    }

    /* ejecutar */

    function bdQuery($query, $last_id = false) {
        $result = $this->connection($query, $last_id);
        return $result;
    }

}
