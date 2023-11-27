<?php
class View{   
    public $mensaje; 
    public array $articulos = [];
    public $articulo;
    public array $licenciaturas = [];
    public $licenciatura;
    public array $maestrias = [];
    public $maestria;
    public array $continuas = [];
    public $continua;
    function __construct()
    {
        //echo "Vista base";
    }

    function render($nombre){
        require 'views/'. $nombre . '.php';
    }

}
?>