<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;

require_once 'libs/controller.php';
//require 'libs/PHPMailer/Exception.php';
//require 'libs/PHPMailer/PHPMailer.php';
//require '../libs/PHPMailer/SMTP.php';

class Contacto extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        $inputs = $this->model->getInputs();
        $this->view->inputs = $inputs;
        $this->view->render('contacto/index');
    }

    function sendEmail(){
        $nCompleto = $_POST['nCompleto'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $face = $_POST['face'];
        $live = $_POST['live'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];

        $parametros = $this->model->getSmtp();
        $smtpHost = $parametros->dirServer;
        $smtpPort = $parametros->portServer;
        $smtpUsername =$parametros->email;
        $smtpPass = $parametros->pass;
        $smtpSecure = $parametros->conect;
        $smtpNombre = $parametros->nombre;

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->Port = $smtpPort;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPass;
        $mail->SMTPSecure = $smtpSecure;

        $mail->setFrom($email,$nombre);
        $mail->addAddress($smtpUsername);
        $mail->Subject = $asunto;
    }
}
?>