<?php
require_once 'libs/controller.php';
class Home extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $ini1 = $this->model->getVideo();
        $this->view->ini1 = $ini1;

        $tel = $this->model->getWhats();
        $this->view->tel = $tel;
        

        $this->view->render('home/index');
    }

}
?>