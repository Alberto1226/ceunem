<?php
class View{   
    public $mensaje;
    public array $tablas =[];
    public $tabla;
    public array $articulos = [];
    public $articulo;
    public array $licenciaturas = [];
    public array $lic_datos = [];
    public array $mas_datos = [];
    public array $ec_datos = [];
    public array $cursos = [];
    public array $curso_datos = [];
    public $licenciatura;
    public array $maestrias = [];
    public $maestria;
    public array $continuas = [];
    public $continua;
    public $curso;
    public $fila;
    public $id;
    
    function __construct()
    {
        //echo "Vista base";
    }

    function render($nombre){
        require 'views/'. $nombre . '.php';
    }

}
?>