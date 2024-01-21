<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'libs/controller.php';
require 'libs/PHPMailer/Exception.php';
require 'libs/PHPMailer/PHPMailer.php';
require 'libs/PHPMailer/SMTP.php';

class Contacto extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){      
        $inputs = $this->model->getInputs();
        $this->view->inputs = $inputs;

        $mapa = $this->model->getMapa();
        $this->view->mapa = $mapa;

        $this->view->render('contacto/index');
    }

    public function getBanner()
    {        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $banner = $this->model->getBanner();
            $imagenBanner = constant('ARCHIVOS').$banner[0]->img;            
            echo json_encode($imagenBanner);
        }     
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

        $nom = '';
        if(empty($nCompleto)){
            $nom = $nombre." ".$apellidos;
        }else if(empty($nombre)){
            $nom = $nCompleto;
        }

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

        $mail->setFrom($smtpUsername, $smtpNombre);
        $mail->addAddress($smtpUsername);
        $mail->Subject = $asunto;
        $mail->Body = '<table style="border:1px solid black; width: 500px; height: 300px; margin: 0 auto; color: #fff; background: #2e2e2e;">
        <thead>
            <th colspan="2">Datos enviados</th>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">Nombre: </td>
                <td>'.$nom.'</td>
            </tr>
            <tr>
                <td style="text-align: center;">Email: </td>
                <td>'.$email.'</td>
            </tr>
            <tr>
                <td style="text-align: center;">Telefono: </td>
                <td>'.$tel.'</td>
            </tr>
            <tr>
                <td style="text-align: center;">Facebook: </td>
                <td>'.$face.'</td>
            </tr>
            <tr>
                <td style="text-align: center;">Localidad: </td>
                <td>'.$live.'</td>
            </tr>
            <tr>
                <td style="text-align: center;">Asunto: </td>
                <td>'.$asunto.'</td>
            </tr>
            <tr>
                <td style="text-align: center;">Mensaje: </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">'.$mensaje.'</td>
            </tr>
        </tbody>
    </table>';
    
    if($mail->send()){
        $this->view->mensaje = "Tu mensaje se envió con éxito";
    return true;
    }else{
        $this->view->mensaje= "Hubo un error al enviar el mensaje";
        return false;
    }

    }
}
?>