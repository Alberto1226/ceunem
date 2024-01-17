<?php

require_once 'controllers/errores.php';

class App
{
    function __construct()
    {
        //echo "<p>Nueva App</p>";
        // echo  $_GET['url'];
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //cuando se ingresa sin definir un controlador
        if (empty($url[0])) {
            $archivoController = 'controllers/home.php';
            require_once $archivoController;
            $controller = new Home();
            $controller->render();
            $controller->loadModel('home');
            return false;
        }

        $archivoController = 'controllers/' . $url[0] . '.php';

        if (file_exists($archivoController)) {
            require_once $archivoController;

            //Inicializar el controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            /*para obtener el id
            numero de elementos del arreglo*/
            $nparam = sizeof($url);

            if ($nparam > 1) {
                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else {
                    $controller->{$url[1]}();
                }
            }else{
                $controller->render();
            }

            /*si hay un metodo que se requiere cargar
            if(isset($url[1])){
                $controller->{$url[1]}();
            }else{
                $controller->render();
            }*/
        } else {
            $controller = new Errores();
        }
    }
}
