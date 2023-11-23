<?php
class View{   
    public $mensaje; 
    public array $articulos = [];
    public $articulo;
    function __construct()
    {
        //echo "Vista base";
    }

    function render($nombre){
        require 'views/'. $nombre . '.php';
    }

    function getMensaje($mensaje){
        $this->mensaje = $mensaje;
        return $this;
    }
}
?>