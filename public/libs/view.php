<?php
class View
{
    public $mensaje;

    public array $articulos = [];
    public $articulo;

    public array $licenciaturas = [];
    public $licenciatura;

    public array $maestrias = [];
    public $maestria;

    public $continuas = [];
    public $continua;

    public $secMisions = [];
    public $secMision;

    public $secVisions = [];
    public $secVision;

    public $secObjs = [];
    public $secObj;

    public $secVals = [];
    public $secVal;

    public $secEqs = [];
    public $secEq;

    public $fila;

    public $inputs = [];
    public $input;

    public $ini1 = [];
    public $ini2;

    public $tel = [];
    public $tel1;

    public $header;

    public $header1;

    public $ofertas =[];
    public $oferta;

    public $testimonios = [];
    public $testimonio;

    public $mapa;

    public $sliders = [];
    public $slider;

    function __construct()
    {
    }

    function render($nombre)
    {
        require 'views/' . $nombre . '.php';
    }
}
