<?php

class Home extends App {

    function __construct() {
        
    }

    public function index() {
        $this->inicio();
    }

    public function inicio() {/* Vista */
        include_once "Views/inicio.php";
    }

    public function Bienvenido() {/* Vista */
        include_once "Views/template_Admin.php";
    }

}
