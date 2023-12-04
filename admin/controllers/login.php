<?php
require_once 'libs/controller.php';

class Login extends Controller{
    function __construct()
    {
        session_start();
        if(isset($_SESSION['login'])){
            header('Location: '.URL.'panel');
            die();
        }
        parent::__construct();
    }

    function render(){
        $this->view->render('home');
    }

    function login(){
        if($_POST){
            if(empty($_POST['email']) || empty($_POST['pass'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos' );
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }else{
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass2 = hash("SHA256",$pass);
                $exist = $this->model->userExits($email, $pass2);
                if(empty($exist)){
					$arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto.' ); 
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }else{
                    $arrData = $exist;
                    if($arrData['estado'] == 1){
                        $_SESSION['id_usu'] = $arrData['id_usu'];
                        $_SESSION['login']=true;
                        $id =$arrData['id_usu'];

                        $arrData = $this->model->sessionLogin($id);
                        //header('Location: '.URL.'panel');
                        $arrResponse = array('status' => true, 'msg' => 'ok');
                        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
                        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                    }
                }
            }
           //echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    

}

?>