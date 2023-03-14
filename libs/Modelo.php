<?php

/**
 * Description of Modelo
 *
 * @author dado_
 */
/* * Esta clase es padre y hereda a las clases de Modelo* */

require_once 'libs/BD.php';

class Modelo extends App
{

    public function __construct()
    {
    }

    /*
     * Metodos principales 
     * CRUD= SSUD
     * Save = Guardar
     * Select = Buscar/Consultar
     * Update = Actualizar
     * Delete = Eliminar
     * * */

    /* Guardar: save(Arreglo) */

    public function save($datos)
    {
        /* El contenido del arreglo debe tener los nombres de la columna de la tabla a guardar,
         * Este metodo reccorre el arreglo $columnas en el Modelo, y compara con el arreglo $datos  
          Si el arreglo $datos contiene un nombre diferente, muestra el dato y termina el proceso
         *          */
        $cols = "";
        $values = "";
        foreach ($datos as $key => $v) {
            if (in_array($key, $this->columnas)) {
                if ($key != "") {

                    $cols .= "$key,";
                    $values .= "'$v',";
                }
            } else {
                return "Error, valor $key no se encuentra";
            }
        }

        $cols = substr($cols, 0, -1);
        $values = substr($values, 0, -1);
        $query = "insert into $this->tabla($cols) values($values)";
        $result = $this->query($query, true);
        if (is_numeric($result)) {
            return $result;
        } else {
            /*             * Error, no regreso el ultimo id */
            //$this->user_404($result);
            echo "saver error";
            echo var_dump($result);
        }
    }

    public function selectAll()
    {
        /* Encontrar todos los datos de la tabla */
        $query = "select * from $this->tabla";
        $result = $this->getQuery($query);
        return $result;
    }
 
    public function delete($id)
    {
        $query = "delete  from $this->tabla where $this->pk = $id";
        $result = $this->query($query);
        return $result;
    }

    public function update($datos, $idString = false)
    {
        $values = "";
        foreach ($datos as $key => $v) {
            if ($this->pk == $key) {

                //                unset($datos[$key]);
            } else
            if (in_array($key, $this->columnas)) {
                if ($key != "") {

                    $values .= "$key = '$v',";
                }
            } else {
                return "Error, valor $key no se encuentra";
            }
        }

        $values = substr($values, 0, -1);
        if ($idString) {
            $query = "UPDATE $this->tabla set $values where $this->pk ='" . $datos[$this->pk] . "'";
        } else {
            $query = "UPDATE $this->tabla set $values where $this->pk =" . $datos[$this->pk];
        }
        $result = $this->query($query);
        if ($result == 1) {
            return "ok";
        } else {

            return $result[0];
        }
    }

    /* Metodos Secundarios */

    public function select($id)
    {

        $query = "select * from $this->tabla where $this->pk = $id";
        $result = $this->getRow($query);
        return $result;
    }

    /*     * ************************************************************************
     * NO EDITAR 
     * Metodos principales para obetner la informacion de la BD
     * metodo(parametros)
     * 
     * Metodo para ejecutar cualquier peticion:
     * query($query= peticion a la BD, $last_id= si es true, regresa el ultimo id guardado en la BD  )
     * 
     * Metodo para ejecutar peticion y obtener los resultados en un arreglo, usado en Select
     * getQuery($query)
     * 
     * Metodo para ejecutar una peticion y obtener una fila como resultado
     * getRow($query)
     *      */

    public function query($query, $last_id = false)
    {
        $bd = new BD();
        $result = $bd->bdQuery($query, $last_id);
        return $result;
    }

    public function getQuery($query)
    {

        $result = $this->query($query);

        if ($result->num_rows > 0) {
            $arreglo = array();

            while ($row = $result->fetch_assoc()) {
                array_push($arreglo, $row);
            }
            if ($this->entidad) {
                return $this->verEntidad($arreglo);
            } else {
                return $arreglo;
            }
        } else {
            return false;
        }
        return $result;
    }

    public function getRow($query)
    {

        $result = $this->getQuery($query);
        if ($result != null) {

            return $result[0];
        } else {
            return null;
        }
    }

    public function verEntidad($arreglo)
    {
        if (file_exists($this->locacion_entidad . '/' . $this->entidad_nombre . '.php')) {

            require_once  $this->locacion_entidad . '/' . $this->entidad_nombre . '.php';
            /* Crear Objeto */
            $entidad = new $this->entidad_nombre();

            foreach ($arreglo as $i => $v) {

                foreach ($v as $j => $valor) {
                    $metodo = "get" . ucfirst($j);
                    if (method_exists($this->entidad_nombre, $metodo)) {
                        $arreglo = $entidad->$metodo($arreglo);
                    }
                }
            }


            return $arreglo;
        } else {
            $error = "No se encontro la entidad $this->entidad_nombre";
            $this->entidad_404($error);
            exit;
        }
    }
}
