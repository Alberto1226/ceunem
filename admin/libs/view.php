<?php
class View{   
    public $mensaje;
    public array $tablas =[];
    public $tabla;
    public array $articulos = [];
    public $articulo;
    public array $licenciaturas = [];
    public $licenciatura;
    public array $maestrias = [];
    public $maestria;
    public array $continuas = [];
    public $continua;
    public $fila;
    
    function __construct()
    {
        //echo "Vista base";
    }

    function render($nombre){
        require 'views/'. $nombre . '.php';
    }

}
?>