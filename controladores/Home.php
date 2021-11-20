<?php

class Home extends App
{

    function __construct()
    {
    }

    public function index()
    {
        $this->inicio();
    }

    public function inicio()
    {/* Vista */
        $this->vista("principal/inicio");
    }

    public function Bienvenido()
    {/* Vista */
        $this->vista("principal/template_Admin");
    }
}
